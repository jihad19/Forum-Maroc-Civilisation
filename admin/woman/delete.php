<?php
    require "../function.php";
    is_logged_in();

    $id = $_POST['id'];
    $sql = "DELETE FROM women WHERE id=$id";
    if(setData($sql)){
        setMessage('the woman deleted sussefuly');
    }else{
        setError('there is an error');
        setError($sql);
    }
    header("Location: $originPath/woman/showAll.php");