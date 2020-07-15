<?php
header('Content-Type: text/html; charset=UTF-8');

if (isset($_POST['login']))
{ $login = $_POST['login'];
if ($login == '')
{ unset($login);} }

if (isset($_POST['password']))
{ $password=$_POST['password'];
if ($password =='')
{ unset($password);} }

$email=$_POST['email'];
$surname=$_POST['surname'];
$name=$_POST['name'];

if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

$login = htmlspecialchars($login);
$password = htmlspecialchars($password);
$email = htmlspecialchars($email);
$surname = htmlspecialchars($surname);
$name = htmlspecialchars($name);

$login = trim($login);
$password = trim($password);
$email = trim($email);
$surname = trim($surname);
$name = trim($name);

//добавляем проверку на длину логина и пароля
if (strlen($login) < 3 or strlen($login) > 15) {
exit ("Логин должен состоять не менее чем из 3 символов и не более чем из 15.");
}
if (strlen($password) < 3 or strlen($password) > 15) {
exit ("Пароль должен состоять не менее чем из 3 символов и не более чем из 15.");
}

include ("bd.php");
$sql = 'SELECT id FROM users WHERE login="'.$db->real_escape_string($login).'"';


$result = $db->query($sql);
$myrow = $result->fetch_array();

if (!empty($myrow['id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

$sql = 'INSERT INTO users (login,password,email,surname,name)
        VALUES("'.$db->real_escape_string($login).'",
        "'.$db->real_escape_string($password).'",
        "'.$db->real_escape_string($email).'",
        "'.$db->real_escape_string($surname).'",
        "'.$db->real_escape_string($name).'")';

if ($db->query($sql)=='TRUE')
{
echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
?>