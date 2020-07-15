<?php
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
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$email = stripslashes($email);
$email = htmlspecialchars($email);

$surname = stripslashes($surname);
$surname = htmlspecialchars($surname);

$name = stripslashes($name);
$name = htmlspecialchars($name);

//удаляем лишние пробелы
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
$sql = "SELECT id FROM users WHERE login='$login'";
$result = $db->query($sql);
$myrow = $result->fetch_array();

if (!empty($myrow['id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

$sql = "INSERT INTO users (login,password,email,surname,name) VALUES('$login','$password','$email','$surname','$name')";
if ($db->query($sql)=='TRUE')
{
echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
?>
