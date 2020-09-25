<?php
    $type = $_GET['type'];
    
    if($type=='studentCarte'){
        $id = $_GET['id'];
        require("plugin/I18N/Arabic.php");
        require("function.php");
        $Arabic = new I18N_Arabic('Glyphs');

        $student = student($id);
        $studentimg = $student['img'];
        $fullname = $Arabic->utf8Glyphs($student['fullName']);
        $establi = $Arabic->utf8Glyphs($student['establi']);
        $level = $Arabic->utf8Glyphs($student['level']);
        $num = $student['num'];
        $day = $Arabic->utf8Glyphs(json_decode($student['freetime']));
        $year = date('Y')."/".date('Y', strtotime('+1 year'));

        // start image
        header('content-type: image/png');

        $studentcart = imagecreatefromjpeg("$uploads_dir/student/studentcart.jpg");
        $studentcartX = imagesx($studentcart);
        $studentcartY = imagesy($studentcart);

        $black = imagecolorallocate($studentcart, 0, 0, 0);
        $font = realpath('.')."/assets/font/ar.ttf";
        $studentPic = imagecreatefromtype("$uploads_dir/$studentimg");
        
        // resize student pic
        $studentPicResize = imagecreatetruecolor(189,181);
        imagecolortransparent($studentPicResize);
        imagecopyresampled( $studentPicResize , $studentPic , 0 , 0 , 0 , 0 , 190 , 182 , imagesx($studentPic) , imagesy($studentPic));
        
        // add student pic
        imagecopy( $studentcart , $studentPicResize , 22 , 31 , 0 , 0 , imagesx($studentPicResize) , imagesy($studentPicResize));
        
        // add fullname
        text($studentcart, 17, 0, $black, $font, $fullname, 190, 292);

        // add establi
        text($studentcart, 17, 0, $black, $font, $establi, 155, 340);

        // add num
        text($studentcart, 17, 0, $black, $font, $num, 180, 388);

        // add level
        text($studentcart, 17, 0, $black, $font, $level, 630, 292);

        // add day
        text($studentcart, 17, 0, $black, $font, $day, 524, 340);

        // add year
        text($studentcart, 17, 0, $black, $font, $year, 630, 388);

        // image end
        imagepng($studentcart);
        // imagepng($studentcart, "$uploads_dir/student/cart.png");

        download("$uploads_dir/student/cart.png");
        unlink("$uploads_dir/student/cart.png");
        echo "<script>window.close();</script>";

    }elseif($type=='studentInfo'){
        $id = $_GET['id'];
        require("plugin/I18N/Arabic.php");
        $Arabic = new I18N_Arabic('Glyphs');
        require("function.php");
        
        $student = student($id);
        $studentimg = $student['img'];
        $fullname = $Arabic->utf8Glyphs($student['fullName']);
        $age = $student['age'];
        $establi = $Arabic->utf8Glyphs($student['establi']);
        $level = $Arabic->utf8Glyphs($student['level']);
        $day = $Arabic->utf8Glyphs(json_decode($student['freetime']));
        $parentName = $Arabic->utf8Glyphs($student['parentName']);
        $job = $Arabic->utf8Glyphs($student['job']);
        $tele = $student['tele'];
        $cin = $student['cin'];
        $aderr = $student['aderr'];
        $num = $student['num'];
        $year = date('Y')."/".date('Y', strtotime('+1 year'));

        // start image
        header('content-type: image/png');

        $studentinfo = imagecreatefromjpeg("$uploads_dir/student/studentinfo.jpg");
        $studentcartX = imagesx($studentinfo);
        $studentcartY = imagesy($studentinfo);

        $black = imagecolorallocate($studentinfo, 0, 0, 0);
        $font = realpath('.')."/assets/font/ar.ttf";
        $studentPic = imagecreatefromtype("$uploads_dir/$studentimg");
        
        // resize student pic
        $studentPicResize = imagecreatetruecolor(138,132);
        imagecolortransparent($studentPicResize);
        imagecopyresampled( $studentPicResize , $studentPic , 0 , 0 , 0 , 0 , 139 , 133 , imagesx($studentPic) , imagesy($studentPic));
        
        // add student pic
        imagecopy($studentinfo , $studentPicResize , 45 , 159 , 0 , 0 , imagesx($studentPicResize) , imagesy($studentPicResize));
        
        // add fullname
        text($studentinfo, 14, 0, $black, $font, $fullname, 55, 188);

        // add age
        text($studentinfo, 14, 0, $black, $font, $age, 55, 278);

        // add level
        text($studentinfo, 14, 0, $black, $font, $level, 55, 363);

        // add etabli
        text($studentinfo, 14, 0, $black, $font, $establi, 300, 363);

        // add day
        text($studentinfo, 14, 0, $black, $font, $day, 55, 453);

        // add parent name
        text($studentinfo, 14, 0, $black, $font, $parentName, 55, 542);

        // add job
        text($studentinfo, 14, 0, $black, $font, $job, 300, 542);

        // add tele
        text($studentinfo, 14, 0, $black, $font, $tele, 55, 632);

        // add job
        text($studentinfo, 14, 0, $black, $font, $cin, 300, 632);
        
        // add address
        text($studentinfo, 14, 0, $black, $font, $aderr, 55, 721);

        // add num
        text($studentinfo, 14, 0, $black, $font, $num, 300, 721);

        // add year
        text($studentinfo, 14, 0, $black, $font, $year, 55, 826);

        // image end
        imagepng($studentinfo);
        // imagepng($studentinfo, "$uploads_dir/student/info.png");
        
        // download("$uploads_dir/student/info.png");
        // unlink("$uploads_dir/student/info.png");
        // echo "<script>window.close();</script>";
    }elseif($type=='womanCarte'){
        $id = $_GET['id'];
        require("plugin/I18N/Arabic.php");
        require("function.php");
        $Arabic = new I18N_Arabic('Glyphs');

        $woman = woman($id);
        $name = $Arabic->utf8Glyphs($woman['name']);
        $lastname = $Arabic->utf8Glyphs($woman['lastname']);
        $job = $Arabic->utf8Glyphs($woman['job']);
        $level = $Arabic->utf8Glyphs($woman['level']);
        $num = $woman['num'];
        $club = $Arabic->utf8Glyphs(implode(', ', array_reverse(json_decode($woman['club']))));
        $year = date('Y')."/".date('Y', strtotime('+1 year'));

        // start image
        header('content-type: image/png');

        $womancart = imagecreatefromjpeg("$uploads_dir/woman/womancart.jpg");
        $womancartX = imagesx($womancart);
        $womancartY = imagesy($womancart);

        $black = imagecolorallocate($womancart, 0, 0, 0);
        $font = realpath('.')."/assets/font/ar.ttf";
                        
        // add fullname
        text($womancart, 17, 0, $black, $font, $name." ".$lastname, 189, 272);

        // add job
        text($womancart, 17, 0, $black, $font, $job, 152, 319);

        // add num
        text($womancart, 17, 0, $black, $font, $num, 175, 368);

        // add level
        text($womancart, 17, 0, $black, $font, $level, 623, 272);

        // add club
        text($womancart, 17, 0, $black, $font, $club, 558, 319);

        // add year
        text($womancart, 17, 0, $black, $font, $year, 623, 368);

        // image end
        imagepng($womancart);
        // imagepng($womancart, "$uploads_dir/woman/cart.png");

        // download("$uploads_dir/woman/cart.png");
        // unlink("$uploads_dir/woman/cart.png");
        // echo "<script>window.close();</script>";

    }elseif($type=='womanInfo'){
        $id = $_GET['id'];
        require("plugin/I18N/Arabic.php");
        require("function.php");
        $Arabic = new I18N_Arabic('Glyphs');

        $woman = woman($id);
        $name = $Arabic->utf8Glyphs($woman['name']);
        $lastname = $Arabic->utf8Glyphs($woman['lastname']);
        $birthday = $woman['birthday'];
        $place = $Arabic->utf8Glyphs($woman['place']);
        $level = $Arabic->utf8Glyphs($woman['level']);
        $job = $Arabic->utf8Glyphs($woman['job']);
        $tele = $woman['tele'];
        $cni = $woman['cni'];
        $address = $Arabic->utf8Glyphs($woman['address']);
        $club = $Arabic->utf8Glyphs(implode(', ', array_reverse(json_decode($woman['club']))));
        $num = $woman['num'];
        $price = $woman['price'];
        $year = date('Y')."/".date('Y', strtotime('+1 year'));

        // start image
        header('content-type: image/png');

        $womaninfo = imagecreatefromjpeg("$uploads_dir/woman/womaninfo.jpg");
        $womancartX = imagesx($womaninfo);
        $womancartY = imagesy($womaninfo);

        $black = imagecolorallocate($womaninfo, 0, 0, 0);
        $font = realpath('.')."/assets/font/ar.ttf";
                
        // add name
        text($womaninfo, 14, 0, $black, $font, $name, 66, 238);

        // add lastname
        text($womaninfo, 14, 0, $black, $font, $lastname, 350, 238);

        // add birthday
        text($womaninfo, 14, 0, $black, $font, $birthday, 66, 353);

        // add place
        text($womaninfo, 14, 0, $black, $font, $place, 350, 353);

        // add level
        text($womaninfo, 14, 0, $black, $font, $level, 66, 464);

        // add job
        text($womaninfo, 14, 0, $black, $font, $job, 350, 464);

        // add tele
        text($womaninfo, 14, 0, $black, $font, $tele, 66, 571);

        // add cni
        text($womaninfo, 14, 0, $black, $font, $cni, 350, 571);

        // add address
        text($womaninfo, 14, 0, $black, $font, $address, 66, 681);

        // add club
        text($womaninfo, 14, 0, $black, $font, $club, 66, 790);

        // add num
        text($womaninfo, 14, 0, $black, $font, $num, 350, 790);
        
        // add year
        text($womaninfo, 14, 0, $black, $font, $year, 66, 900);

        // image end
        imagepng($womaninfo);

        // $result=[
        //     'success' => 1,
        //     'path' => "/woman/info.png",
        //     'download' => true,
        //     'unlink' => true,
        // ];
        // header('Content-type: application/json');
        // echo json_encode($result,JSON_PRETTY_PRINT);

        // $fileName = basename("$uploads_dir/woman/info.png");
        // header("Content-disposition: attachment; filename=$fileName");
        // header('Content-Description: File Transfer');
        // readfile("$uploads_dir/woman/info.png");

        // download("$uploads_dir/woman/info.png");
        // unlink("$uploads_dir/woman/info.png");
        // echo "<script>window.close();</script>";
    }

    // echo "<script>window.close();</script>";

    function text($img, $size, $angl, $black, $font, $string, $endX, $endY){
        // 0	lower left corner, X position imagettfbbox
        // 1	lower left corner, Y position imagettfbbox
        // 2	lower right corner, X position imagettfbbox
        // 3	lower right corner, Y position imagettfbbox
        // 4	upper right corner, X position imagettfbbox
        // 5	upper right corner, Y position imagettfbbox
        // 6	upper left corner, X position imagettfbbox
        // 7	upper left corner, Y position imagettfbbox
        $box = imagettfbbox($size, $angl, $font, $string);
        $endX = imagesx($img)-$endX;
        $startX = $endX - $box[2];
        $startY = $endY;
        imagettftext($img, $size, $angl, $startX, $startY, $black, $font, $string);
    }

    function imagecreatefromtype($file){

        if(!file_exists($file))
            return false;

        $imageType = exif_imagetype($file);

        $functions = array(
            IMAGETYPE_GIF => 'imagecreatefromgif',
            IMAGETYPE_JPEG => 'imagecreatefromjpeg',
            IMAGETYPE_PNG => 'imagecreatefrompng',
            IMAGETYPE_WBMP => 'imagecreatefromwbmp',
            IMAGETYPE_XBM => 'imagecreatefromwxbm',
            );

        $functionsKeys = array_keys($functions);

        if(!in_array($imageType , $functionsKeys))
            return false;

        return $functions[$imageType]($file);
    }