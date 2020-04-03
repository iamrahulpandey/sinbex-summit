<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "akdsc03@gmail.com"."rocky.negi03@gmail.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['surname']) ||
        !isset($_POST['company']) ||
        !isset($_POST['position']) ||
        !isset($_POST['country']) ||
        !isset($_POST['city']) ||
        !isset($_POST['address']) ||
        !isset($_POST['postcode']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['email']) ||
        !isset($_POST['expo']) ||
        !isset($_POST['hearaboutus'])
        ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $surname = $_POST['surname']; // required
    $company = $_POST['company']; // required
    $country = $_POST['country']; // not required
    $city = $_POST['city']; // required
    $address = $_POST['address'];// required
    $postcode = $_POST['postcode'];// required
    $phone = $_POST['phone'];// required
    $email_from = $_POST['email'];// required
    $expo = $_POST['expo'];// required
    $hearaboutus = $_POST['hearaboutus'];// required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }
 
  if(!preg_match($string_exp,$surname)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }

  if(!preg_match($string_exp,$company)) {
    $error_message .= 'The event you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }
  if(!preg_match($string_exp,$country)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }
 
  if(!preg_match($string_exp,$city)) {
    $error_message .= 'The event you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }  
  
  if(!preg_match($string_exp,$address)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }
 
  if(!preg_match($string_exp,$postcode)) {
    $error_message .= 'The event you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }

  if(!preg_match($string_exp,$phone)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }
 
  if(!preg_match($string_exp,$expo)) {
    $error_message .= 'The event you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }  
  
  if(!preg_match($string_exp,$hearaboutus)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
    header("Location: error-page.html");
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= " Full Name: ".clean_string($name).clean_string($surname)."\n";
    // $email_message .= "surname: ".clean_string($surname)."\n";
    $email_message .= "Company Name : ".clean_string($company)."\n";
    $email_message .= "Country Name: ".clean_string($country)."\n";
    $email_message .= "City Name: ".clean_string($city)."\n";
    $email_message .= "Address: ".clean_string($address)."\n";
    $email_message .= "Postcode: ".clean_string($postcode)."\n";
    $email_message .= "Phone Number: ".clean_string($phone)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "eExpo: ".clean_string($expo)."\n";
    $email_message .= "Hear About Us: ".clean_string($hearaboutus)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

 
// include your own success html here
 
echo "Thank you for contacting us. We will be in touch with you very soon.";
header("Location: thankyou.html");
 
}
?>