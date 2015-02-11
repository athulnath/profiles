<?php

namespace app\models\activeRecords;

use Yii;
use yii\web\IdentityInterface;
use yii\base\Security;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $gender
 * @property string $dob
 * @property string $updated_date
 * @property string $joining_date
 *
 * @property ProfileFriends[] $profileFriends
 * @property Profiles[] $profiles
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dob', 'updated_date', 'joining_date'], 'safe'],
            [['email'], 'string', 'max' => 150],
            [['password'], 'string', 'max' => 32],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'email' => 'Email',
            'password' => 'Password',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'updated_date' => 'Updated Date',
            'joining_date' => 'Joining Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfileFriends()
    {
        return $this->hasMany(ProfileFriends::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profiles::className(), ['user_id' => 'user_id']);
    }
    
    /**
     * Finds user by email
     *
     * @param  string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
    	return static::findOne(['email' => $email]);
    }
    
    
    public static function findIdentity($id) 
    {
    	return static ::findOne($id);	
    }

    public static function findIdentityByAccessToken($token, $type = null) 
    {
    	
    }

    public function getId()
    {
    	return $this->getPrimaryKey();
    	
    }

    public function getAuthKey()
    {
    	return $this->auth_key;
    }
    
    public function validateAuthKey($authKey)
    {
    	return $this->authKey === $authKey;
    }
    
    public function validatePassword($password)
    {
    	return $this->password === md5($password);
    }
    
    
}
