<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    private $token;

    public function authenticate()
    {
        /* @var $user_record UsersYii */

        //if have login and username
        if($this->username != null && $this->password != null)
        {
            //find user by login
            $user_record = UsersYii::model()->findByAttributes(array('login' => $this->username));
            if($user_record===null)
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            elseif($user_record->password !== $this->password)
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else
            {
                $token = AdminFunctions::GenerateString(12);
                $user_record->user_id = $token;
                $user_record->update();

                $this->_id=$user_record->id;
                $this->setState('token',$user_record->user_id);
                $this->setState('role', $user_record->role);
                $this->setState('name', $user_record->name);
                $this->setState('email', $user_record->email);
                $this->errorCode=self::ERROR_NONE;
            }
        }

        //if have token only
        elseif($this->token != null)
        {
            //find user by token
            $user_record = UsersYii::model()->findByAttributes(array('user_id' => $this->token));
            if($user_record === null)
            {
                $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
            }
            else
            {
                $this->_id=$user_record->id;
                $this->setState('token',$user_record->user_id);
                $this->setState('role', $user_record->role);
                $this->setState('name', $user_record->name);
                $this->setState('email', $user_record->email);
                $this->errorCode=self::ERROR_NONE;
            }
        }

        //if have nothing
        else
        {
            $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
        }

        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }

    //redefine constructor
    public function __construct($username = null,$password = null,$token = null)
    {
        $this->username=$username;
        $this->password=$password;
        $this->token = $token;
    }
}