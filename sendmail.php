<?php
require_once('lib/PHPMailer/PHPMailerAutoload.php');
require_once 'google/vendor/googlesheetdata.php'; //gsheetid
  
  // When user submits the form.
  if(isset($_POST)){ 
     
    if(empty($_POST["userName"])){
        $response = array('error');
        echo json_encode($response); return;
    } 

    // Google recapcha
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
      'secret' => $secretKey,
      'response' => htmlspecialchars($_POST["token"]),
      'remoteip' => $_SERVER['REMOTE_ADDR']
    ];
    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
  	$response = file_get_contents($url, false, $context);

    $res = json_decode($response, true);
    
		if($res['success'] == true) {

      $userName = htmlspecialchars($_POST["userName"]);
      $userEmail = htmlspecialchars($_POST["userEmail"]);
      $phoneNumber = htmlspecialchars($_POST["phoneNumber"]);
      $message = htmlspecialchars($_POST["msg"]);
  
      // Setup email body.
      $body = "<p><b>Name</b> : $userName</p>\n<p><b>Email</b> : $userEmail</p> \n<p><b>phoneNumber</b> : $phoneNumber</p>\n<p><b>Message</b> : $message</p>\n";
  
      // Use PHPMailer class.
      $mail = new PHPMailer();
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'ssl';
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = '465';
      $mail->isHTML();
      // Add email of the account.
      $mail->Username = 'info@reforestsrilanka.com';
      // Add password of the account
      $mail->Password = $emailpassword;//load from git ignored file above googlesheetdata.php
        
      $mail->SetFrom(!empty($userEmail) ? $userEmail :'info@reforestsrilanka.com','RFSL Website');
      $mail->Subject = "Web inquiery - Reforest SriLanka";
  
      $mail->Body = $body;
  
      // This message must be come to the reforest srilanka
      $mail->AddAddress('info@reforestsrilanka.com');
      $result = $mail->Send();
      if($result == 1){
        //echo "OK Message"; die();
      } else {
        //echo "Mailer Error: " . $mail->ErrorInfo.'<br>'; echo $mail->Password.'<br/>'; echo $mail->Username;  die();
      }
  
      // Email will be send to the user if he filled a valid email.
      if(!empty($_POST["userEmail"])){
        $mailToUser = new PHPMailer();
  
        $mailToUser->isSMTP();
        $mailToUser->SMTPAuth = true;
        $mailToUser->SMTPSecure = 'ssl';
        $mailToUser->Host = 'smtp.gmail.com';
        $mailToUser->Port = '465';
        $mailToUser->isHTML();
        // Add email of the account.
        $mailToUser->Username = 'info@reforestsrilanka.com';
        // Add password of the account
        $mailToUser->Password = $emailpassword;
        $mailToUser->SetFrom('info@reforestsrilanka.com','Reforest Sri Lanka');
        $mailToUser->Subject = "Get in touch - Reforest SriLanka";
  
        // Message which should be go to the user.
        $mailToUser->Body = "Thank you for contacting us";
  
        $mailToUser->AddAddress($userEmail);
        $result = $mailToUser->Send();
        if($result == 1){
          // Done echo "OK Message";
        } else {
          //echo "Mailer Error: " . $mail->ErrorInfo.'<br>';
        }
      }
      //header("Location: index.php");
      $response = 'Thank you for messaging us';
      echo json_encode($response); return;
			
		} 
  }

  $response = array('error');
  echo json_encode($response); return;
?>