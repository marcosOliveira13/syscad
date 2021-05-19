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
    $data_cadastro = date("Y-m-d H:i:s", time());
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

    //echo $resultado, $user;

    //INSERÇÃO DE DADOSNO BANCO

    $sql = mysqli_query($conexao,"INSERT INTO pessoa(data_cadastro, nome,sobrenome, data_nascimento, idade, uf, estado_civil, endereco, complementar, cidade, telefone_fixo, email, telefone_celular1, telefone_celular2, ocupacao)
    VALUES('$data_cadastro','$nome', '$sobrenome', '$data_nascimento', '$idade', '$uf', '$estado_civil', '$endereco', '$complementar', '$cidade','$telefone', '$email', '$telefone_celular1', '$telefone_celular2','$ocupacao')");

     //recebo o último ID_pessoa e guardo na variável

    $id_pessoa_fk = $conexao->insert_id;
    // utilizo a variável que guarda o vaor do id_pessoa

    $sql = mysqli_query($conexao,"INSERT INTO dados_medicos(id_pessoa, id_login, precao_arterial, altura, doenca_cronica, relacao_familiar, problemas_mediunicos, vicios, queixa, data_cadastro, data_atualizacao, peso)
    VALUES ('$id_pessoa_fk', '$id_usuario', '$precao_arterial', '$altura', '$doenca_cronica', '$relacao_familiar', '$problema_mediunico', '$vicios', '$queixa','$data_cadastro', '$data_cadastro', '$peso')");

    $sql = mysqli_query($conexao,"INSERT INTO encaminhamento(id_pessoa, observacao, data_cadastro, data_atualizacao, id_login, outro, encaminhamento)
    VALUES ('$id_pessoa_fk', '$observacao', '$data_cadastro', '$data_cadastro', '$id_usuario', '$outro', '$encaminhamento')");

    
    if (mysqli_query($conexao, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
        }
    echo "<script> window.location='cadastro_cliente.php';alert('Paciente Cadastrado com sucesso!');</script>";
    mysqli_close($conexao);

     ?>
