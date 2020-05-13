<?php
require_once 'lib/PHPMailer/PHPMailerAutoload.php';
require_once 'google/vendor/googlesheetdata.php'; //gsheetid
<<<<<<< HEAD
=======
  
  // When user submits the form.
  if(isset($_POST)){ 
     
    if(empty($_POST["userName"])){
        $response = array('error');
        echo json_encode($response); return;
    } 
>>>>>>> 7116d0e1d113a514d3341059cb2d939ef0cf274e

if (isset($_POST)) {

    $userName = htmlspecialchars($_POST["userName"]);
    $userEmail = htmlspecialchars($_POST["userEmail"]);
    $phoneNumber = htmlspecialchars($_POST["phoneNumber"]);
    $message = htmlspecialchars($_POST["msg"]);

<<<<<<< HEAD
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
    $mail->Password = $emailpassword; //load from git ignored file above googlesheetdata.php

    $mail->SetFrom(!empty($userEmail) ? $userEmail : 'info@reforestsrilanka.com', 'RFSL Website');
    $mail->Subject = "Web inquiery - Reforest SriLanka";

    $mail->Body = $body;

    // This message must be come to the reforest srilanka
    $mail->AddAddress('info@reforestsrilanka.com');
    $result = $mail->Send();
    if ($result == 1) {
=======
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
>>>>>>> 7116d0e1d113a514d3341059cb2d939ef0cf274e
        //echo "OK Message"; die();
    } else {
        //echo "Mailer Error: " . $mail->ErrorInfo.'<br>'; echo $mail->Password.'<br/>'; echo $mail->Username;  die();
<<<<<<< HEAD
    }

    // Email will be send to the user if he filled a valid email.
    if (!empty($_POST["userEmail"])) {
=======
      }
  
      // Email will be send to the user if he filled a valid email.
      if(!empty($_POST["userEmail"])){
>>>>>>> 7116d0e1d113a514d3341059cb2d939ef0cf274e
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
        $mailToUser->SetFrom('info@reforestsrilanka.com', 'Reforest Sri Lanka');
        $mailToUser->Subject = "Get in touch - Reforest SriLanka";

        // Message which should be go to the user.
        $mailToUser->Body = "Thank you for contacting us";

        $mailToUser->AddAddress($userEmail);
        $result = $mailToUser->Send();
        if ($result == 1) {
            // Done echo "OK Message";
        } else {
            //echo "Mailer Error: " . $mail->ErrorInfo.'<br>';
        }
    }
    //header("Location: index.php");
    $response = 'Thank you for messaging us';
    echo json_encode($response);return;

}
$response = array('error');
echo json_encode($response);return;