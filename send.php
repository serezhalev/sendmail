<?php
    $msg_box = "";
    if(filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) === FALSE) $error = "E-mail incorrect";
    if($_POST['user_name'] == "")    $error = "Fill all fields";
 
    if($error==""){
        $message  = "Name: " . $_POST['user_name'] ;
        $message .= "E-mail: " . $_POST['user_email'] ;
        send_mail($message);
        $msg_box = "<span>successfully sended</span>";
    }else{
        $msg_box = "";
        $msg_box = "<span>$error</span>";
        
    }
    echo json_encode(array(
        'result' => $msg_box
    ));

    function send_mail($message){
        $mail_to = "1@serezhalev.ru"; 
        $subject = "Feedback message";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: Test <no-reply@test.com>\r\n";
        mail($mail_to, $subject, $message, $headers);
    }
     
?>