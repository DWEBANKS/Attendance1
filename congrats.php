<?php 
    $title = 'Congrats';
require_once  'include_require/header.php' ;
require_once 'dbase/conn.php';
require_once 'sendemail.php';

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $class = $_POST['class'];

    $orig_file = $_FILES["avatar"]["temp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/*';
    $destination = "$target_dir$contact.$ext";
    move_uploaded_file($orig_file,$destination);

    


    $isSuccess = $crud ->insertAttendees($fname, $lname, $dob, $email, $contact, $class, $destination);
    $className = $crud->getClassById($class);

    if($isSuccess){
      SendEmail:: SendMail ($email, 'Welcome to IT Summer Camp', 'You have successfully registered for the IT summer camp');
      include 'include_require/successmessage.php';

   } 
   else{
    include 'include_require/errormessage.php';

   }
}

?>


    <img scr="<?php echo $destination; ?>" class="rounded-circle" style="with: 20%; height: 20%" />

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST ['firstname'] .' '. $_POST['lastname'];?></h5>

    <h6 class="card-subtitle mb-2 text-muted"><?php echo $className["name"];?></h6>

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
