<?php
session_start();

if (isset($_POST['comments']))
	{ $comments = $_POST['comments'];
	}
if (isset($_POST['parrent']))
	{ $parrent = $_POST['parrent'];
	}
$comments = stripslashes($comments);
$comments = htmlspecialchars($comments);
$comments = trim($comments);

$parrent = stripslashes($parrent);
$parrent = htmlspecialchars($parrent);
$parrent = trim($parrent);

$id = $_SESSION['id'];
include ("bd.php");
$sql = "SELECT id FROM comments WHERE id='$parrent'";
$result = $db->query($sql);
if ($result->num_rows==0 && $parrent!=0){
    echo "<a href = 'index.php'>На главную</a></br>";
    echo "Комментарий не найден!";
}
else {
    $sql = "INSERT INTO comments (comment, id_parrent, user) VALUES ('$comments', '$parrent', '$id')";
    $db->query($sql);
    echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>";
}
$db->close();
?>