<?php
include "pessoas_banco.class.php";

$p = new Pessoa_banco();
if (isset($_GET['id_pessoa'])) {
    $pessoa = $p->listOneGuy();
    foreach ($pessoa as $cidadao){

    
?>
    <form action="atualizar2.php" method="POST">
        <label for="nome">Nome</label>
        <input type="hidden" value="<?php echo $cidadao['id_pessoa']; ?>"name="id_pessoa">
        <input type="text" name="nome" value ="<?php echo $cidadao['nome']; ?>"><br>

        <label for="idade">Idade</label>
        <input type="text" name="idade" value ="<?php echo $cidadao['idade']; ?>"><br>

        <label for="email">Email</label>
        <input type="email" name ="email" value ="<?php echo $cidadao['email']; ?>"><br>

        <input type="submit" value="enviar">
    </form>
<?php
    } 
}
?>
