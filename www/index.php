<html>
<head>
    <title>Ranking</title>
</head>

<body>
    <h1>Ranking</h1>

<?php
    require "./db_connection.php";
    $conn = get_db_connection();
    $query = "select * from elements";
    $result = mysqli_query($conn, $query);
    while ($value = mysqli_fetch_assoc($result)) {
?>

<div class="page-element">
    <h3> <?php echo $value['title'] ?> </h3>
    <img src="images/<?php echo $value['filename'] ?>"
         alt="<?php echo $value['title'] ?>"
         width="500" height="500">
</div>

<?php
    }
?>

</body>
