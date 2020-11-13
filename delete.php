<?php
 require_once  'include_require/auth_check.php' ;

require_once  'dbase/conn.php' ;

if(!$_GET['id']){
    header("Location: records.php");
    include 'include_require/errormessage.php';
}
else{
    $id=$_GET['id'];
    $result=$crud->deleteAttendees($id);

    if($result) {
        header("Location: records.php");

    }
    else{
        include 'include_require/errormessage.php';
    }
    
}



?>