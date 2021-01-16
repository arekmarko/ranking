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
</head>
<body>
    <h1>
        System rankingowy
    </h1>
    <form action="" method="POST">
        1. <input type="radio" name="vote" value="1" ><br>
        2. <input type="radio" name="vote" value="2" ><br>
        3. <input type="radio" name="vote" value="3" ><br>
        4. <input type="radio" name="vote" value="4" ><br>
        5. <input type="radio" name="vote" value="5" ><br>
        6. <input type="radio" name="vote" value="6" ><br>
    <br>
    <div class="g-recaptcha" data-sitekey="6LeVLi8aAAAAAA3PsbFeAvtUawfvCyUthlgLqN0E" data-theme="light" data-size="normal" data-image="image"></div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <input type="submit" name="submit" value="submit">
<?php
if (isset($_POST['submit'])) {
    $secret = '6LeVLi8aAAAAAFZFOU3ezuOxvjqBUfzr_PWBj1Ch';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
    $result = json_decode($url, TRUE);
    if ($result['success'] == 1) {
      echo 'Nie jesteś botem';
    }else{
      echo 'Błędnie wypełnione pole reCAPTCHA';
    }
}
?>
</form>
</body>
</html>