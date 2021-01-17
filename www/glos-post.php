<?php

session_start();

if (!isset($_SESSION['captcha'])) {
    echo "Błąd: nieustawiona captcha. Spróbuj ponownie.";
    exit;
}

if ($_SESSION['captcha'] != $_POST['captcha']) {
    echo "Niepoprawnie przepisana captcha. Spróbuj ponownie.";
    exit;
}

require "./db_connection.php";
$conn = get_db_connection();

$remote_addr = mysqli_escape_string($conn, $_SERVER['REMOTE_ADDR']);

$spam_query = "select count(*) from votes where TIMEDIFF(now(), vote_datetime) < '00:30:00' and voter_ip = '" . $remote_addr . "'";
$spam_result = mysqli_query($conn, $spam_query);

if (mysqli_fetch_row($spam_result)[0] != 0) {
    echo "<h1> Wykryto SPAM, spróbuj ponownie za 30 minut. </h1>";
    exit;
}

$spam_result->close();

$insert_query = "insert into votes (voter_ip, vote_val, element_id) values (?, ?, ?)";
$statement = $conn->prepare($insert_query);
$statement->bind_param("sss", $remote_addr, $_POST['vote_val'], $_POST['element_id']);
$statement->execute();
$statement->close();

header("Location: /");
?>
