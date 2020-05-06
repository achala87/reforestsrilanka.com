<?php
    $toEmail = "reforestsl@gmail.com";
    $mailHeaders = "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
    if(mail($toEmail, "Website Visitor :".$_POST["userName"], $_POST["msg"], $mailHeaders)) {
        print "<p class='success'>Mail Sent.</p>";
    } else {
        print "<p class='Error'>Problem in Sending Mail.</p>";
    }
    die(0);
?>