<?php
    require "../function.php";
    is_logged_in();

    dd($_POST);
    dd($_FILES);
    // input data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $img = $_POST['img'];
    $file_post = $_POST['file'];

    $slug_test = $slug;
    $i = 0;
    do{
        $sql = "SELECT * FROM posts where slug='$slug_test'";
        if(getData($sql)){
            $exist = true;
            $i++;
            $slug_test = "$slug-$i";
        }else{
            $exist = false;
            $slug = $slug_test;
        }
    }while($exist);

    if(!is_dir("$uploads_dir/post/$id"))
    mkdir("$uploads_dir/post/$id", 755);
    
    if($_FILES["img"]["error"] == UPLOAD_ERR_OK){
        $file = $_FILES["img"];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $i = 1;
        $split = explode(".", $file_name);
        $type = end($split);
        $name = str_replace(".$type", '', $file_name);
        while(file_exists("$uploads_dir/post/$id/$file_name")){
            $file_name = "$name ($i).$type";
            $i++;
        }
        $img = "post/$id/$file_name";
        move_uploaded_file($file_temp, "$uploads_dir/$img");
    }

    if($_FILES["file"]["error"] == UPLOAD_ERR_OK){
        $file = $_FILES["file"];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $i = 1;
        $split = explode(".", $file_name);
        $type = end($split);
        $name = str_replace(".$type", '', $file_name);
        while(file_exists("$uploads_dir/post/$id/$file_name")){
            $file_name = "$name ($i).$type";
            $i++;
        }
        $file_post = "post/$id/$file_name";
        move_uploaded_file($file_temp, "$uploads_dir/$file_post");
    }

    $sql = "UPDATE posts SET title='$title', slug='$slug', img='$img', file='$file_post' WHERE id=$id";
    if(setData($sql)){
        setMessage('The Post information was updated sussefuly');
    }else{
        setError('there is an error');
    }
    header("Location: $originPath/post/show.php?id=$id");