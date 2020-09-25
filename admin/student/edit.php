<?php
    require "../function.php";
    is_logged_in();
    
    // input data
    $id = $_POST['id'];
    $fullName = $_POST['fullName'];
    $age = $_POST['age'];
    $establi = $_POST['establi'];
    $level = $_POST['level'];
    $freetime = json_encode($_POST['freetime']??'',JSON_UNESCAPED_UNICODE);
    $parentName = $_POST['parentName'];
    $job = $_POST['job'];
    $tele = $_POST['tele'];
    $cin = $_POST['cin'];
    $aderr = $_POST['aderr'];
    $num = $_POST['num'];


    // files
    $file_stImg = $_POST["file-stImg"];
    $file_actNess = $_POST["file-actNess"];

    if($_FILES["file-stImg"]["error"] == UPLOAD_ERR_OK){
        $file = $_FILES["file-stImg"];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $i = 1;
        $split = explode(".", $file_name);
        $type = end($split);
        $name = str_replace(".".$type, '', $file_name);
        while(file_exists("$uploads_dir/img/$file_name")){
            $file_name = "$name ($i).$type";
            $i++;
        }
        $file_stImg = "img/$file_name";
        move_uploaded_file($file_temp, "$uploads_dir/$file_stImg");
    }

    if($_FILES["file-actNess"]["error"] == UPLOAD_ERR_OK){
        $file = $_FILES["file-actNess"];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $i = 1;
        $split = explode(".", $file_name);
        $type = end($split);
        $name = str_replace(".".$type, '', $file_name);
        while(file_exists("$uploads_dir/act/$file_name")){
            $file_name = "$name ($i).$type";
            $i++;
        }
        $file_actNess = "act/$file_name";
        move_uploaded_file($file_temp, "$uploads_dir/$file_actNess");
    }

    $sql = "UPDATE students SET fullName='$fullName', img='$file_stImg', age=$age, actNess='$file_actNess', level='$level', establi='$establi',freetime='$freetime', parentName='$parentName', job='$job', tele='$tele', cin='$cin', aderr='$aderr', num=$num WHERE id=$id";
    if(setData($sql)){
        setMessage('the student updated sussefuly');
    }else{
        setError('there is an error');
    }
    header("Location: $originPath/student/show.php?id=$id");