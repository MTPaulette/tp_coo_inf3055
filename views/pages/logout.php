<?php session_start() ?>
<?php
    session_destroy();
    header("Location:http://localhost/tp_inf3055_coo_dr_monthe/tp_coo_pharmacie/views/pages/login.php");
?>