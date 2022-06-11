<?php
    include_once '../controller/sessionController.php';

    $session = new SessionController();
    $session->closeSession();

    header("location: ../index.php");
?>