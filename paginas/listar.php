<?php /*
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>cadastrados</title>
        <?php
            session_start();
            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
              unset($_SESSION['login']);
              unset($_SESSION['senha']);
              header('location:index.php');
              }
         ?>
    </head>
    <body>
        <h1>Pacientes Cadastrados</h1>

        <?php

            require_once("conexaoBD.php");

            $result_pessoa = "SELECT * FROM pessoa";
            $lista_pessoa = mysqli_query($conexao, $result_pessoa);

            while ($linha_pessoa = mysqli_fetch_assoc($lista_pessoa)) {
                echo "ID: " .  $linha_pessoa['id_pessoa'] . "<br>";
                echo "Nome: " .  $linha_pessoa['nome'] ." ". $linha_pessoa['sobrenome']."<br>";
                echo "Data de Nascimento: " .  $linha_pessoa['data_nascimento'] . "<br>";
                echo "Telefone: " .  $linha_pessoa['telefone_celular1'] ."<br>";
                echo "Ocupação: " .  $linha_pessoa['ocupacao'] ."<br>";
                echo "<hr>";


            }
         ?>

    </body>
</html>
 */ ?>
