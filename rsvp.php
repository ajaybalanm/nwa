<?php
	$msg = "no"; 
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $persons    = $_POST['persons'];
    $wedding    = $_POST['wedding'];
    
    if($name !='' && $email!='' && $persons !='' && $wedding !=''){
        $to = "lanternthemes@gmail.com";
	$subject = "RSVP Mail";
	$message = "<p>Dear Admin,</p><p>You have a RSVP request </p><p>Please find the below information</p>
                    <p>Name :".$name."</p>
                    <p>Email :".$email."</p>
                    <p>Number of Persons Attanding :".$persons."</p>
                    <p>Event :".$wedding."</p>";
	$header .= 'To: '.$name.' '.$email. "\r\n";
	$header  = "From:".$email."\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";
	$send = mail ($to,$subject,$message,$header);
        if($send){
	$msg = "ok"; 
	} else{
	$msg = "no"; 
	}
        echo $msg;
    }
	else
	{
		echo $msg;
	}
?>
