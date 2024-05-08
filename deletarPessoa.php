
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button><a href="listar.php" >Listar</a></button>
    <br>
    <?php
include "pessoas_banco.class.php";

if (isset($_GET['id_pessoa'])) {
    $p = new Pessoa_banco();
    if ($p->deletarPessoa($_GET['id_pessoa'])) {
        ?>
        <p>BANIDO</p>
        <?php
    } else {
        echo "Erro ao deletar dados";
    }
}
?>
</body>

</html>