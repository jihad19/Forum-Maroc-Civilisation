<?php
    require "../function.php";
    is_logged_in();
    $id = $_POST['id'];
    $sql = "DELETE FROM students WHERE id=$id";
    if(setData($sql)){
        setMessage('the student deleted sussefuly');
    }else{
        setError('there is an error');
        setError($sql);
    }
    header("Location: $originPath/student/showAll.php");