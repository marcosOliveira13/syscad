
<!doctype html>
<html lang="pt-br">

<head>
  <?php
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador
o caminho para a página principal do site (sistema), burlando assim a obrigação de
fazer um login, com isso se ele não estiver feito o login não será criado a session,
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }

$logado = $_SESSION['login'];
require_once("conexaoBD.php");
?>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Hospital Eurípedes Barsanulfo</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
      <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-1.jpg">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo">
        <a href="../paginas/cadastro_cliente.php" class="simple-text">
          <img src="../assets/img/logo.png"></img>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="cadastro_cliente.php">
             <!-- <i class="material-icons">dashboard</i> -->
              <p>Início</p>
            </a>
          </li>
          <li>
            <a href="./cadastro_cliente.php">
            <!--  <i class="material-icons">person</i> -->
            <i> <img src="../assets/img/icons/mais.png"> </i>
              <p>Cadastro de pacientes</p>
            </a>
          </li>
          <li>
            <a href="pacientes_cadastrados.php">
              <!--<i class="material-icons text-gray">insert_drive_file</i>-->
              <i> <img src="../assets/img/icons/pasta.png"> </i>
              <p>Pacientes Cadastrados</p>
            </a>
          </li>
          <li>
            <a <?php echo '<a href="logout.php?token='.md5(session_id()).'">Sair';?>
            <i> <img src="../assets/img/icons/sair.png"> </i>
            </a>
          </li>

        </ul>
      </div>
    </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> </a>
                    </div>
                    <div class="collapse navbar-collapse">

                        <form method="GET" action="busca.php" class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input name="busca" type="text" class="form-control" placeholder="Buscar">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

                <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="card">
                                                <div class="card-header" data-background-color="green">
                                                    <p class="category">Pacientes Cadastrados</p>

                                                </div>
                                                <div class="card-content table-responsive">
                                                        <table class="table">
                                                            <thead class="text-primary">
                                                                <th>Nome</th>
                                                                <th>Data de nascimento </th>
                                                                <th>Telefone</th>
                                                                <th>Ocupação</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $result_pessoa = "SELECT * FROM pessoa";
                                                                    $lista_pessoa = mysqli_query($conexao, $result_pessoa);
                                                                ?>
                                                                <tr>
                                                                    <?php while ($linha_pessoa = mysqli_fetch_assoc($lista_pessoa)) {
                                                                        ?>
                                                                        <td> <?php echo $linha_pessoa['nome'] ." ". $linha_pessoa['sobrenome'];?> </td>
                                                                        <td><?php  echo  date('d-m-Y', strtotime($linha_pessoa['data_nascimento']));  ?></td>
                                                                        <td><?php echo  $linha_pessoa['telefone_celular1'];  ?></td>
                                                                        <td><?php echo  $linha_pessoa['ocupacao'];  ?></td>
                                                                        <th>
                                                                                <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                                                                    <?php echo "<a href='editar.php?id=" . $linha_pessoa['id_pessoa'] ."'>"."<i class='material-icons'>edit</i>". "</a>"; ?>
                                                                                </button>
                                                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                                    <?php echo "<a href='delet_paciente.php?id=" . $linha_pessoa['id_pessoa'] ."'>"."<i class='material-icons'>close</i>". "</a>"; ?>
                                                                                </button>
                                                                                <button type="button" rel="tooltip" title="Imprimir Ficha" class="btn btn-danger btn-simple btn-xs">
                                                                                    <?php echo "<a href='gera_pdf.php?id=" . $linha_pessoa['id_pessoa'] ."'>"."<i class='material-icons'>local_printshop</i>". "</a>"; ?>
                                                                                </button>
                                                                                <button type="button" rel="tooltip" title="Cartão do Paciente" class="btn btn-danger btn-simple btn-xs">
                                                                                    <?php echo "<a href='cartao.php?id=" . $linha_pessoa['id_pessoa'] ."'>"."<i class='material-icons'>local_printshop</i>". "</a>"; ?>
                                                                                </button>
                                                                                <tr>
                                                                        </td>

                                                                    </td>
                                                                    </th>
                                                                </tr>
                                                                <?php } ?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
        <h5>Arquivos para impressão:</h5> <a href="arquivosPDF/EvangelhonoLar.pdf">Guia do Evangelho no Lar</a>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
