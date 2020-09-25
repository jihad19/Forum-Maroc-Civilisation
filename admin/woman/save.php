<?php

    if($_POST['name']){
        require "../function.php";
        // input data
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $birthday = $_POST['birthday'];
        $place = $_POST['place'];
        $level = $_POST['level'];
        $job = $_POST['job'];
        $tele = $_POST['tele'];
        $cni = $_POST['cni'];
        $address = $_POST['address'];
        $price = $_POST['price'];
        $club = json_encode($_POST['club']??'',JSON_UNESCAPED_UNICODE);

        $sql = "INSERT INTO women (id, name, lastname, birthday, place, level, job, tele, cni, address, club, price) VALUES (NULL, '$name', '$lastname', '$birthday', '$place', '$level', '$job', '$tele', '$cni', '$address', '$club', '$price')";
        if(setData($sql)){
            $status = 'done';
        }else{
            $status = 'false';
        }
        header("Location: " . $_SERVER['HTTP_REFERER']."?msg=$status");
    }