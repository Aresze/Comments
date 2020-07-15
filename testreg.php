<?php
header('Content-Type: text/html; charset=UTF-8');
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

$login = htmlspecialchars($login);
$login = trim($login);

$password = trim($password);
$password = htmlspecialchars($password);
include ("bd.php");

$sql = 'SELECT * FROM users WHERE login= "'.$db->real_escape_string($login).'"
                            AND password = "'.$db->real_escape_string($password).'"';
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