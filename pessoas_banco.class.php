<?php
include "conexao.class.php";
class Pessoa_banco
{
    private $idpessoa;
    private $nome;
    private $email;
    private $idade;

    public function setIdpessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;
    }
    public function getIdpessoa()
    {
        return $this->idpessoa;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    public function getIdade()
    {
        return $this->idade;
    }

    function listaPessoas()
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "SELECT * FROM pessoa";

        try {
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obter os resultados
            return $result;
        } catch (PDOException $e) {
            echo 'Erro ao listar pessoas:' . $e->getMessage();
            $result = [];
            return $result;
        }
    }
    function inserirPessoa()
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "INSERT INTO pessoa (nome, email, idade) VALUES (:nome, :email, :idade)";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":idade", $this->idade);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir pessoa: " . $e->getMessage();
            return false;
        }
    }
    function deletarPessoa($index)
    {
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "DELETE FROM pessoa WHERE id_pessoa = :id";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $index);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar pessoa: " . $e->getMessage();
            return false;
        }
    }
    function update()
    {
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "UPDATE pessoa SET nome = :nome, email = :email, idade = :idade WHERE id_pessoa = :id";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id",$this->idpessoa);
            $stmt->bindParam(":nome",$this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":idade", $this->idade);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar pessoa: " . $e->getMessage();
            return false;
        }
    }
    function listOneGuy(){ 
        $database = new Conexao();
        $db = $database->getConnection();
        if(isset($_GET['id_pessoa']) && is_numeric($_GET['id_pessoa'])) {
            $id_pessoa = $_GET['id_pessoa'];

            $sql = "SELECT * FROM pessoa WHERE id_pessoa = :id_pessoa";
    
            try {
               
                $stmt = $db->prepare($sql);
    
               
                $stmt->bindParam(':id_pessoa', $id_pessoa, PDO::PARAM_INT);
    
               
                $stmt->execute();
    
                
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
            } catch (PDOException $e) {
                echo 'Erro ao listar pessoa: ' . $e->getMessage();
                return [];
            }
        } else {
            echo "ID inválido";
            return [];
        }
    }
    
}
