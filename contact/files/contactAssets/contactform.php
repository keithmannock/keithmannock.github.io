<?php

	function utf8_urldecode($str) { $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str)); return html_entity_decode($str,null,'ISO-8859-1');; } 

	function mail_utf8($to, $subject = '(No subject)', $message, $headers) {
	$header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
	return mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $headers);
	}
	
	//function mail_utf8html($to, $subject = '(No subject)', $message, $headers) {
	//$header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
	//return mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $headers);
	//}

	$stackid = trim($_POST['stackid']);
	$cleanowneremail = include(dirname(__FILE__) . '/../'.$stackid.'config_e.php');
	

    $emaillabel = strip_tags($_POST['emaillabel']);
    $namelabel = strip_tags($_POST['namelabel']);
    $subjectlabel = strip_tags($_POST['subjectlabel']);
    $messagelabel = strip_tags($_POST['messagelabel']);
    
    $mail = $_POST['mail'];
    $name = strip_tags($_POST['name']);
    $subject = strip_tags($_POST['subject']);
    $text = trim($_POST['text']);
    $text = utf8_urldecode($text);
    //$text = stripslashes($text);
    
    //$owneremail = $_POST['owneremail'];
	//$cleanowneremail = substr($owneremail, 7); // removes "obscure"

	
	

    $recipientEmail = explode(',', $cleanowneremail);
    foreach($recipientEmail as $value) {
	$to = trim($value);
	$subject = stripslashes($subject);
	$message = trim($emaillabel)." : ".trim($mail)."\n".trim($namelabel)." : ".trim($name)."\n".trim($subjectlabel)." : ".trim($subject)."\n ".trim($messagelabel)." : ".$text."\n\nForm = ".trim($_POST['formname']);
	$message = stripslashes($message);
	if(trim($_POST['compatibility']) == "true"){
		$headers = "From: " . $cleanowneremail . "\n";
		$headers .= "Reply-To: ". $cleanowneremail . "\n";
	}else{
		$headers = "From: " . $mail . "\n";
		$headers .= "Reply-To: ". $mail . "\n";
	}

    if(mail_utf8($to,$subject,$message,$headers)){
    echo "success"; // we should get this echoed back
    }
    else{
    echo "error";
    }
	    }


	

	$autoreply = trim($_POST['autoreply']);
	$autoreply = utf8_urldecode($autoreply);
	$autoreplysig = $_POST['autoreplysig']; // if auto reply is selected in the stack
	$autoreplysub = $_POST['autosubject'];
	if($autoreply != "noreply"){
	$autoreplysig = utf8_urldecode($autoreplysig);
	$autoreply = stripslashes($autoreply)."<br /><br />".stripslashes($autoreplysig);
	//$autoreply .= "<br /><br />Your Message : ".$text;
	$autoreplysubject = utf8_urldecode($autoreplysub);
    $headers = "From: " . $cleanowneremail . "\r\n";
    $headers .= "Reply-To: ". $cleanowneremail . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($mail,$autoreplysubject,$autoreply,$headers);
    }
    
?>