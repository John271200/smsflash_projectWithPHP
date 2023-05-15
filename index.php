<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Send Flash SMS</h2>
    <form method="post" action="">
        <label for="recipient">Recipient:</label>
        <input type="text" name="recipient" id="recipient" required><br><br>
        
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea><br><br>
        
        <input type="submit" name="submit">
    </form>
</body>
</html>
<?php 
if (isset($_POST['submit'])) {

    require_once 'vendor/autoload.php';
    $sid = "ACf3ea7bdce0c81e729d8247a48d3c78aa";
    $token = "3e28f0328c3a7db96300916942b99fb1";
    // = new Client($sid, $token);
    //$twilio= new Client ($sid, $jeton);
    $twilio= new Twilio\Rest\Client($sid, $token);
    $recipient = $_POST['recipient'];
    $message = $_POST['message'];
    
    $message = $twilio->messages->create(
        $recipient,
        array(
            //"to"=>$recipient, 
            "from" => "+12705176425",
            "body" => $message,
            "mode" => true
        )
    );
    //echo "SMS sent successfully! SID: " . $message->sid . ";
    echo "Le message a été envoyé avec succès";

    
}
?>