<?php
class FeedbackController extends Controller
{
    public $defaultAction='send';

    public function actionSend()
    {
        /* @var $contacts LuxContactInfo */

        $name = Yii::app()->request->getParam('name',null);
        $email = Yii::app()->request->getParam('mail',null);
        $message = Yii::app()->request->getParam('message',null);

        $cap_id = Yii::app()->request->getParam('cap_id',null);
        $cap = Yii::app()->request->getParam('cap',null);

        $contacts = LuxContactInfo::model()->findAll();
        if(count($contacts) > 0){$contact = $contacts[0];}else{$contact = new LuxContactInfo();}

        $success = 0;

        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $captcha = new DwCaptcha();
            if(strlen($message) < 10 || !$captcha->CheckCaptcha($cap,$cap_id))
            {
                $success = 0;
            }
            if(strlen($message) > 10 && $captcha->CheckCaptcha($cap,$cap_id))
            {
                $success = 1;

                $subject = $contact->getLngObject(Yii::app()->language)->feedback_subject;
                $to = $contact->administrator_email;

                //send email
                $headers = array();
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-type: text/plain; charset=iso-8859-1";
                $headers[] = "From: ".$name." <".$email.">";
                $headers[] = "Subject: {$subject}";
                $headers[] = "X-Mailer: PHP/".phpversion();
                mail($to, $subject, $message, implode("\r\n", $headers));
            }
        }

        if($success == 1){
            $this->redirect(UrlHelper::GetActionUrl('pages','index').'#contacts');
        }
        else{
            $this->redirect(UrlHelper::GetActionUrl('pages','index',array('error' => 1)).'#contacts');
        }

    }
}