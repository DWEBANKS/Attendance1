<?php

    include_once 'include_require/session.php';

?>

<?php
    session_destroy ();
    header('Location: index.php');
?>