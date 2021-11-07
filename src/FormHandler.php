<?php
namespace FormGuide\Handlx;
use FormGuide\PHPFormValidator\FormValidator;
use PHPMailer;
use FormGuide\Handlx\Microtemplate;
use Gregwar\Captcha\CaptchaBuilder;

class FormHandler
{
	private $emails;
	public $validator;
	private $mailer;
	private $mail_template;
	private $captcha;
	private $attachments;
	private $recaptcha;

	public function __construct()
	{
		$this->emails = array();
		$this->validator = FormValidator::create();
		$this->mailer = new PHPMailer;
		$this->mail_template='';

		$this->mailer->Subject = "Contact Form Submission ";

		$host = isset($_SERVER['SERVER_NAME'])?$_SERVER['SERVER_NAME']:'localhost';
        $from_email ='forms@'.$host;
   		$this->mailer->setFrom($from_email,'Contact Form',false);  

   		$this->captcha = false;   

   		$this->attachments = [];

   		$this->recaptcha =null;


	}


	public function sendEmailTo($email_s)
	{
		if(is_array($email_s))
		{
			$this->emails =array_merge($this->emails, $email_s);
		}
		else
		{
			$this->emails[] = $email_s;	
		}
		
		return $this;
	}

	public function useMailTemplate($templ_path)
	{
		$this->mail_template = $templ_path;
		return $this;
	}


	public function attachFiles($fields)
	{
		$this->attachments = array_merge($this->attachments, $fields);
		return $this;
	}

	public function getRecipients()
	{
		return $this->emails;
	}


	public function validate($validator_fn)
	{
		$validator_fn($this->validator);
		return $this;
	}

	public function requireReCaptcha($config_fn=null)
	{
		$this->recaptcha = new ReCaptchaValidator();
		$this->recaptcha->enable(true);
		if($config_fn)
		{
			$config_fn($this->recaptcha);	
		}
		return $this;
	}
	public function getReCaptcha()
	{
		return $this->recaptcha;
	}

	public function requireCaptcha($enable=true)
	{
		$this->captcha = $enable;
		return $this;
	}

	public function getValidator()
	{
		return $this->validator;
	}

	public function configMailer($mailconfig_fn)
	{
		$mailconfig_fn($this->mailer);
		return $this;
	}

	public function getMailer()
	{
		return $this->mailer;
	}

	public static function create()
	{
		return new FormHandler();
	}

	public function process($post_data)
	{
		if($this->captcha === true)
		{
			$res = $this->validate_captcha($post_data);
			if($res !== true)
			{
				return $res;
			}
		}
		if($this->recaptcha !== null &&
		   $this->recaptcha->isEnabled())
		{
			if($this->recaptcha->validate() !== true)
			{
				return json_encode([
				'result'=>'recaptcha_validation_failed',
				'errors'=>['captcha'=>'ReCaptcha Validation Failed.']
				]);
			}
		}

		$this->validator->test($post_data);

		//if(false == $this->validator->test($post_data))
		if($this->validator->hasErrors())
		{
			return json_encode([
				'result'=>'validation_failed',
				'errors'=>$this->validator->getErrors(/*associative*/ true)
				]);
		}

		if(!empty($this->emails))
		{
			foreach($this->emails as $email)
			{
				$this->mailer->addAddress($email);
			}
			$this->compose_mail($post_data);

			if(!empty($this->attachments))
			{
				$this->attach_files();
			}

			if(!$this->mailer->send())
			{
				return json_encode([
					'result'=>'error_sending_email',
					'errors'=> ['mail'=> $this->mailer->ErrorInfo]
					]);			
			}
		}
		
		return json_encode(['result'=>'success']);
	}

	private function validate_captcha($post)
	{
		@session_start();
		if(empty($post['captcha']))
		{
			return json_encode([
						'result'=>'captcha_error',
						'errors'=>['captcha'=>'Captcha code not entered']
						]);
		}
		else
		{
			$usercaptcha = trim($post['captcha']);

			if($_SESSION['user_phrase'] !== $usercaptcha)
			{
				return json_encode([
						'result'=>'captcha_error',
						'errors'=>['captcha'=>'Captcha code does not match']
						]);		
			}
		}
		return true;
	}


	private function attach_files()
	{
		
		foreach($this->attachments as $file_field)
		{
			if (!array_key_exists($file_field, $_FILES))
			{
				continue;
			}
			$filename = $_FILES[$file_field]['name'];

    		$uploadfile = tempnam(sys_get_temp_dir(), sha1($filename));

    		if (!move_uploaded_file($_FILES[$file_field]['tmp_name'], 
    			$uploadfile))
    		{
    			continue;
    		}

    		$this->mailer->addAttachment($uploadfile, $filename);
		}
	}

	private function compose_mail($post)
	{
		$content = "Form submission: \n\n";
		foreach($post as $name=>$value)
		{
			$content .= ucwords($name).":\n";
			$content .= "$value\n\n";
		}
		$this->mailer->Body  = $content;
	}
}