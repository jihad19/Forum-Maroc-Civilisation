<?php
    require "../function.php";
    is_logged_in();

    // input data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $place = $_POST['place'];
    $level = $_POST['level'];
    $job = $_POST['job'];
    $tele = $_POST['tele'];
    $cni = $_POST['cni'];
    $address = $_POST['address'];
    $num = $_POST['num'];
    $price = $_POST['price'];
    $club = json_encode($_POST['club']??'',JSON_UNESCAPED_UNICODE);

    $sql = "UPDATE women SET name='$name', lastname='$lastname', birthday='$birthday', place='$place', level='$level', job='$job', tele='$tele', cni='$cni', address='$address', club='$club', num=$num, price='$price' WHERE id=$id";
    if(setData($sql)){
        setMessage('The woman information was updated sussefuly');
    }else{
        setError('there is an error');
    }
    header("Location: $originPath/woman/show.php?id=$id");