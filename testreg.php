<?php
session_start();

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
}
if (isset($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='') {
        unset($password);
    }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);

include ("bd.php");
//$password = md5($password);//шифруем пароль
//$password = strrev($password);// для надежности добавим реверс
//$password = $password."b3p6f";

$sql = ("SELECT * FROM users WHERE login='$login' AND password='$password'");
$result = $db->query($sql);
$myrow = $result->fetch_array();

if (empty($myrow['id']))
{
exit ("Извините, введённый вами логин или пароль неверный.");
}
else {
          //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
          $_SESSION['password']=$myrow['password']; 
		  $_SESSION['login']=$myrow['login']; 
          $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь

	  
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>";

//перенаправляем пользователя на главную страничку, там ему и сообщим об удачном входе
}
?>