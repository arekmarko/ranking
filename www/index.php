<html>
<head>
    <title>Ranking</title>
</head>

<body>
    <h1>Ranking</h1>

<?php
    require "./db_connection.php";
    $conn = get_db_connection();
    $query = "select id, title, filename, (select ifnull(avg(votes.vote_val), 'brak ocen') from votes where votes.element_id = elements.id) as score from elements";
    $result = mysqli_query($conn, $query);
    while ($value = mysqli_fetch_assoc($result)) {
?>

<div class="page-element">
    <h3> <?php echo $value['title'] ?> </h3>
    <img src="images/<?php echo $value['filename'] ?>"
         alt="<?php echo $value['title'] ?>"
         width="500" height="500">
    <h4>Obecny wynik: <?php echo $value['score'] ?></h4>
    <br>
    <a href="/oddaj-glos?element=<?php echo $value['id'] ?>">Oddaj głos na element</a>
</div>

<?php
    }
?>

</body>
