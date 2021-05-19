<!doctype html>
<html lang="pt-br">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<head>
    <!-- login -->
    <title>login</title>
    <!-- validação das senhas para cadastro de triadores -->

<!--    <link href="../assets/css/login.css" rel="stylesheet" />-->
    <script type="text/javascript" src="../assets/js/login.js"> </script>
    <script type="text/javascript" src="../assets/js/senha-validacao.js"> </script>

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
            <div class="logo" >
                <a href="../paginas/index.php" class="simple-text">
                   <img src="../assets/img/logo.png"></img>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <!--<ul class="nav"
                    <li class="active">
                        <a href="index.html">
                            <i class="material-icons">dashboard</i>
                            <p>Início</p>
                        </a>
                    </li>
                    <li>
                        <a href="./cadastro_cliente.html">
                            <i class="material-icons">person</i>
                            <p>Cadastro de pacientes</p>
                        </a>
                    </li>
                    <li>
                        <a href="./pacientes_cadastrados.html">
                            <i class="material-icons text-gray">insert_drive_file</i>
                            <p>Pacientes Cadastrados</p>
                        </a>
                    </li>




                </ul> -->
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
                  <!--<div class="collapse navbar-collapse">

                       <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div> -->
                </div>
            </nav>

            <footer class="footer">
                <div class="container-fluid">

                    <nav class="pull-left">
               <!--         <ul>
                            <li>
                                <a href="#">
                                    Início
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Caixa
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Balanço
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Backup
                                </a>
                            </li>
                        </ul>  -->
                    </nav>

                    <p class="copyright pull-right">
                     <!--   &copy; -->
                  <!--      <script>
                           document.write(new Date().getFullYear())
                        </script>
                       <a href="#">nanotecc</a>, sistema web -->
                    </p>

                </div>
            </footer>

        </div>
        <div class="container">
            	<div class="row">
        			<div class="col-md-6 col-md-offset-3">
        				<div class="panel panel-login">
        					<div class="panel-heading">
        						<div class="row">
        							<div class="col-xs-6">
                        <i class="material-icons">person</i>
        								<a href="#" class="active" id="login-form-link">Entrar</a>
        							</div>
        							<div class="col-xs-6">
                        <i class="material-icons text-gray">insert_drive_file</i>
        								<a href="#" id="register-form-link">Cadastrar</a>
        							</div>
        						</div>
        						<hr>
        					</div>
        					<div class="panel-body">
        						<div class="row">
        							<div class="col-lg-12">
        								<form id="login-form" action="login.php" method="POST" role="form" style="display: block;">
        									<div class="form-group">
        										<input type="text" name="usuario" id="username" tabindex="1" class="form-control" placeholder="Usuário" value="">
        									</div>
        									<div class="form-group">
        										<input type="password" name="senha" id="password" tabindex="2" class="form-control" placeholder="Senha">
        									</div>
        									<div class="form-group">
        										<div class="row">
        											<div class="col-sm-6 col-sm-offset-3">
        												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-primary pull-right btn-block"  value="Entrar">
        											</div>
        										</div>
        									</div>
        									<div class="form-group">
        										<div class="row">

        										</div>
        									</div>
        								</form>
        								<form id="register-form" action="recebe-triador.php" method="post" role="form" style="display: none;" onsubmit="return validarSenha();">
                                            <div class="form-group">
        										<input type="text" name="nomeCompleto" id="nomeCompleto" tabindex="1" class="form-control" placeholder="Nome Completo" value="" required>
        									</div>
        									<div class="form-group">
        										<input type="text" name="username" id="usuario" tabindex="2" class="form-control" placeholder="Usuário" value="" required>
        									</div>
        									<div class="form-group">
        										<input type="password" name="password" id="senha" tabindex="3" class="form-control" placeholder="Senha" required>
        									</div>
        									<div class="form-group">
        										<input type="password" name="confirm-password" id="confirm-senha" tabindex="2" class="form-control" placeholder="Confirme sua senha" required>
        									</div>
        									<div class="form-group">
        										<div class="row">
        											<div class="col-sm-6 col-sm-offset-3">
        												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-primary pull-right btn-block" value="Cadastrar">
        											</div>
        										</div>
        									</div>
        								</form>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
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
