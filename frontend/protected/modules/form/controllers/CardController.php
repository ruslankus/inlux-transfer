<?php

class CardController extends UPostController
{
	public $userName;
    
    
    
    public function actionIndex()
	{
	   
        $this->userName = Yii::app()->user->getState('name');
        
		$this->render('index');
	}// index;
    
    
    public function actionBallance(){
        
        $request = Yii::app()->request;
        if($request->isPostRequest){        
            
            $number = $request->getPost('number');;
            $xmlRes = $this->get_card_ballance($number);
        
            @$objBall = simplexml_load_string($xmlRes);        
        
            if($objBall){            
                $card_ball = (float)$objBall->card->balance;        
                $card_ball = number_format($card_ball,2);    
                $this->render('check_ballance',array('crdBall' =>$card_ball,'number' => $number));               
            }else{
                echo $xmlRes;                
            }
        }else{
            //exception
        }
    
    }// ballance
    
    
    public function actionTopup(){
    
        $request = Yii::app()->request;
        if($request->isPostRequest){ 
            $number = $request->getPost('number');
            $ball = $request->getPost('ammount');
            $xmlRes = $this->set_card_ballance($number,$ball);       
        
            @$objBall = simplexml_load_string($xmlRes);
            if($objBall = true){            
                
                //logiruem
                $ops = new Opslog();
                $ops->user_id = Yii::app()->user->getState('user_id');
                $ops->number = $number;
                $ops->ammount = $ball * 100;
                $ops->date = time();
                $ops->save();
                                                
                $this->render('topup_succ',array('ammount' => $ball, 'number' => $number));
                
            }else{
                echo $xmlRes;
            } 
        }else{
            //exception            
        }
    }
    
    
    public function actionHistory(){
        
        $user_id = Yii::app()->user->getState('user_id'); 
        
        $objUser = UsersCards::model()->findByPk($user_id);        
        $ops = Opslog::model()->findAllByAttributes(array('user_id' => $user_id));
        
        $this->render('history',array('ops'=>$ops,'user'=> $objUser->name));
    }
    
    
    
