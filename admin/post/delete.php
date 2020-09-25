<?php
    require "../function.php";
    is_logged_in();

    $id = $_POST['id'];
    $sql = "DELETE FROM posts WHERE id=$id";
    if(setData($sql)){
        setMessage('the Post deleted sussefuly');
    }else{
        setError('there is an error');
        setError($sql);
    }
    header("Location: $originPath/post/showAll.php");