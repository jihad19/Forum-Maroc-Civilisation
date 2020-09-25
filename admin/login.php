<?php 
  require "function.php";

  if(!isset($_SESSION['ref']) && isset($_SERVER["HTTP_REFERER"]) && strstr($_SERVER["HTTP_REFERER"],'login.php') == false){
    $_SESSION['ref'] = $_SERVER["HTTP_REFERER"];
  }

  $msg = null;
  if(isset($_POST['submit'])){
    $length = 32;
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    if($user = getData($sql)){
      if(isset($_POST['remember'])){
        $token = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
        $sql = "UPDATE users SET token='$token' where id={$user['id']}";
        if(setData($sql)){
          setcookie("rememberMe", $token, time()+60*60*24*999);
        }
      }
      $_SESSION['login']['status'] = true;
      $_SESSION['login']['data'] = $user;

      $goto = "index.php";
      if(isset($_SESSION['ref'])){
        $goto = $_SESSION['ref'];
        unset($_SESSION['ref']);   
      }   
      header("Location: $goto");
    }else{
      $msg = "Username or Password are not correct";
    }
  }

?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Beagle</title>
    <link rel="stylesheet" type="text/css" href="<?=asset("./login_files/perfect-scrollbar.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=asset("./login_files/material-design-iconic-font.min.css")?>">
    <link rel="stylesheet" href="<?=asset("css/app.css")?>" type="text/css">
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="card card-border-color card-border-color-primary">
              <?php 
                  if(!empty($msg)){
                    echo '<span class="splash-description text-danger">'.$msg.'</span>';
                  }
              ?>
              <div class="card-header"><img class="logo-img" src="<?=asset("img/logo.png")?>" alt="logo" width="102" height="27"><span class="splash-description">Please enter your user information.</span></div>
              <div class="card-body">
                <form action="<?=$_SERVER['PHP_SELF']?>" method='POST'>
                  <div class="form-group">
                    <input class="form-control" id="username" type="text" placeholder="Username" autocomplete="off" name="user">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="password" type="password" placeholder="Password" name="pass">
                  </div>
                  <div class="form-group row login-tools">
                    <div class="col-6 login-remember">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="checkbox1" name="remember" checked>
                        <label class="custom-control-label" for="checkbox1">Remember Me</label>
                      </div>
                    </div>
                    <div class="col-6 login-forgot-password d-none"><a href="#">Forgot Password?</a></div>
                  </div>
                  <div class="form-group login-submit"><button class="btn btn-primary btn-xl" type="submit" name="submit">Sign me in</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=asset("./login_files/jquery.min.js.download")?>" type="text/javascript"></script>
    <script src="<?=asset("./login_files/perfect-scrollbar.min.js.download")?>" type="text/javascript"></script>
    <script src="<?=asset("./login_files/bootstrap.bundle.min.js.download")?>" type="text/javascript"></script>
    <script src="<?=asset("./login_files/app.js.download")?>" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
  
<div class="be-scroll-top"></div></body></html>