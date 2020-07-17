<?php
include "class/MyUser.php";
include  "class/DB.php";
header('Content-Type: text/html; charset=UTF-8');

$db = new DB();

$user = new myUser();
$user->setLogin($_POST['login']);
$user->setPassword($_POST['password']);
$user->setEmail($_POST['email']);
$user->setName($_POST['name']);
$user->setSurname($_POST['surname']);

if (!$user->validate()) {
    exit ();
}

if (!$db->validate($user->getLogin(),$user->getPassword()))
{
    $db->addUserInBD($user->getLogin(),$user->getPassword(),$user->getEmail(),$user->getName(),$user->getSurname());
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}
else {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
?>