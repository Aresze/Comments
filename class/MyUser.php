<?php

 Class myUser
 {
     private $_id;
     private $_login;
     private $_password;
     private $_email;
     private $_name;
     private $_surname;

     /**
      * @param int $id
      */
     public function setId($id)
     {
         $id = trim($id);
         $this->_id = $id;
     }

     /**
      * @param string $login
      */
     public function setLogin($login)
     {
         $login = trim($login);
         $this->_login = $login;
     }

     /**
      * @param string $password
      */
     public function setPassword($password)
     {
         $password = trim($password);
         $this->_password = $password;
     }

     /**
      * @param string $email
      */
     public function setEmail($email)
     {
         $email = trim($email);
         $this->_email = $email;
     }

     /**
      * @param string $_name
      */
     public function setName($name)
     {
         $name = trim($name);
         $this->_name = $name;
     }

     /**
      * @param string $surname
      */
     public function setSurname($surname)
     {
         $surname = trim($surname);
         $this->_surname = $surname;
     }

     /**
      * @return int
      */
     public function getId()
     {
         return $this->_id;
     }

     /**
      * @return string
      */
     public function getLogin()
     {
         return $this->_login;
     }

     /**
      * @return string
      */
     public function getPassword()
     {
         return $this->_password;
     }

     /**
      * @return string
      */
     public function getEmail()
     {
         return $this->_email;
     }

     /**
      * @return string
      */
     public function getName()
     {
         return $this->_name;
     }

     /**
      * @return string
      */
     public function getSurname()
     {
         return $this->_surname;
     }

     public function validate()
     {
         if (empty($this->_login) or empty($this->_password)) {
             $this->error("empty");
             return false;
         }
         if (strlen($this->_login) < 3 or strlen($this->_login) > 35) {
             $this->error("notValidLogin");
             return false;
         }
         if (strlen($this->_password) < 3 or strlen($this->_password) > 35) {
             $this->error("notValidPassword");
             return false;
         }
         return true;

     }

     private function error($error){
         switch ($error){
             case "empty": echo "Вы ввели не всю информацию, вернитесь назад и заполните все поля!"; break;
             case "notValidLogin": echo "Логин должен состоять не менее чем из 3 символов и не более чем из 35."; break;
             case "notValidPassword": echo "Пароль должен состоять не менее чем из 3 символов и не более чем из 35."; break;
             default: echo "Error"; break;
         }
     }
 }
?>