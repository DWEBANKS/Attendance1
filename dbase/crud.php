<?php 
    class crud{
        private $dbase;

        function __construct ($conn){

            $this ->dbase = $conn;
        }

        public function insertAttendees ($fname, $lname, $dob, $email, $contact, $class){

        try {
            //code...
            $sql = "INSERT INTO attendees (first_name, last_name, date_of_birth, email, contact, class_id)
             VALUES (:fname, :lname, :dob, :email, :contact, :class)";

            $stmt = $this ->dbase->prepare($sql);

            $stmt ->bindparam(':fname', $fname);
            $stmt ->bindparam(':lname', $lname);
            $stmt ->bindparam(':dob', $dob);
            $stmt ->bindparam(':email', $email);
            $stmt ->bindparam(':contact', $contact);
            $stmt ->bindparam(':class', $class);

            $stmt ->execute();
            return true;

        } catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }

        }

        public function editAttendees ($id, $fname, $lname, $dob, $email, $contact, $class){
           try{
               
               $sql = "UPDATE `attendees` SET `first_name`=:fname, `last_name`=:lname, `date_of_birth`=:dob,
            `email`=:email, `contact`=:contact, `class_id`=:class WHERE attendee_id =:id";

            $stmt=$this->dbase->prepare($sql);

            $stmt ->bindparam(':id', $id);
            $stmt ->bindparam(':fname', $fname);
            $stmt ->bindparam(':lname', $lname);
            $stmt ->bindparam(':dob', $dob);
            $stmt ->bindparam(':email', $email);
            $stmt ->bindparam(':contact', $contact);
            $stmt ->bindparam(':class', $class);

            $stmt ->execute();
            return true;

        } catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }
        }

        public function getAttendees (){

            try {
            $sql = "SELECT * FROM `attendees` a inner join classes c  on a.class_id = c.class_id";
            $result = $this ->dbase ->query($sql);
            return $result; 
        }catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }
        }

        public function getAttendeesDetails ($id){

            try {
                $sql = "select * from attendees a inner join classes c  on a.class_id = c.class_id where attendee_id = :id";
            $stmt = $this ->dbase ->prepare($sql);
            $stmt ->bindparam(':id', $id);
            $stmt ->execute();
            $result = $stmt->fetch();
            return $result;

            } catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }
        }        


        public function deleteAttendees ($id){

            try {
            $sql = "delete from attendees where attendee_id = :id";
            $stmt=$this->dbase->prepare($sql);
            $stmt ->bindparam(':id', $id);
            $stmt ->execute();
            return true;

        } catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }
        }        

        public function getClasses (){

            try {

            $sql = "SELECT * FROM `classes`";
            $result = $this ->dbase ->query($sql);
            return $result; 
        }catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }   
        }

        public function getClassById($id){

            try {

            $sql = "SELECT * FROM `classes` where class_id =:id";
            $stmt = $this ->dbase ->prepare($sql);
            $stmt ->bindparam(':id', $id);
            $stmt ->execute();
            $result = $stmt->fetch();
            return $result; 
        }catch (PDOexception $e) {
            //throw $th;
            echo $e ->getMessage();
            return false;
            }   
        }
    }


?>