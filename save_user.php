<?php
if (isset($_POST['login']))
{ $login = $_POST['login'];
if ($login == '')
{ unset($login);} }

if (isset($_POST['password']))
{ $password=$_POST['password'];
if ($password =='')
{ unset($password);} }

if (isset($_POST['email']))
{ $email=$_POST['email'];
if ($email =='')
{ unset($email);} }

if (isset($_POST['surname']))
{ $surname=$_POST['surname'];
if ($surname =='')
{ unset($surname);} }

if (isset($_POST['name']))
{ $name=$_POST['name'];
if ($name =='')
{ unset($name);} }

if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
{
exit ("�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!");
}
//���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
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

//������� ������ �������
$login = trim($login);
$password = trim($password);
$email = trim($email);
$surname = trim($surname);
$name = trim($name);

//��������� �������� �� ����� ������ � ������
if (strlen($login) < 3 or strlen($login) > 15) {
exit ("����� ������ �������� �� ����� ��� �� 3 �������� � �� ����� ��� �� 15.");
}
if (strlen($password) < 3 or strlen($password) > 15) {
exit ("������ ������ �������� �� ����� ��� �� 3 �������� � �� ����� ��� �� 15.");
}

include ("bd.php");
$sql = "SELECT id FROM users WHERE login='$login'";
$result = $db->query($sql);
$myrow = $result->fetch_array();

if (!empty($myrow['id'])) {
exit ("��������, �������� ���� ����� ��� ���������������. ������� ������ �����.");
}

$sql = "INSERT INTO users (login,password,email,surname,name) VALUES('$login','$password','$email','$surname','$name')";
if ($db->query($sql)=='TRUE')
{
echo "�� ������� ����������������! ������ �� ������ ����� �� ����. <a href='index.php'>������� ��������</a>";
}

else {
echo "������! �� �� ����������������.";
     }
?>