     public function actionLogin()
    {
        $this->layout = 'login';
        $model=new LoginForm;
        
        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form-login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */
        
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            if($model->validate() && $model->login()) 
            {
                // form inputs are valid, redirect to module index page
                $this->redirect('index'); 
                
            }
        }
        $this->render('login',array('model'=>$model));
    }// login
    
    
    /**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('login');
	}
    
    
    public function actionPass($id = null){
        if(!empty($id)){
            echo "<h2>".md5($id)."</h2>";
        }
    }
    
    
     /**
     * Ajax request
     * validate number 
     */
    public function actionCheckNumber(){
        
        $data = array();
        
        $request = Yii::app()->request;    
        
        if($request->isAjaxRequest)
        {
            $number = $request->getPost('number');            
            $countNumber = Numbers::model()->countByAttributes(array('pnumber' => $number));
            
            if($countNumber == 0){            
                $data['message'] = 'Wrong number';
                $data['status'] = 0;
            }
            else
            {            
                $data['status'] = 1;
            }
            
            echo json_encode($data); 
        
        }
        else
        {
            throw new CHttpException(404, 'The requested page does not exist.');
            break;
        }// $request->isAjaxRequest
           
        
    }//CheckNumber
    
    
    
    
    /* --- XML part -----*/
    
    
    /* xml pull */
    /* LT data */
    private $ltPass = 'ahMcUUPk4e';
    private $ltLogin = 'netforms.eur';
    private $ltGate = 'http://www.travelsim.lt/scripts/netformsproxy.php';
    /* CN data */
    private $cnPass = 'AtzeaPssv1';
    private $cnLogin = 'Lv5CxR6AQH';   
    private $cnGate = 'https://xml2.travelsim.com/tsim_xml/service/xmlgate';
    
    private function get_card_ballance($number){
   
        $curl = curl_init(); //инициализация сеанса
        curl_setopt($curl, CURLOPT_URL, $this->ltGate); //урл сайта к которому обращаемся 
        curl_setopt($curl, CURLOPT_HEADER,false); //выводим заголовки
        curl_setopt($curl, CURLOPT_POST, true); //передача данных методом POST
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true); //теперь curl вернет нам ответ, а не выведет
        

        curl_setopt($curl, CURLOPT_POSTFIELDS, //тут переменные которые будут переданы методом POST 
            array (
            'curr'=>'EUR',
            'plain'=>'1',
            'onum'=>$number,
            'upass'=> $this->ltPass,
            'uname'=> $this->ltLogin,
            'command'=>'gbalance',
            'amount'=>'',
            'enumber'=>'',
                        
        ));
        
        curl_setopt($curl, CURLOPT_USERAGENT, 'MSIE 5'); //эта строчка как-бы говорит: "я не скрипт, я IE5" :)
        curl_setopt ($curl, CURLOPT_REFERER, "http:/travelsim.lt"); //а вдруг там проверяют наличие рефера
        
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;

    }// get_card_ballance 
    
    
    private function set_card_ballance($number,$ball){
        
        $ball = number_format($ball,2);
        
        $curl = curl_init(); //инициализация сеанса
        curl_setopt($curl, CURLOPT_URL, $this->ltGate); //урл сайта к которому обращаемся 
        curl_setopt($curl, CURLOPT_HEADER,false); //выводим заголовки
        curl_setopt($curl, CURLOPT_POST, true); //передача данных методом POST
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true); //теперь curl вернет нам ответ, а не выведет
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, //тут переменные которые будут переданы методом POST 
            array (
            'curr'=>'EUR',
            'plain'=>'1',
            'onum'=>$number,
            'upass'=> $this->ltPass,
            'uname'=> $this->ltLogin,
            'command'=>'sbalance',
            'amount'=> $ball,
            'enumber'=>'',
                        
        ));
        
        curl_setopt($curl, CURLOPT_USERAGENT, 'MSIE 5'); //эта строчка как-бы говорит: "я не скрипт, я IE5" :)
        curl_setopt ($curl, CURLOPT_REFERER, "http:/travelsim.lt"); //а вдруг там проверяют наличие рефера
        
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
        
    } // set_card_ballance
    
    
    private function sendSms($number,$ball){
        
       
        
        $curl = curl_init(); //инициализация сеанса
        curl_setopt($curl, CURLOPT_URL, $this->ltGate); //урл сайта к которому обращаемся 
        curl_setopt($curl, CURLOPT_HEADER,false); //выводим заголовки
        curl_setopt($curl, CURLOPT_POST, true); //передача данных методом POST
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true); //теперь curl вернет нам ответ, а не выведет
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, //тут переменные которые будут переданы методом POST 
            array (
            'curr'=>'',
            'plain'=>'1',
            'onum'=>$number,
            'bnum'=>$number,
            'upass'=> $this->ltPass,
            'uname'=> $this->ltLogin,
            'command'=>'sms2',
            'amount'=> '',
            'enumber'=>'',
            'msg'=> $ball."%20EUR%20was%20added%20to%20your%20account",
                        
        ));
        
        curl_setopt($curl, CURLOPT_USERAGENT, 'MSIE 5'); //эта строчка как-бы говорит: "я не скрипт, я IE5" :)
        curl_setopt ($curl, CURLOPT_REFERER, "http:/travelsim.lt"); //а вдруг там проверяют наличие рефера
        
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
        
    } // set_card_ballance
    
    
    
    
    
    
    
        /**
         * sendSMS function
         * @author Ruslan
         * @param $topup_ammount - topup ammount,
         * @param $number - number which need to topup
         * @param $login;
         * @param $pass;
         */
        private function sendSms_old($number,$topup_amount,$login,$pass){
        
        
        //$msg = $this->renderPartial('_msg',array('topup_amount'=>$topup_amount),true);
        $msg = 'Dear coustumer, '.$topup_amount.' was added to your account.';
        $link = $this->ltGate.'?'.'uname='.$login."&".'upass='.$pass.'&plain=1&command=sms2&anum='.$number.'&bnum='.$number."&msg=$topup_amount". "%20EUR%20was%20added%20to%20your%20account";
        
        //$link = 'https://xml2.travelsim.com/tsim_xml/service/xmlgate?uname=Lv5CxR6AQH&upass=AtzeaPssv1&plain=1&command=sms2&anum=3726868000&bnum=37257111036&msg=test';

        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$link);   
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true); //теперь curl вернет нам ответ, а не выведет
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_REFERER, "http:/travelsim.tw"); //а вдруг там проверяют наличие рефера
        $res = curl_exec($curl);
   
        curl_close($curl);
        return $res;       

    }//sendSms
    
     



}