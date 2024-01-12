<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// Include Config
if ( $_SERVER["HTTP_HOST"] == "localhost" ) {
    include $_SERVER["DOCUMENT_ROOT"] . "/godspower/backend/config.php";
} else {
    include $_SERVER["DOCUMENT_ROOT"] . "/backend/config.php";
}

require SERVER_PATH . 'phpmailer/vendor/autoload.php';

class Email {

    public function send() {

        // Create an instance; passing true enables exceptions
        $mail = new PHPMailer(true);
        
        try {
            // Server Settings
            $mail->isSMTP();
            $mail->Host = 'techsurer.com';  // Update with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'godspower@techsurer.com'; // Update with your SMTP username
            $mail->Password = 'CmS-$A*PWeoR'; // Update with your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                // Retrieve the sender's information here (you can add more validation here)
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
    
                // Recipients
                $mail->setFrom('godspower@techsurer.com', 'Godspower Itedjere Website'); // Update with your email address
                $mail->addAddress('godspower@techsurer.com', 'Godspower Itedjere');
                $mail->addReplyTo('godspoweritedjere@gmail.com', 'Godspower Itedjere'); // Update with your email address
    
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'I Want To Hire You, Godspower.';

                $htmlContent = file_get_contents(MAILTEMPLATE_PATH . "email-sent.php");
                $htmlContent = str_replace(['<?php echo $name; ?>', '<?php echo $email; ?>', '<?php echo $subject; ?>', '<?php echo $message; ?>'], [$name, $email, $subject, $message], $htmlContent);
    
                $mail->Body = $htmlContent;
    
                // Send the email
                if ($mail->send()) {
                    // Email sent successfully, you can redirect the user or show a success message
                    return json_encode([
                        "code" => "success",
                        "message" => "Thanks For Contacting Me. I'm Gonna Reply You Soon",
                    ]);
                }
    
                return json_encode([
                    "code" => "error",
                    "message" => "An Error Occurred. Please try again later.",
                ]);
            }
            
        } catch(Exception $e) {
            return json_encode([
                "code" => "error",
                "message" => $mail->ErrorInfo,
            ]);
        }

    }
}

$email = new Email();

?>