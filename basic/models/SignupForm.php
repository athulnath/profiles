<?php
namespace app\models;

use yii\base\Model;
use app\models\activeRecords\User;
use yii\db\Expression;

class SignupForm extends Model 
{
    public $email;
    public $password;
    public $firstName;
    public $middleName;
    public $lastName;
    public $gender;
    public $dob;

    
    public function rules()
    {
    	return [
			['email', 'email'],
			[['email', 'password', 'firstName', 'lastName', 'dob'], 'required']
    	];
    }
    
    
    /**
     * add data to data base
     */
    public function registerData()
    {
    	if($this->validate())
    	{
    		$userObj = new User();
    		$userObj->email = $this->email;
    		$userObj->password = md5($this->password);
    		$userObj->first_name = $this->firstName;
    		$userObj->middle_name = $this->middleName;
    		$userObj->last_name = $this->lastName;
    		$userObj->gender = $this->gender;
    		$userObj->dob = $this->dob;
    		$userObj->updated_date = new Expression("NOW()");
    		$userObj->joining_date = new Expression("NOW()");
    		if($userObj->save()){
    			return $userObj;
    		}
    		
    		return NULL;
    	}
    }
}