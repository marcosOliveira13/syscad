
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>APP nano</title>
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
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                   nanoTecc
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="index.html">
                            <i class="material-icons">dashboard</i>
                            <p>Início</p>
                        </a>
                    </li>
                    <li>
                        <a href="./cadastro_cliente.html">
                            <i class="material-icons">person</i>
                            <p>Cadastrar de cliente</p>
                        </a>
                    </li>
                    <li>
                        <a href="./table.html">
                            <i class="material-icons">radio</i>
                            <p>Cadastrar de aparelho</p>
                        </a>
                    </li>
                    <li>
                        <a href="./cadastro_os.html">
                            <i class="material-icons">library_add</i>
                            <p>Cadastrar OS</p>
                        </a>
                    </li>
                    <li>
                        <a href="./fechar_os.html">
                            <i class="material-icons text-gray">insert_drive_file</i>
                            <p>Finalinalizar OS</p>
                        </a>
                    </li>
                    <li>
                        <a href="./os_finalizadas.html">
                            <i class="material-icons text-gray">insert_drive_file</i>
                            <p>OS finalizadas</p>
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
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Cadastrar novo aparelho</h4>
                                    <p class="category">cadastrar ou editar aparelho</p>
                                </div>
                                <div class="card-content">
                                   <form action="cad_aparelho.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tipo</label>
                                                    <input name ="tipo" type="text" class="form-control">
                                                </div>
                                            </div>
                                        <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>

                                        <div class="clearfix"></div>
                                     </form>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Tipo</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                            <thead class="text-primary">
                                                    <th>Tipo</th>
                                                    <th>Edit</th>
                                            </thead>
                                                <tbody>
                                                        <?php


                                                    $mysqli = new mysqli("localhost", "root","","nanotecc");
                                                    if ($mysqli->connect_error) {
                                                        die("Connection failed: " . $mysqli->connect_error);
                                                    }

                                                   // $sql = "SELECT aparelho FROM `aparelho`"
                                                    $result_select = mysqli_query($mysqli,"SELECT aparelho FROM `aparelho`");
                                                    $linhas=array();
                                                    echo("$result_select");                                                      

                                                    ?>

                                                        <tr>

                                                        </tr>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  </div>
             </div>



            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
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
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">nanotecc</a>, sistema web
                    </p>
                </div>
            </footer>
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
