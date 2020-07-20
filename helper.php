<?php
include "class/Comment.php";
include "class/MyUser.php";
include "class/DB.php";
include "class/ModuleEnum.php";


//TO DO: fix in out data class comment
function build_tree($data){
    $tree = array();
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
//TO DO: fix in out data class comment
function getCommentsTemplate($comments){

    $html = '';
    foreach($comments as $comment){
        ob_start();
        include 'comments_template.php';
        $html .= ob_get_clean();
    }
    return $html;
}
//TO DO: fix in out data class comment
function getComments($data){
    $comments = new Comments();
    while($row = mysqli_fetch_array($data))
    {
        $comments->setComment($row['id'],$row['login'],$row['comment'],$row['id_parrent']);
    }
    return $comments->getComment();
}

function printComments($data)
{
    $_comments = array();

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