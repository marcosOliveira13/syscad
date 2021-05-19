<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }

//CONEXAO COM O BD
require_once("conexaoBD.php");
 ?>
<?php
header( 'Content-Type: text/html; charset=utf-8' );

// captura dos dados para as variaveis
//DADOS PESSOAIS
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$data_nascimento = $_POST['data_nascimento'];
$idade = $_POST['idade'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];
$uf = $_POST['uf'];
$estado_civil = $_POST['estado_civil'];
$endereco = $_POST['endereco'];
$complementar = $_POST['complementar'];
$email = $_POST['email'];
$telefone_celular1 = $_POST['telefone_celular1'];
$telefone_celular2 = $_POST['telefone_celular2'];
$ocupacao = $_POST['ocupacao'];
//DADOS MEDICOS
$data_atualizacao = date("Y-m-d H:i:s", time());
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$precao_arterial = $_POST['precao_arterial'];
$doenca_cronica = $_POST['doenca_cronica'];
$relacao_familiar = $_POST['relacao_familiar'];
$problema_mediunico = $_POST['problema_mediunico'];
$queixa = $_POST['queixa'];
$vicios = $_POST['vicios'];
//ENCAMINHAMENTO
$observacao = $_POST['observacao'];
$encaminhamento = $_POST['encaminhamento'];
$outro = $_POST['outro'];

// DADOS TRIADOR
$user = $_SESSION['login']; // usuario
$id_usuario = $_SESSION['id_login']; //id do usuario


// recebe  ID Paciente
$id_paciente = $_POST['id_paciente'];

//UUPDATE dos  DADOS NO BANCO
$sql = mysqli_query($conexao, "UPDATE pessoa SET  nome = '$nome', sobrenome =  '$sobrenome', data_nascimento = '$data_nascimento', idade = '$idade', uf = '$uf', estado_civil = '$estado_civil',
endereco = '$endereco', complementar = '$complementar', cidade = '$cidade', telefone_fixo = '$telefone', email = '$email', telefone_celular1 = '$telefone_celular1', telefone_celular2 = '$telefone_celular2', ocupacao = '$ocupacao' WHERE id_pessoa = '$id_paciente'");

$sql = mysqli_query($conexao, "UPDATE dados_medicos SET precao_arterial = '$precao_arterial', altura = '$altura', doenca_cronica = '$doenca_cronica', relacao_familiar =  '$relacao_familiar', problemas_mediunicos = '$problema_mediunico', vicios = '$vicios', queixa = '$queixa', data_atualizacao = '$data_atualizacao',
peso = '$peso' WHERE id_pessoa = '$id_paciente'");

$sql = mysqli_query($conexao, "UPDATE encaminhamento SET observacao = '$observacao', data_atualizacao = '$data_atualizacao', id_login =  '$id_usuario', outro = '$outro', encaminhamento = '$encaminhamento'
 WHERE id_pessoa = '$id_paciente'");

//Verificação do UPDATE (NÃO COMPLETAMENTE FUNXIONAL, APRESENTA ERRO DE SINTAXE NA LINHA 1 MAS NÃO ENCONTRO ERRO EM NENUM LUGAR E POR ISSO O ECHO ESTÁ FORA DO IF)
if (mysqli_query($conexao, $sql)) {
  echo "<script> window.location='cadastro_cliente.php';alert('Dados do paciente atualizado com sucesso!');</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
}
    echo "<script> window.location='pacientes_cadastrados.php';alert('Dados do paciente atualizado com sucesso!');</script>";

mysqli_close($conexao);

 ?>
