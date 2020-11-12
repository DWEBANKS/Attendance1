<?php 
    $title = 'Congrats';
require_once  'include_require/header.php' ;
require_once 'dbase/conn.php';

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $class = $_POST['class'];

    $isSuccess = $crud ->insertAttendees($fname, $lname, $dob, $email, $contact, $class);

    if($isSuccess){
      include 'include_require/successmessage.php';

   } 
   else{
    include 'include_require/errormessage.php';

   }
}

?>


    

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST ['firstname'] .' '. $_POST['lastname'];?></h5>

    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST ['class'];?></h6>

    <p class="card-text">Date of Birth: <?php echo $_POST ['date_of_birth']; ?></p>

    <p class="card-text">Email Address: <?php echo $_POST ['email']; ?></p>

    <p class="card-text">Contact Number: <?php echo $_POST ['phone']; ?></p>

    
  </div>
</div>
<br>
<br>
<br>
<br>

    <?php require_once  'include_require/footer.php' ;?>
