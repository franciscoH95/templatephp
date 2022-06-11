<?php
    include_once './dataBase/conection.php';
    class User extends DB{
        private $nombre;
        private $apellido;
        private $email;
        private $rol;

        public function __construct()
        {
            
        }

        public function userExists($email, $pass)
        {
            $query = $this->connect()->prepare('SELECT * FROM users WHERE email = :email AND contrasena = :pass;');
            $query->execute(['email' => $email, 'pass' => $pass]);

            if($query->rowCount()){
                return true;
            } else {
                return false;
            }
        }

        public function setUser($email)
        {
            $query = $this->connect()->prepare("SELECT u.nombre, u.apellido, u.email, r.rol FROM users as u JOIN usuario_rol as ur ON ur.id_usuario = u.id_usuario JOIN roles as r ON r.id_rol = ur.id_rol WHERE email = :email");
            $query->execute(['email' => $email]);
            foreach ($query as $currentUser) {
                $this->nombre = $currentUser['nombre'];
                $this->apellido = $currentUser['apellido'];
                $this->email = $currentUser['email'];
                $this->rol = $currentUser['rol'];
            }
        }

        public function getUser(){
            $user =(object) array(
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'email' => $this->email,
                'rol' => $this->rol
            );

            return $user;
        }

    }
?>