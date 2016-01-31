<?php

class UserIdentity extends CUserIdentity
{

    private $_id;

    /**
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $record = User::model()->findByAttributes(array('username' => $this->username));

        if ($record === null)
        {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if ($record->password !== self::hashPass($this->password))
        {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->_id = $record->id;
            $this->setState('title', $record->username);
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public static function hashPass($password)
    {
        return md5($password);
    }

    public function getId()
    {
        return $this->_id;
    }
}