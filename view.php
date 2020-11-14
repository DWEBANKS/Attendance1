<?php 
    $title = 'View Record';
require_once  'include_require/header.php' ;
require_once  'include_require/auth_check.php' ;
 require_once  'dbase/conn.php' ;

 if(isset($_GET['id'])){

    $id=$_GET['id'];
   
    $result=$crud->getAttendeesDetails($id);
    }else {
      include 'include_require/errormessage.php';
    }



?>
    <img scr="<?php echo $result ['avatar_path' ]?>" class="rounded-circle" style="with: 20%; height: 20%" />


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['first_name'] .' '. $result['last_name'];?></h5>

    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['names'];?></h6>

    <p class="card-text">Date of Birth: <?php echo $result['date_of_birth']; ?></p>

    <p class="card-text">Email Address: <?php echo $result['email']; ?></p>

    <p class="card-text">Contact Number: <?php echo $result['contact']; ?></p>

    
  </div>
</div>
<br>

        <a href= 'records.php' class = 'btn btn-info' >Back to Records</a>
        <a href= 'edit.php?id=<?php echo $result['attendee_id']?>' class = 'btn btn-warning' >Edit</a>
        <a onclick = "return confirm ('Are you sure you want to delete this record');" 
            href= 'delete.php?id=<?php echo $result['attendee_id']?>' class = 'btn btn-danger' >Delete</a>


<br>
<br>
<br>
<br>

    <?php require_once  'include_require/footer.php' ;?>