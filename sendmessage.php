<?php
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
include ("bd.php");
$sql = 'SELECT id FROM comments WHERE id="'.$db->real_escape_string($parrent).'"';

$result = $db->query($sql);
if ($result->num_rows==0 && $parrent!=0){
    echo "<a href = 'index.php'>На главную</a></br>";
    echo "Комментарий не найден!";
}
else {
    $sql = 'INSERT INTO comments (comment, id_parrent, user)
        VALUES ("'.$db->real_escape_string($comments).'",
                "'.$db->real_escape_string($parrent).'",
                "'.$db->real_escape_string($id).'")';

    $db->query($sql);
    echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>";
}
$db->close();
?>