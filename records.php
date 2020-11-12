<?php 
    $title = 'Records';
require_once  'include_require/header.php' ;
 require_once  'dbase/conn.php' ;

 $result = $crud -> getAttendees();

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      
      <th>Class</th>
      <th>Action</th>

    </tr>
  </thead>
  <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>

  <tr>
        <td><?php echo $r ['attendee_id']?></td>
        <td><?php echo $r ['first_name']?></td>
        <td><?php echo $r ['last_name']?></td>
        
        <td><?php echo $r ['names']?></td>
        <td>
        <a href= 'view.php?id=<?php echo $r['attendee_id']?>' class = 'btn btn-primary' >View</a>
        <a href= 'edit.php?id=<?php echo $r['attendee_id']?>' class = 'btn btn-warning' >Edit</a>
        <a onclick = "return confirm ('Are you sure you want to delete this record');" 
            href= 'delete.php?id=<?php echo $r['attendee_id']?>' class = 'btn btn-danger' >Delete</a>
        </td>
  
  </tr>



  
  
  <?php }?>
</table>

<br>
<br>
<br>
<br>

    <?php require_once  'include_require/footer.php' ;?>