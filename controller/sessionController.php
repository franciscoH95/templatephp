<?php
    class SessionController{

        public function __construct()
        {
            session_start();
        }

        public function setCurrentUser($email)
        {
            $_SESSION['user'] = $email;
        }

        public function getCurrentUser()
        {
            return $_SESSION['user'];
        }

        public function closeSession()
        {
            session_unset();
            session_destroy();
        }
    }
?>