<?php
include "pessoas_banco.class.php";

$p = new Pessoa_banco();
$p->setIdpessoa($_POST["id_pessoa"]);
$p->setNome($_POST["nome"]);
$p->setEmail($_POST['email']);
$p->setIdade($_POST['idade']);

 if ($p->update()) {
    echo "Pessoa inserida com sucesso . <br>";
} else {
    echo "Erro ao inserir dados . <br>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button>
    <a href="listar.php">Listar</a>
</button>
</body>
</html>