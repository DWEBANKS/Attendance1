<?php

require_once  'dbase/conn.php' ;

    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $dob = $_POST['date_of_birth'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $class = $_POST['class'];

    
    $result=$crud->editAttendees($id, $fname, $lname, $dob, $email, $contact, $class);

    if($result) {
        header("Location: records.php");

    }
    else{
        include 'include_require/errormessage.php';
    }
    }

    


?>