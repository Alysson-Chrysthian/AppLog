<?php
    namespace App\DataBase\Connect;

    use Exception;
    use PDO;

    require 'ENV.php';

    readonly class DataBase extends ENV {
        private string $DB_NAME;
        private string $DB_USER;
        private string $DB_PASS;
        private string $DB_HOST;
        private string $DB_PORT;

        public function __construct() 
        {
            ENV::LoadDotEnv();
            $this->DB_NAME = $_ENV['DB_NAME'];
            $this->DB_USER = $_ENV['DB_USER']; 
            $this->DB_PASS = $_ENV['DB_PASS'];
            $this->DB_HOST = $_ENV['DB_HOST'];
            $this->DB_PORT = $_ENV['DB_PORT'];
        }

        public function connect()
        {
            $db_name = $this->DB_NAME;
            $db_user = $this->DB_USER;
            $db_pass = $this->DB_PASS;
            $db_host = $this->DB_HOST;
            $db_port = $this->DB_PORT;
            try {
                $conn = new \PDO("mysql:dbname=$db_name;host=$db_host;port=$db_port", $db_user, $db_pass);
            }
            catch (\PDOException $e) {
                print('Não foi possivel se conectar ao banco de dados'.$e->getMessage());
                $conn = false;
            } 
            return $conn;
        }
                
    }
    