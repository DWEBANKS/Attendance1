
<?php 
    $title = 'Index';
require_once  'include_require/header.php' ;
 require_once  'dbase/conn.php' ;

 $result=$crud->getClasses();

?>

    <h1 class = 'text-center'>Registration Form for IT Summer Camp</h1>

    <form method="post" action="congrats.php" ecytype ='mulitpart/form-data'>
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input required type="text" class="form-control" id="firstname" name = "firstname" >
  </div>
  <form>
  <form>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input required type="text" class="form-control" id="lastname" name="lastname" >
  </div>
  <form>
  <form>
  <div class="form-group">
    <label for="date_of_birth">Date Of Birth</label>
    <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" >
  </div>
  <form>
  <div class="form-group">
    <label for="class">Select Your Grade</label>
    <select class="form-control" id="class" name="class">

      <option>Option</option>
      <?php while ($r = $result ->fetch (PDO::FETCH_ASSOC)) {?>

      <option value ="<?php echo $r ['class_id'] ?>"><?php echo $r ['names']; ?></option>

      <?php }?>
      
    </select>
  </div>
  <form>
  <form>
  <div class="form-group">
    <label for="email">Email Address</label>
    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
 
  <div class="form-group">
    <label for="phone">Contact Number</label>
    <input required type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" >
    <small id="phoneHelp"  class="form-text text-muted">We'll never share your contact with anyone else.</small>
  </div>

  <div class="custom-file">
    <input type="file" accept ='image/*' class="custom-file-input" id="avatar" name="avatar" >
    <label class="custom-file-label" for = 'avatar'>Choose file</label>
    <small id="avatar"  class="form-text text-danger">File upload is optional.</small>
    
        <br>
  </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<br>
<br>
<br>

    <?php require_once  'include_require/footer.php' ;?>

    