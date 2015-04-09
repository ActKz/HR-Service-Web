<?php
    class JobSeeker
    {
        private static $myPDO = null;
        public function __construct()
        {
            if(isset($GLOBALS['db']))
            {
                self::$myPDO = $GLOBALS['db'];
            }
            else
            {
                echo "Please require admin/auth/db_auth.php\n";
            }
        }
        public function checkAvail($account)
        {
            $sql = "SELECT account FROM user WHERE account = :account";
            try{
                $run = self::$myPDO->prepare($sql);
                $run->execute(array(':account'=>$account));
            }
            catch(PDOException $e){
                return false;
            }
            if($run->rowCount())
            {
                return False;
            }
            return true;
        }
        public function JobSeekerRegister($account,$password,$education,$expected_salary,$phone,$gender,$age,$email)
        {
            try
            {
                $sql = "INSERT INTO user (account,password,education,expected_salary,phone,gender,age,email) VALUES (:account,:password,:education,:expected_salary,:phone,:gender,:age,:email)";
                $run = self::$myPDO->prepare($sql);
                $is_success=$run->execute(array(':account'=>$account,
                                    ':password'=>hash('sha256',$password),
                                    ':education'=>$education,
                                    ':expected_salary'=>$expected_salary,
                                    ':phone'=>$phone,
                                    ':gender'=>$gender,
                                    ':age'=>$age,
                                    ':email'=>$email));
            } catch (PDOException $e)
            {
                echo 'Register failed!' . $e->getMessage();
                return False;
            }
            return $is_success;
        }
    }