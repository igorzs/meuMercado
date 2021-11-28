<?php

class User{

    var $conex;

    function __construct(){
        $this->conex = new Conex();
    }
    
    function loginValidate($email, $pass){
        $email = clean($email);
        $pass = hash('sha256', $pass);

        $sql = "SELECT * FROM TBUSERS WHERE EMAIL='$email' AND SECRET='$pass' AND ENABLED = 1";
        $result = $this->conex->executeQuery($sql);

        foreach($result  as $row){
            session_start();
            $_SESSION['USERNAME'] = $row['NAME'];
            $_SESSION['IS_LOGGED'] = 1;
            $_SESSION['EMAIL'] = $row['EMAIL'];
            $_SESSION['JOB_ID'] = $row['JOB_ID'];
            $_SESSION['COMPANY_ID'] = $row['COMPANY_ID'];

            return true;
        }

        return false;
    }
}
?>