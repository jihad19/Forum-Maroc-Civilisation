
<?php
if(!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$email = $_POST["userEmail"];
	//$subject = $_POST["subject"];
    $msg= $_POST["msg"];

	$toEmail = "zakia.antary@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $msg, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}
}
require_once ("sendmail.php");
?>
















<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta   charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact_us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
</head>
<body>

   
  <div class="row">
    <div class="sd2"><h1>إتصل بنا</h1></div>
  </div>
<form action="sendmail.php" method="POST">

<div class="contact">
<div style="max-width:400px;margin:auto"> 
    <div class="input-icons"> 
        <label for=""  >الإسم والنسب</label><br>
        <i class="fa fa-user icon"></i> 
        <input name="userName" class="input-field" type="text"> 
        <label for="">الإيميل</label><br>
        <i class="fa fa-envelope icon"></i> 
        <input name="userEmail" class="input-field" type="text">
        <label for="" class="msg">الرسالة</label><br> 
        <input id="msg" class="input-field" name="msg" type="text"> 
        <button name="send" class="envoye" >أرسل</button>
    </div> 
</div>
</form>
 <div class="image">
    <img src="images/contact-us.svg" alt="contact" height="600px">
</div>
 </div> 
</body>
</html>