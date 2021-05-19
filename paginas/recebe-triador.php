      <?php
      // CONEXAO COM O BD
        require_once("conexaoBD.php");

        $nomeCompleto = $_POST['nomeCompleto'];
        $usuario = $_POST['username'];
        $senha = $_POST['password'];

        $resultado = mysqli_query($conexao, "SELECT COUNT(*) FROM triador WHERE usuario = '$usuario'");
        $row = $resultado->fetch_row();
        if ($row[0] > 0) {
        echo "<script> window.location='index.php';alert('Olá! $nomeCompleto! Usuário já cadastrado!');</script>";
      }
      else{

          $sql = mysqli_query($conexao,"INSERT INTO triador(nome_triador, senha,usuario)
          VALUES('$nomeCompleto','$senha','$usuario')");

        echo "<script> window.location='index.php';alert('Bem Vindo(a): $nomeCompleto! Cadastro efetuado com sucesso!');</script>";
        }
      ?>
