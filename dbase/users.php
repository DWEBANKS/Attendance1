<?php
    class user{
        private $dbase;

        function __construct ($conn){

            $this ->dbase = $conn;
        }

        public function insertUser ($username, $password){
            try {
                $result=$this->getUserbyUsername($username);
                if($result['num'] >0 ){
                return false;

                }else{

                $new_password=md5($password.$username);
                //code...
                $sql = "INSERT INTO user (username, password)
                 VALUES (:username, :password)";
    
                $stmt = $this ->dbase->prepare($sql);
    
                $stmt ->bindparam(':username',$username);
                $stmt ->bindparam(':password',$new_password);
                
    
                $stmt ->execute();
                return true;
                }
    
            } catch (PDOexception $e) {
                //throw $th;
                echo $e ->getMessage();
                return false;
                }
            

        }

        public function getUser ($username,$password){
            try {
                $sql = "select * from user where username = :username AND password = :password";
            $stmt = $this ->dbase ->prepare($sql);
            $stmt ->bindparam(':username', $username);
            $stmt ->bindparam(':password', $password);
            $stmt ->execute();
            $result = $stmt->fetch();
            return $result;

            } catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }

        }

        public function getUserbyUsername ($username){
            try {
                $sql = "select count(*) as num from user where username = :username";
            $stmt = $this ->dbase ->prepare($sql);
            $stmt ->bindparam(':username', $username);
            $stmt ->execute();
            $result = $stmt->fetch();
            return $result;

            } catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }

        }
        
    }

?>