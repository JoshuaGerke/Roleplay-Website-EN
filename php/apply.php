<?php
if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $agency = $_POST['subject'];
    $emailAddress = $_POST['email'];

    $message = "
    Name: " . $_POST['username'] . 
    "Email : " . $_POST['email'] .
    "<br><br>Rank : <br>" . $_POST['subject'] .
    "<br><br>Message : <br>" . $_POST['body'];
    switch($_POST['subject']){
        case 'Developer':
            $message .= "<br><br>Developer : <br>" .
            "<br><br>Question1 : <br>" . $_POST['dev-scriptsprache'] .
            "<br><br>Question2 : <br>" . $_POST['dev-vorstellung'] .
            "<br><br>Question3 : <br>" . $_POST['dev-since'] .
            "<br><br>Question4 : <br>" . $_POST['dev-network'] .
            "<br><br>Question5 : <br>" . $_POST['dev-time'];
            break;
        case 'Supporter':
            $message .= "<br><br>Supporter : <br>" .
            "<br><br>Question1 : <br>" . $_POST['sup-aufgabe'] .
            "<br><br>Question2 : <br>" . $_POST['sup-start'] .
            "<br><br>Question3 : <br>" . $_POST['sup-begriff'] .
            "<br><br>Question4 (Circa) : <br>" . $_POST['sup-time'] .
            "<br><br>Question5 : <br>" . $_POST['sup-right'] .
            "<br><br>Question6 : <br>" . $_POST['sup-online'];
            break;
        case 'Concept':
            $message .= "<br><br>Concept : <br>" .
            "<br><br>Question1 : <br>" . $_POST['kon-tools'] .
            "<br><br>Question2 : <br>" . $_POST['kon-fertig'] .
            "<br><br>Question3 : <br>" . $_POST['kon-worauf'] .
            "<br><br>Question4 : <br>" . $_POST['kon-limit'] .
            "<br><br>Question5 : <br>" . $_POST['kon-setting'] .
            "<br><br>Question6 : <br>" . $_POST['kon-online'];
            break;
        case 'others':
            $message .= "<br><br>Others : <br>" .
            "<br><br>Question1 : <br>" . $_POST['son-beschreibung'] .
            "<br><br>Question2 : <br>" . $_POST['son-aufgaben'] .
            "<br><br>Question3 : <br>" . $_POST['son-erfahrung'] .
            "<br><br>Question4 : <br>" . $_POST['son-time'] .
            "<br><br>Question5 : <br>" . $_POST['son-setting'] .
            "<br><br>Question6 : <br>" . $_POST['son-online'];
            break;
    }
    

    require '../phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->isSMTP();

    // Enter SMTP outbox:
    $mail->Host = ""; // e.g. smtp.1und1.de

    $mail->IsHTML(true);
    $mail->SMTPAuth = true;

    // Login and password of the recipient email
    $mail->Username = ""; // e.g. info@techkings.de
    $mail->Password = ""; // Password Email / Username

    // Encryption protocol
    $mail->SMTPSecure = "tls";
    $mail->Port = 25; // Port for SMTP

    $mail->Subject = "Request via Website";
    $mail->Body = $message;
    $mail->setFrom("info@techkings.de", $username); // Deliverer email
    $mail->addAddress('CommanderDonkey@gmail.com'); // email recipient


    try{
        if($mail->send()){
            header("Location: ../succeed.html");
            exit();
        } else {
            header("Location: ../error.html");
        }
    } catch(Exception $e){
        echo $e->getMessage();
    }
}