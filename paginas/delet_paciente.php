<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }

//CONEXAO COM O BD
require_once("conexaoBD.php");

// recebe id DO paciente
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    // EXCLUI OS DADOS DO PACIENTE
   $result_encaminhamento = "DELETE FROM encaminhamento WHERE id_pessoa = '$id' ";
   $resultado_encaminhamento = mysqli_query($conexao, $result_encaminhamento);

   $result_dados_medicos = "DELETE FROM dados_medicos WHERE id_pessoa = '$id' ";
   $resultado_dados_medicos = mysqli_query($conexao, $result_dados_medicos);

   $result_pessoa = "DELETE FROM pessoa WHERE id_pessoa = '$id' ";
   $resultado_pessoa = mysqli_query($conexao, $result_pessoa);

   if(mysqli_affected_rows($conexao)){
       echo "<script> window.location='pacientes_cadastrados.php';alert('Cadastro do paciente excluído com sucesso!');</script>";
   }
   else{
       echo "<script> window.location='pacientes_cadastrados.php';alert('Erro ao exluir cadastro do paciente!');</script>";
   }
}
else{
    echo "<script> window.location='pacientes_cadastrados.php';alert('Necessário selecionar usuário.');</script>";
}


 ?>
