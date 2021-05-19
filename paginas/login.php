<?php
// session_start inicia a sessão
session_start();

// CONEXAO AO BD
require_once("conexaoBD.php");

// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['usuario'];
$senha = $_POST['senha'];

if (!$conexao) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de triador
$result = mysqli_query($conexao, "SELECT * FROM triador WHERE usuario = '$login' AND senha = '$senha'");

$dados = mysqli_fetch_array($result);


/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do
resultado ele redirecionará para a página site.php ou retornara  para a página
do formulário inicial para que se possa tentar novamente realizar o login */
if(mysqli_num_rows ($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['id_login'] = $dados['id_login'];
header('location:cadastro_cliente.php');
}
else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  header('location:index.php');
  }
?>
