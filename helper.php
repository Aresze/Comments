<?php
include "class/Comment.php";
include "class/MyUser.php";
include "class/DB.php";


//TO DO: fix in out data class comment
function build_tree($data){
    $tree = array();
    foreach($data as $id => &$row){
        if(empty($row['id_parrent'])){
            $tree[$id] = &$row;
        }
        else{
            $data[$row['id_parrent']]['childs'][$id] = &$row;
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
    while($row = $data->fetch_assoc())
    {
        $comments->setComment($row['id'],$row['login'],$row['comment'],$row['id_parrent']);
    }
    return $comments;
}

function printComments($data)
{
    $_comments = array();
    while ($row = $data->fetch_array()) {
        $_comments[$row['id']] = $row;
    }

    $comments = build_tree($_comments);
    unset($_comments);
    $comments = getCommentsTemplate($comments);
    return $comments;
}
?>