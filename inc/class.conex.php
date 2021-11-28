<?php 
    class Conex{
        var $host = "localhost";
        var $user = "root";
        var $password = "";
        var $database = "mercado";
        var $conn;

        //Esta função faz a conexão com o Banco de Dados
        function connect()
        {
            try {
                $this->conn = new PDO('mysql:host=localhost;dbname=mercado', $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }

        }

        function executeQuery($sql){
            $this->connect();
            $stmt = $this->conn->query($sql);
            $rows = $stmt->fetchAll();
            $this->conn = null;
            return $rows;
        }

    }
?>