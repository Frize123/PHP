<?php

use DateTime;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Email;



class User{
    private $id;
    private string $name;
    private string $email;
    private string $password;
    private DateTime $CreationTime; 

    public function __construct($id, string $username, string $email, string $password){
        $this->id=$this->idCheck($id);
        $this->username=$this->usernameCheck($username);
        $this->email=$this->emailCheck($email);
        $this->password=$this->passwordCheck($password);
        $this->CreationTime=new DateTime();
    }

    public function getCreationTime()
    {
        return $this->CreationTime;
    }



    public function showProfile() {
           echo "<dl>";
           echo "<dt>Id:</dt><dd>$this->id</dd>";
           echo "<dt>username:</dt><dd>$this->username</dd>";
           echo "<dt>email:</dt><dd>$this->email</dd>";
           echo "<dt>password:</dt><dd> $this->password  </dd>";
           echo $this->CreationTime->format('m/d/Y H:i:s'); 
           echo "</dl>";

    }

    private function passwordCheck(string $password) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($password, [
        new NotBlank(),
        new Length(['min' => 2]),
        new Length(['max' => 20]),
        ]);

        if (0 !== count($violations)) {
            foreach ($violations as $violation) {
                return $violation->getMessage();
            }
        }
        return md5($password);
    }

    private function emailCheck(string $email) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($email, [
        new NotBlank(),
        new Length(['min' => 2]),
        new Length(['max' => 30]),
        new Email(message: 'The email {{ value }} is not a valid email.',),
        ]);

        if (0 !== count($violations)) {
            foreach ($violations as $violation) {
                return $violation->getMessage();
            }
        }
        return $email;
    }

    private function usernameCheck(string $username) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($username, [
        new NotBlank(),
        new Length(['min' => 2]),
        new Length(['max' => 15]),
        ]);

        if (0 !== count($violations)) {
            foreach ($violations as $violation) {
                return $violation->getMessage();
            }
        }
        return $username;
    }

    private function idCheck($id) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($id, [
        new NotBlank(),
        new Type(type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',),
        new Positive(),
        ]);

        if (0 !== count($violations)) {
            foreach ($violations as $violation) {
                return $violation->getMessage().'<br>';
            }
        }
        return $id;
    }



}
