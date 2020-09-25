<?php
    session_start();

    $originPath = "/MarocCivilisationCODE/admin"; //path for admin 
    $root = "{$_SERVER['DOCUMENT_ROOT']}$originPath"; // root script path
    $uploads_dir = "$root/resource";
    $listOfClub = ['القرأن الكريم','الخياطة','الحلويات'];
    $listDayOff = ['الإثنين و الخميس','الثلاثاء و الجمعة','الاربعاء والسبت'];
    
    @$con = new mysqli('localhost','root','','MaCiviliForum');
    if($con->connect_errno) die("Error : ".$con->connect_error);

    // database functions 
    function allData($sql){
        global $con;
        return $con->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getData($sql){
        global $con;
        $res = $con->query($sql);
        if($res->num_rows)
        return $res->fetch_assoc();
        return false;
    }

    function setData($sql){
        global $con;
        if($con->query($sql)) return true;
        return false;
    }

    // for contact table
    function contacts(){
        return allData("select * from contacts order by id desc");
    }

    function contact($id){
        return getData("select * from contacts where id=$id");
    }

    // for student table
    function students(){
        return allData("select * from students order by id desc");
    }

    function student($id){
        return getData("select * from students where id=$id");
    }

    // for womem table
    function women(){
        return allData("select * from women order by id desc");
    }

    function woman($id){
        return getData("select * from women where id=$id");
    }

    // for Posts table
    function posts(){
        return allData("select * from posts ORDER BY id DESC");
    }

    function post($id){
        return getData("select * from posts where id=$id");
    }

    // not used
    function download($file){
        if(file_exists($file)){
            $fileName = basename($file);
            header("Content-disposition: attachment; filename=$fileName");
            header('Content-Description: File Transfer');
            readfile($file);
            return true;
        }
        return false;
    }

    function asset($file){
        global $originPath;
        $file = trim($file,'/');
        $file = "$originPath/assets/$file";
        return $file;
    }

    function resource($file){
        global $originPath;
        $file = trim($file,'/');
        $file = "$originPath/resource/$file";
        return $file;
    }

    function setError($message){
        if(empty($message))
        return false;
    
        if(is_array($message))
            foreach($message as $k=>$v){
                $_SESSION['dev-error'][$k] = $v;
            }
        else
        $_SESSION['dev-error'][] = $message;
    
        return true;
    }

    function getError(){
        if(isset($_SESSION['dev-error'])){
            $msg = $_SESSION['dev-error'];
            unset($_SESSION['dev-error']);
            return $msg;
        }
        return false;
    }

    function setMessage($message){
        if(empty($message))
        return false;
        
        if(is_array($message))
            foreach($message as $k=>$v){
                $_SESSION['dev-msg'][$k] = $v;
            }
        else
        $_SESSION['dev-msg'][] = $message;
    
        return true;
    }

    function getMessage(){
        if(isset($_SESSION['dev-msg'])){
            $msg = $_SESSION['dev-msg'];
            unset($_SESSION['dev-msg']);
            return $msg;
        }
        return false;
    }

    function showMessages(){
        if($msgs = getMessage()):
            foreach($msgs as $msg):?>
                <div class="alert alert-contrast alert-success alert-dismissible" role="alert">
                    <div class="icon">
                        <span class="mdi mdi-check"></span>
                    </div>
                    <div class="message">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span class="mdi mdi-close" aria-hidden="true"></span>
                        </button>
                        <strong>Good!</strong>
                        <?=$msg?>
                    </div>
                </div>

            <?php endforeach;
        endif;
    }

    function showErrors(){
        if($msgs = getError()):
            foreach($msgs as $msg):?>
                <div class="alert alert-contrast alert-danger alert-dismissible" role="alert">
                    <div class="icon">
                        <span class="mdi mdi-close-circle-o"></span>
                    </div>
                    <div class="message">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span class="mdi mdi-close" aria-hidden="true"></span>
                        </button>
                        <strong>Danger!</strong>
                        <?=$msg?>
                    </div>
                </div>
            <?php endforeach;
        endif;
    }

    function dd($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function is_logged_in(){
        global $originPath;
        $current_url = $_SERVER["REQUEST_URI"];
        $_SESSION['ref'] = $_SERVER["REQUEST_URI"];
        if(isset($_SESSION['login']['status'])){
            return true;
        }elseif(isset($_COOKIE['rememberMe'])){
            $sql = "SELECT * FROM users WHERE token='{$_COOKIE['rememberMe']}'";
            if($user = getData($sql)){
                $_SESSION['login']['status'] = true;
                $_SESSION['login']['data'] = $user;
                return true;
            }
        }
        header("Location: $originPath/login.php");
        return false;
    }

    // groupe by years the months
    function group_by_date($data) {
        $result = array();
    
        foreach($data as $val) {
            $date = $val['created_at'];
            $year = date("Y",strtotime($date));
            $moth = date("m",strtotime($date));
            $result[$year][$moth][] = $val;
        }
        
        krsort($result);
        $result = array_map('krsort_multi', $result);
        return $result;
    }

    function krsort_multi($array){
        krsort($array);
        return $array;
    }
    
    // get number of month from an grouped array
    function get_num_month($data, $num=10){
        $cM = 0; // month taked
        $result = [];
        if(is_array($data)){
            foreach($data as $years=>$months){
                if(is_array($months)){
                    foreach($months as $month){
                        $result[] = $month;
                        if(++$cM == $num)break(2);
                    }
                }
            }
            return $result;
        }
        return $data;
    }

    function count_user_for_month($data){
        $result = [];
        foreach($data as $months){
            $result[] = count($months);
        }
        return $result;
    }

    