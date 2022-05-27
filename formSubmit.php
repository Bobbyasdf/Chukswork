<?php
    $myEmail = "charleschukwudichukwudi@gmail.com";
    if (isset($_POST['message'])) {
		$name = isset($_POST['name']) ? trim($_POST['name']): '';
		$email = isset($_POST['email']) ? trim($_POST['email']): '';
		$message = isset($_POST['message']) ? trim($_POST['message']): '';
		$subject = isset($_POST['subject']) ? trim($_POST['subject']): '';

		if($name == "" || $email == "" || $subject == "" || $message == ""){
			echo "all fields are required";
            return false;
		}else{
			$name = trimData($name);
			$email = trimData($email);
			$subject = trimData($subject);
			$message = trimData($message);
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "please enter a valid email address";
			return false;
		}
		if(true){
            $to = $myEmail;
            $subject = $subject;
            $mailcontent = "
                <div class=\"container\">
                    <div class=\"row\">
                        <h3 class=\"text-center\">Heading</h3>
                        <b>$subject</b>
                        <p> $message </p>
                        <p>sent from $name, $email</p>
                    </div>
                </div>
            ";
            $headers = "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type:text/html;charset:UTF-8"."\r\n";
            $headers .= "From: $email"."\r\n";
            $sent = mail($to, $subject, $mailcontent, $headers);
            if ($sent) {
                echo "Message sent successfully";
                return false;
            } else {
                echo "could not send message, please try again";
                return;
            }
		}
	}else{
		header('location: https://google.com/');
	}

function trimData($data){
	$data = htmlspecialchars($data);
	$data = trim($data);
	$data = stripcslashes($data);
	return $data;
}




?>