<?php
    require "./db_connection.php";
    $conn = get_db_connection();
    $element_id = mysqli_escape_string($conn, $_GET['element_id']);

    $select_query = "select * from elements where id = $element_id";
    $result = mysqli_query($conn, $select_query);
    $element = mysqli_fetch_assoc($result);
    $result->close();
?>

<html>

<head>
    <title>Oddaj głos na element <?php echo $element['title'] ?></title>
</head>

<body>
    <h1> Oddawanie głosu na element "<?php echo $element['title'] ?>"</h1>
    <img src="images/<?php echo $element['filename'] ?>"
         alt="<?php echo $element['title'] ?>"
         width="500" height="500">

    <form action="glos-post.php" method="POST">
        <input type="hidden" name="element_id" value="<?php echo $element_id ?>">
        <div>
            <label for="vote_val"><p>Wartość głosu</p></label>
            <input id="vote_val" type="number" min="1" max="5" value="3" name="vote_val">
        </div>
        <input type="submit" value="Oddaj głos">
    </form>
</body>

</html>
