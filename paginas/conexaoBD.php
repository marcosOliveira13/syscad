<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $banco = "syscad";
  
  $conexao = new mysqli($host, $user, $pass, $banco);

  if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
  }
 //teste: echo "Conexão ao banco bem sucedido";
 ?>
