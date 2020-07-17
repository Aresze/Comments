<?php
header('Content-Type: text/html; charset=UTF-8');
include "class/DB.php";
include "class/MyUser.php";
session_start();

$db = new DB();

$user = new myUser();
$user->setLogin($_POST['login']);
$user->setPassword($_POST['password']);

if (!$user->validate()) {
    exit ();
}
if(!$db->validate($user->getLogin(),$user->getPassword())) {
    exit ("Извините, введённый вами логин или пароль неверный.");
}
$user->setId($db->authorisationBD($user->getLogin(),$user->getPassword())['id']);

$_SESSION['password'] = $user->getPassword();
$_SESSION['login'] = $user->getLogin();
$_SESSION['id'] = $user->getId();

    echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>";
?>