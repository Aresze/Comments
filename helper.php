<?php
include "class/Comment.php";
include "class/MyUser.php";
include "class/DB.php";
include "class/ModuleEnum.php";


function build_tree($data){
    $tree = [];
    foreach($data as $id => &$row){
        if(empty($row[ModuleEnum::id_parrent])){
            $tree[$id] = &$row;
        }
        else{
            $data[$row[ModuleEnum::id_parrent]][ModuleEnum::childs][$id] = &$row;
        }
    }
    return $tree;
}
function getCommentsTemplate($comments){
    $html = '';
    foreach($comments as $comment){
        ob_start();
        include 'comments_template.php';
        $html .= ob_get_clean();
    }
    return $html;
}
function getComments($data){
    $comments = new Comments();
    while($row = mysqli_fetch_array($data))
    {
        $comments->setComment($row['id'],$row['login'],$row['comment'],$row['id_parrent']);
    }
    return $comments->getComment();
}
function validate(){
    $db = new DB();

    if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
        $login = $_SESSION['login'];
        $password = $_SESSION['password'];
        return $authorized = !$db->validate($login,$password);
    }
    else return true;

}
function printComments()
{
    $db = new DB();
    $data = $db->getCommentsBD();
    $_comments = [];

    $commentsData = getComments($data);
    foreach ($commentsData as $item) {
        $_comments[$item->getId()] = [$item->getId(), $item->getLogin(), $item->getParrent(), $item->getComment()];
    }

    $comments = build_tree($_comments);
    unset($_comments);
    unset($commentsData);
    $comments = getCommentsTemplate($comments);
    return $comments;
}
?>