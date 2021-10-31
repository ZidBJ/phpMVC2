<?php

namespace app\models;

use app\core\Model;

class Register extends Model
{
    public string $fName;
    public string $email;
    public string $password;
    public string $confirmPassword;
    public function xx()
    {
        // $fName = $request->getBody()['fName'];

        // if (!$fName) {
        //     $errors['fName'] = "This Faild Is Required.";
        // }
    }
    public function register()
    {
        return "Creating New User.";
    }

    public function rules(): array
    {
        return [
            'fName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 10]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}
