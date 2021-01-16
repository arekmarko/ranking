<?php
session_start();
$_SESSION = array();

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Pai &raquo; System rankingowy</title>
    <style type="text/css">
        pre {
            border: solid 1px #bbb;
            padding: 10px;
            margin: 2em;
        }

    </style>
</head>
<body>
    <h1>
        System rankingowy
    </h1>
    <form action="" method="POST">
        1. <input type="radio" name="vote" value="1" ><br>
        2. <input type="radio" name="vote" value="2" ><br>
        3. <input type="radio" name="vote" value="3" onclick="getVote(this.value)"><br>
        4. <input type="radio" name="vote" value="4" ><br>
        5. <input type="radio" name="vote" value="5" ><br>
        6. <input type="radio" name="vote" value="6" ><br>
        
        
            <?php
        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
        
        ?>
    <br>
    <input type="text" name="captcha">
    <input type="submit" name="submit" value="submit">
<?php
        if (isset($_POST['submit'])){
            if ($_SESSION['captcha']['code'] == $_POST['submit']){
                echo 'Nie jestes robotem';
            }else {
                echo 'Jestes robotem, blad!';
            }
        }
            
            ?>
</form>
</body>
</html>