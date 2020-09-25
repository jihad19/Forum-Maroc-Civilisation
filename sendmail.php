
<?php
  //require_once 'mailer/class.phpmailer.php'; 
  require_once './mailer/class.phpmailer.php'; 
  // creates object
  $mail = new PHPMailer(true); 
  if(isset($_POST['send']))
  {
   $email      = strip_tags($_POST['userEmail']);
  // $subject    = strip_tags($_POST['subject']);
   $text_message    = "Hello";      
   $msg  = strip_tags($_POST['msg']);
 try
   {
    $mail->IsSMTP(); 
    $mail->isHTML(true);
    $mail->SMTPDebug  = 0;                     
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = "ssl";                 
    $mail->Host       = "smtp.gmail.com";    
    $mail->Port        = '465';             
    $mail->AddAddress($email);
    $mail->Username   ="divyasundarsahu@gmail.com";  
    $mail->Password   ="gmail-password";            
    $mail->SetFrom("zakia.antary@gmail.com","abdo antary");//('divyasundarsahu@gmail.com','Divyasundar Sahu');
    $mail->AddReplyTo("zakia.antary@gmail.com","zakia antary");//("divyasundarsahu@gmail.com","Divyasundar Sahu");
    //$mail->Subject    = $subject;
    $mail->Body    = $msg;
    $mail->AltBody    = $msg;
     
    if($mail->Send())
    {
     
     $msg = "Hi, Your mail successfully sent to".$email." ";
     
    }
   }
   catch(phpmailerException $ex)
   {
    $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
   }
  } 
  
?>