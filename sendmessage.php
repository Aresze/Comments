<?php
include "class/DB.php";
$db = new DB();
session_start();

if (isset($_POST['comments']))
	{ $comments = $_POST['comments'];
	}
if (isset($_POST['parrent']))
	{ $parrent = $_POST['parrent'];
	}
$comments = htmlspecialchars($comments);
$comments = trim($comments);

$parrent = htmlspecialchars($parrent);
$parrent = trim($parrent);

$id = $_SESSION['id'];

$db->addCommentBD($id,$comments,$parrent);

echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>";

?>