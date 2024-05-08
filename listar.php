<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    </title>
</head>
<body>
    <p>Opções</p>
    <div>
    <button><a href="FormPessoa.html">Inserir</a></button>
    </div>
</body>
</html>
<?php
include "pessoas_banco.class.php";
$p = new Pessoa_banco();

$pessoas = $p->listaPessoas();
foreach ($pessoas as $cidadao){ 
?>
<td><?php echo"Código: " . $cidadao['id_pessoa'] . "<br>";?></td>
<td><?php echo"Nome: " . $cidadao['nome'] . "<br>";?></td>
<td><?php echo"Email: " . $cidadao['email'] . "<br>";?></td>
<td><?php echo"Idade: " . $cidadao['idade'] . "<br>";?></td>
    <button><a href ="deletarPessoa.php?id_pessoa=<?php echo $cidadao['id_pessoa'] ?>">Remover</a></button>
    <button><a href ="atualizar.php?id_pessoa=<?php echo $cidadao['id_pessoa'] ?>">Atualizar</a></button>
<hr>
<?php
}
?>

