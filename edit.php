
<?php 
    $title = 'Edit Records';
require_once  'include_require/header.php' ;
require_once  'include_require/auth_check.php' ;
 require_once  'dbase/conn.php' ;

 $result=$crud->getClasses();

 if (!isset($_GET['id']))

 {
     include 'include_require/errormessage.php';
     header ('Location: records.php');
 } else 
        {
        $id=$_GET['id'];
        $attendee=$crud->getAttendeesDetails($id);
 

?>

    <h1 class = 'text-center'>Edit Records for IT Summer Camp</h1>

    <form method="post" action="editpost.php">
    <input type = "hidden" name ='id' value="<?php echo $attendee['attendee_id'] ?>" />
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" value="<?php echo $attendee ['first_name']?>"id="first_name" name = "first_name" >
  </div>
  <form>
  <form>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" value="<?php echo $attendee ['last_name']?>" id="last_name" name="last_name" >
  </div>
  <form>
  <form>
  <div class="form-group">
    <label for="date_of_birth">Date Of Birth</label>
    <input type="text" class="form-control" value="<?php echo $attendee ['date_of_birth']?>" id="date_of_birth" name="date_of_birth" >
  </div>
  <form>
  <div class="form-group">
    <label for="class">Select Your Grade</label>
    <select class="form-control" id="class" name="class">

      
      <?php while ($r = $result ->fetch (PDO::FETCH_ASSOC)) {?>

      <option value ="<?php echo $r['class_id'] ?>" <?php if ($r ['class_id'] ==$attendee ['class_id']) 
      echo 'selected' ?>><?php echo $r['names']; ?>
      
      </option>

      <?php }?>
      
    </select>
  </div>
  <form>
  <form>
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" value="<?php echo $attendee ['email']?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
 
  <div class="form-group">
    <label for="phone">Contact Number</label>
    <input type="text" class="form-control" value="<?php echo $attendee ['contact']?>" id="phone" name="phone" aria-describedby="phoneHelp" >
    <small id="phoneHelp"  class="form-text text-muted">We'll never share your contact with anyone else.</small>
  </div>
    <button type="submit" name="submit" class="btn btn-success ">Save Changes</button>
    <a href= 'records.php' class = 'btn btn-info' >Back to Records</a>
</form>

      <?php } ?>
<br>
<br>
<br>
<br>

    <?php require_once  'include_require/footer.php' ;?>

    