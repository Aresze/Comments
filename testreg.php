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
//������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������

if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
{
exit ("�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//������� ������ �������
$login = trim($login);
$password = trim($password);

include ("bd.php");
//$password = md5($password);//������� ������
//$password = strrev($password);// ��� ���������� ������� ������
//$password = $password."b3p6f";

$sql = ("SELECT * FROM users WHERE login='$login' AND password='$password'");
$result = $db->query($sql);
$myrow = $result->fetch_array();

if (empty($myrow['id']))
{
exit ("��������, �������� ���� ����� ��� ������ ��������.");
}
else {
          //���� ������ ���������, �� ��������� ������������ ������! ������ ��� ����������, �� �����!
          $_SESSION['password']=$myrow['password']; 
		  $_SESSION['login']=$myrow['login']; 
          $_SESSION['id']=$myrow['id'];//��� ������ ����� ����� ������������, ��� �� � ����� "������ � �����" �������� ������������

	  
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>";

//�������������� ������������ �� ������� ���������, ��� ��� � ������� �� ������� �����
}
?>