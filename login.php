<?php 
    $title = 'User Login';
require_once  'include_require/header.php' ;
 require_once  'dbase/conn.php' ;

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);

        $result = $user->getUser($username,$new_password);
        if (!$result){
            echo "<div class = 'aleart aleart-danger'>username or password is incorrect. Please try again! </div>";
        }
        else{
            $_SESSION['username']=$username;
            $_SESSION['userid']=$result['id'];
            header('Location: records.php');
        }

    }
?>

<h1 class = "text-center"><?php echo $title ?> </h1>

<form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method= "post">
<table class = "table table-sn">

        <tr>

            <td><label for ="username">Username:* </label></td>
            <td><input type = "text" name = "username" class = "form-control" id = "username" value= " 
            <?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">"

            <?php if(empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') 
                echo "<p class='text-danger'>$username_error</p>";?> 
        
        </td>
        </tr>
             <tr>
            <td><label for ="password">Password:* </label></td>
            <td><input type = "text" name="password" class = "form-control" id ="password">

            <?php if(empty($password) && isset($password_error)) echo "<p class='text-danger' >$password_error</p>";?>

            </td>
            </tr>
            </table><br/><br/>
            <input type = "submit" value = "Login" class = "btn btn-primary btn-block"> <br/>
            <a href = "#" > Forget Password </a>

            </form><br/><br/><br/><br/>

        <?php include_once 'include_require/footer.php'?>