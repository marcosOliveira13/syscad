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
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }

$logado = $_SESSION['login'];
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
  <link href="../assets/css/cssCuston.css" rel="stylesheet" />
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
            <!--<i class="material-icons">dashboard</i>-->
            <p>Início</p>
          </a>
        </li>
        <li>
          <a href="cadastro_cliente.php">
             <!--<i class="material-icons">person</i> -->
            <i> <img src="../assets/img/icons/mais.png"> </i>
            <p>Cadastro de pacientes</p>
          </a>
        </li>
        <li>
          <a href="pacientes_cadastrados.php">
            <i> <img src="../assets/img/icons/pasta.png"> </i>
            <!-- <i class="material-icons text-gray">insert_drive_file</i> -->
            <p>Pacientes Cadastrados</p>
          </a>
        </li>
        <li>
          <a <?php echo '<a href="logout.php?token='.md5(session_id()).'">Sair';?>
            <i> <img src="../assets/img/icons/sair.png"> </i>
            <!--<i class="material-icons text-gray">unarchive</i>-->
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
              <div class="card-header" data-background-color="blue">
                <h4 class="title">Dados Pessoais</h4>
                <p class="category">CADASTRAR PACIENTE</p>
              </div>
              <div class="card-content">
                <form action="recebe.php" method="POST">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">Nome</label>
                        <input type="text" name="nome" class="form-control"required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">Sobrenome</label>
                        <input type="text" name="sobrenome" class="form-control"required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label >Data de Nascimento</label>
                        <input type="date" id="data" name="data_nascimento" class="form-control" required >
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">idade (apenas números)</label>
                        <input type="text" id="idade" name="idade"class="form-control" value="Idade" required="required" name="numbers" pattern="[0-9]+$" />
                      </div>
                    </div>
                    <!-- FAZ CALCULO DA IDADE USANDO JAVASCRIPT -->
                    <script>
                    document.getElementById("data").addEventListener('change', function() {
                      var data = new Date(this.value);
                      if(isDate_(this.value) && data.getFullYear() > 1900)
                          document.getElementById("idade").value = calculateAge(this.value);
                    });

                    function calculateAge(dobString) {
                      var dob = new Date(dobString);
                      var currentDate = new Date();
                      var currentYear = currentDate.getFullYear();
                      var birthdayThisYear = new Date(currentYear, dob.getMonth(), dob.getDate());
                      var age = currentYear - dob.getFullYear();
                      if(birthdayThisYear > currentDate) {
                        age--;
                      }
                      return age;
                    }

                    function calcular(data) {
                      var data = document.form.nascimento.value;
                      alert(data);
                      var partes = data.split("/");
                      var junta = partes[2]+"-"+partes[1]+"-"+partes[0];
                      document.form.idade.value = (calculateAge(junta));
                    }

                    var isDate_ = function(input) {
                            var status = false;
                            if (!input || input.length <= 0) {
                              status = false;
                            } else {
                              var result = new Date(input);
                              if (result == 'Invalid Date') {
                                status = false;
                              } else {
                                status = true;
                              }
                            }
                            return status;
                    }
                    </script>

                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">Cidade de nascimento</label>
                        <input type="text" name="cidade" class="form-control">
                      </div>
                    </div>
                  </div>


                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control">
                      </div>
                    </div>
                    <!--<div class="row"> -->
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label for="sel1">Unidade da Federação</label>
                        <select class="form-control" name="uf"id="sel1">
                          <option value="">Selecione</option>
                          <option value="AC">AC - Acre</option>
                          <option value="AL">AL - Alagoas</option>
                          <option value="AM">AM - Amazonas</option>
                          <option value="AP">AP - Amapá</option>
                          <option value="BA">BA - Bahia</option>
                          <option value="CE">CE - Ceará</option>
                          <option value="DF">DF - Distrito Federal</option>
                          <option value="ES">ES - Espírito Santo</option>
                          <option value="GO">GO - Goiás</option>
                          <option value="MA">MA - Maranhão</option>
                          <option value="MG">MG - Minas Gerais</option>
                          <option value="MS">MS - Mato Grosso do Sul</option>
                          <option value="MT">MT - Mato Grosso</option>
                          <option value="PA">PA - Pará</option>
                          <option value="PB">PB - Paraíba</option>
                          <option value="PE">PE - Pernambuco</option>
                          <option value="PI">PI - Piauí</option>
                          <option value="PR">PR - Paraná</option>
                          <option value="RJ">RJ - Rio de Janeiro</option>
                          <option value="RN">RN - Rio Grande do Norte</option>
                          <option value="RS">RS - Rio Grande do Sul</option>
                          <option value="RO">RO - Rondônia</option>
                          <option value="RR">RR - Roraima</option>
                          <option value="SC">SC - Santa Catarina</option>
                          <option value="SE">SE - Sergipe</option>
                          <option value="SP">SP - São Paulo</option>
                          <option value="TO">TO - Tocantins</option>
                        </select>
                      </div>
                      </div>
                    <!--</div> -->
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label for="sel1">Estado Civil</label>
                        <select class="form-control" name="estado_civil"id="sel1">
                          <option value="">Selecione</option>
                          <option value="Solteiro(a)">Solteiro (a)</option>
                          <option value="União Estavel">União Estável</option>
                          <option value="Casado">Casado (a)</option>
                          <option value="Divorciado">Divorciado (a)</option>
                          <option value="Viuvo">Viuvo (a)</option>
                          <option value="Separado">Separado (a)</option>
                        </select>
                      </div>
                    </div>
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Endereço</label>
                      <input type="text" name="endereco"class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Complementar</label>
                      <input type="text" name="complementar"class="form-control">
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">E-mail</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">Celular 1</label>
                        <input type="tel" name="telefone_celular1" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">Celular 2</label>
                        <input type="tel" name="telefone_celular2" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">Ocupação</label>
                        <input type="text" name="ocupacao" class="form-control">
                      </div>
                    </div>
                  </div>
                    <div class="card">
                      <div class="card-header" data-background-color="blue">
                        <h4 class="title">Dados Médicos e Espirituais</h4>
                      </div>
                      <div class="card-content">

                          <div class="row">

                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="control-label">Peso</label>
                                <input type="text" name="peso" class="form-control">

                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="control-label">Altura</label>
                                <input type="text" name="altura" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="control-label">Preção Arterial</label>
                                <input type="text" name="precao_arterial"class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="control-label">Doenças crônicas</label>
                                <input type="text" name="doenca_cronica" class="form-control">
                              </div>
                          </div>
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="comment">Relação Familiar</label>
                                <textarea class="form-control" name="relacao_familiar"rows="5"id="comment"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="comment">Problemas Mediúnicos</label>
                                <textarea class="form-control" name="problema_mediunico"rows="5" id="comment"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="comment">Vicios</label>
                                <textarea class="form-control" rows="5" name="vicios" id="comment"></textarea>
                              </div>
                          </div>
                              <div class="col-md-6">
                                  <div class="form-group label-floating">
                                    <label class="comment">Queixa principal que levou a buscar o tratamento</label>
                                    <textarea class="form-control" name="queixa"rows="5" id="comment"required></textarea>
                                  </div>
                                </div>
                         </div>
                          </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" data-background-color="blue">
                        <h4 class="title">Encaminhamento</h4>
                      </div>
                      <div class="card-content">
                          <div class="row">

                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="comment">Observação</label>
                                <textarea class="form-control areamaior" name="observacao"rows="10" name="Nobservacao" id="comment"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label for="sel1">Ecaminhar para</label>
                                <select class="form-control" name="encaminhamento"id="sel1" required>
                                  <option value="">Encaminhar para</option>
                                  <option value="Corrente Magnética I">Corrente Magnética I</option>
                                  <option value="Corrente Magnética II">Corrente Magnética II</option>
                                  <option value="Fluidoterapia">Fluidoterapia</option>
                                  <option value="Outro">Outro</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="control-label">Especificar outro</label>
                                <input type="text" name="outro" class="form-control">
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" data-background-color="green">
                  <p class="category">Clientes cadastrados</p>

                </div>
                <div class="card-content table-responsive">
                  <table class="table">
                    <thead class="text-primary">
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Registro</th>
                      <th>Telefone</th>
                      <th>Edit</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Dakota Rice</td>
                        <td>Niger@gmail.com</td>
                        <td>12345-SSP-DF</td>
                        <td>98989-2121</td>
                        <th>
                          <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                        <tr>
                          <td>Minerva Hooper</td>
                          <td>Curaçao@hotmail.com</td>
                          <td>54321-SSP-DF</td>
                          <td>88889-2323</td>
                          <th>
                            <button type="button" rel="tooltip" title="Editar " class="btn btn-primary btn-simple btn-xs">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs">
                              <i class="material-icons">close</i>
                            </button>
                          </td>
                          <tr>
                            <td>Sage Rodriguez</td>
                            <td>Netherlands@yahoo.com.br</td>
                            <td>816253-SSP-GO</td>
                            <td>78789-6767</td>
                            <th>
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </th>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div> -->
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
