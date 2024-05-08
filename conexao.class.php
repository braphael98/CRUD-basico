<?php
class Conexao
{
    private $host = 'localhost'; //endereço para banco de dados;
    private $db_name = 'testes_aula_bd_2503'; //nome do banco de dados;
    private $username = 'root';
    private $password = '';
    private $conn;
    public function getConnection()
    {
        $this->conn = null;
        try { //tentar conectar
            $this->conn = new PDO(
                'mysql:host =' .
                    $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erro de conexão:' . $e->getMessage();
        }
        return $this->conn;
    }
}
