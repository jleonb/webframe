<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jaime.leon.betancourt@gmail.com";
    $email_subject = "WEBFRAME";
 
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
        !isset($_POST['phone']) ||
        !isset($_POST['email']) ||        
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $name = $_POST['name']; // required
    $phone = $_POST['phone']; // required
    $email_from = $_POST['email']; // required 
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    
 
    $email_message = "Los detalles son\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Nombre: ".clean_string($name)."\n";
    $email_message .= "Teléfono: ".clean_string($phone)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n"; 
    $email_message .= "Mensaje: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$name."\r\n".
'Reply-To: '.$name."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
sleep(2);
echo "<meta http-equiv='refresh' content=\"0; url=https://webframe.cl\">";
?>
 
<?php
}
?>