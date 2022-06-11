<?php
include_once 'model/user.php';
include_once 'controller/sessionController.php';

$session = new SessionController();
$user = new User();
if (isset($_SESSION['user'])) {
    $user->setUser($session->getCurrentUser());
    include_once 'vistas/home.php';
} else if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($user->userExists($email, $password)) {
        $session->setCurrentUser($email);
        $user->setUser($email);
        include_once 'vistas/home.php';
    } else {
        $error_login = "Email o contraseña incorrecta";
        include_once 'vistas/login.php';
    }
} else {
    include_once 'vistas/login.php';
}

?>