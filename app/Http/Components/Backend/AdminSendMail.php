<?php
namespace App\Http\Components\Backend;

require SITE_DIR. 'app/Http/Components/Library/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AdminSendMail
{
	/**
     * $getInstance - Support singleton module.
     * @var null
     */
    private static $getInstance = null;

	private function __wakeup(){}

    private function __clone(){}

    private function __construct(){}

    public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
    }
    
    /**
     * Handle send mail
     * @param  string $title     title of mail
     * @param  string $content   content of mail
     * @param  string $mailTo    address mail receive
     * @param  string $nameTo    name of people receive
     * @param  array $addresscc multi mail receive
     * @return void
     */
    public function sendMail( $title, $content, $mailTo, $nameTo, $addresscc = '' ){	
    	$mail = new PHPMailer();
	    //Server settings
	    $mail->isSMTP();
	    $mail->Host = 'smtp.gmail.com';
	    $mail->SMTPAuth = true;
	    $mail->Username = 'ducngoc110@gmail.com';
	    $mail->Password = 'z29012009';
	    $mail->SMTPSecure = 'tls';
	    $mail->Port = 587;

	    //Recipients
	    $mail->setFrom( $mailTo, $title);
	    $mail->addAddress( $mailTo, $nameTo);

	    // Send nulti mail
	    $ccmail = explode(',', $addresscc);
	    $ccmail = array_filter($ccmail);
	    if(!empty($ccmail)){
	        foreach ($ccmail as $k => $v) {
	            $mail->addCC($v);
	        }
	    }

	    //Content
	    $mail->isHTML(true);
	    $mail->Subject = $title;
	    $mail->Body    = $content;

	    if(!$mail->send()) {
	        return 0;
	    } else {
	        return 1;
	    }
	}
}
