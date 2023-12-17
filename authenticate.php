<?php
$config = require __DIR__ . '/userdaten.php';
include('userdaten.php');

if (!empty($_POST["submit"])) {
    $_username = $_POST["username"];
    $_passwort = $_POST["passwort"];
    $_mail = $_POST["mail"];
}

if(!empty($_username) && !empty($_passwort) && !empty($_mail)) {

    $dbh = new PDO('mysql:host=localhost;dbname=@localhost', $config['user'], $config['pass']);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $SQL = $dbh->prepare("SELECT * FROM login_user where username= ? and passwort= ? and mail= ?");
    $result = $SQL->execute([$_username, $_passwort, $_mail]);
    $test = $SQL->fetchAll();

    $_SESSION["login"] = 1;

    $_SESSION["user"] = $result;

    $_SESSION['login_data'] = $test;

}

if (!empty($_POST["submit"])) {
    $_username = mysqli_real_escape_string($_POST["username"]);
    $_passwort = mysqli_real_escape_string($_POST["passwort"]);
    $_mail = mysqli_real_escape_string($_POST["mail"]);
}
header("Location:index.php");
