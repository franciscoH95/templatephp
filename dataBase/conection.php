<?php
    class DB{

        function connect()
        {
            try {
                
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $pdo = new PDO('mysql:host=localhost;dbname=examenbd', 'root', '', $options);
                return $pdo;

            } catch (\Exception $e) {
                print_r('Error connection: ' . $e->getMessage());
            }
        }
    }
    

?>