<?php

include_once 'include_require/session.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel = "stylesheet" href = "css/site.css" />

    <title>Attendance - <?php echo $title ?></title>
  </head>
  <body>

  <div class = 'container'>

  <nav class="navbar navbar-expand-lg navbar-primary bg-light">
  <a class="navbar-brand" href="index.php">IT Summer Camp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
      <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="records.php">Attendees</a>      
    </div>

        <div class="navbar-nav ml-auto">
        <?php

          if(!isset($_SESSION['userid'])){

        ?>
      <a class="nav-link active" href="login.php">Login <span class="sr-only">(current)</span></a>

          <?php }else {?>
            <a class="nav-link active" href="#"><span> Hello <?php echo $_SESSION['username'] ?>!</span></a>
            <a class="nav-link active" href="logout.php">Logout <span class="sr-only">(current)</span></a>

          <?php }?>
            
    </div>
  </div>
</nav>
<br>
<br>