<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\Session;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword']
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
   public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $users = $this->getUser();

            if (!$users || !$users->validatePassword($this->password,$this->username)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(),3600*24*30);
        } else {
            \Yii::$app->getSession()->setFlash('danger', "Incorrect username or password.");
            return false;
        }
    }
	
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->user === false) {
            $this->user = User::findByUsername($this->username);
        }
        return $this->user;
    }
}
