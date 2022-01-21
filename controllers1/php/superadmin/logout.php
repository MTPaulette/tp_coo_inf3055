<?php session_start() ?>
<?php
    session_destroy();
    header("Location:../../../views/pages/superadmin/login.php");
?>