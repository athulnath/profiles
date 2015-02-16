<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\activeRecords\User;
use yii\db\Expression;
use yii\helpers\Url;

class SignupForm extends Model 
{
    public $email;
    public $password;
    public $password_repeat;
    public $firstName;
    public $middleName;
    public $lastName;
    public $gender;
    public $dob;

    
    public function rules()
    {
    	return [
			['email', 'email'],
			[['middleName'], 'string'],
			[['email', 'password', 'firstName','lastName','gender', 'dob'], 'required'],
			['password_repeat', 'compare', 'compareAttribute' => 'password']
    	];
    }
    
    
    /**
     * add data to data base
     */
    public function registerData()
    {
    	if($this->validate())
    	{   
    		$activationKey = Yii::$app->getSecurity()->generateRandomString();
    		$userObj = new User();
    		$userObj->email = $this->email;
    		$userObj->password = md5($this->password);
    		$userObj->first_name = $this->firstName;
    		$userObj->middle_name = $this->middleName;
    		$userObj->last_name = $this->lastName;
    		$userObj->gender = $this->gender;
    		$userObj->dob = $this->dob;
    		$userObj->activated = 0;
    		$userObj->activate_key = $activationKey; 
    		$userObj->updated_date = new Expression("NOW()");
    		$userObj->joining_date = new Expression("NOW()");
    		if($userObj->save()){
    			$this->sendVerification($activationKey);
    			return $userObj;
    		}
    		
    		return NULL;
    	}
    }
    
    public function sendVerification($activationKey)
    {
    	Yii::$app->mailer->compose()
    	->setFrom("testmyapps321@gmail.com")
    	->setTo($this->email)
    	->setSubject('Activation')
    	->setHtmlBody('
    			Welcome '. $this->firstName.',<br><br>
    					
						You or someone with your id signed up at this site, Your new account is almost ready, but before you can login you need to confirm your email id by visitng the link below: <br><br>
						'.Url::toRoute(['signup/activate', 'key' => $activationKey, 'account' => $this->email], true).'

						<br><br>Once you have visited the verification URL, your account will be activated.

						<br><br>Thanks!')
    	->send();
    }
    
    public function activate($key, $email)
    {
    	$userData = User::findOne(['email' => $email, 'activated' => 0]);
    	
    	if($userData !== NULL && $userData['activate_key'] === $key)
    	{
    			$userData->activated = 1;
    			
    			if($userData->update())
    			{
    				return true;
    			}
    			else 
    			{
    				return false;
    			}
    	}
    	
    	return false;
    	
    }
    
    public function isUserExist($email)
    {
    	$userData = User::findByEmail($email);
    	return $userData !== NULL;
    }
}