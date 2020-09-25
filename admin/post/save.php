<?php
    require "../function.php";
    is_logged_in();

    // input data
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $img = '';
    $file_post = '';

    // check if there is any post with slug before 
    // ex: if "slug=post" exist then "slug=post-1"
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

    // get next id from post table
    $sql = "SELECT MAX(Id) id FROM posts";
    $nextid = getData($sql)['id']+1;

    // make dir with next id
    if(!is_dir("$uploads_dir/post/$nextid"))
    mkdir("$uploads_dir/post/$nextid", 755);
    
    if($_FILES["img"]["error"] == UPLOAD_ERR_OK){
        $file = $_FILES["img"];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $i = 1;
        $split = explode(".", $file_name);
        $type = end($split);
        $name = str_replace(".$type", '', $file_name);
        while(file_exists("$uploads_dir/post/$nextid/$file_name")){
            $file_name = "$name ($i).$type";
            $i++;
        }
        $img = "post/$nextid/$file_name";
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
        while(file_exists("$uploads_dir/post/$nextid/$file_name")){
            $file_name = "$name ($i).$type";
            $i++;
        }
        $file_post = "post/$nextid/$file_name";
        move_uploaded_file($file_temp, "$uploads_dir/$file_post");
    }

    $sql = "INSERT INTO posts (id, title, slug, img, file) VALUES ($nextid, '$title', '$slug', '$img', '$file_post')";
    
    if(setData($sql)){
        setMessage('The Post was inserted sussefuly');
    }else{
        setError('there is an error');
    }
    header("Location: $originPath/post/show.php?id=$nextid");