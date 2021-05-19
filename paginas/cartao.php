<?php

require_once("conexaoBD.php");

// RECEBE ID PACIENTE
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$id_paciente = $id;
// SELECT COM ID DO PACIENTE - DADOS PESSOAIS
$result_consulta_pessoa = "SELECT * FROM pessoa WHERE id_pessoa = $id_paciente";
$result_paciente = mysqli_query($conexao, $result_consulta_pessoa);
$linha_paciente = mysqli_fetch_assoc($result_paciente);

// SELECT COM ID DO PACIENTE - DADOS MEDICOS

$result_consulta_dados_medicos = "SELECT * FROM dados_medicos WHERE id_pessoa = $id_paciente";
$result_dados_medicos = mysqli_query($conexao, $result_consulta_dados_medicos);
$linha__dados_medicos = mysqli_fetch_assoc($result_dados_medicos);

// SELECT COM ID DO PACIENTE - ENCAMINHAMENTO

$result_consulta_encaminhamento = "SELECT * FROM encaminhamento WHERE id_pessoa = $id_paciente";
$result_encaminhamento = mysqli_query($conexao, $result_consulta_encaminhamento);
$linha_encaminhamento = mysqli_fetch_assoc($result_encaminhamento);

ob_start(); // incicia o gerador de pdf para essa pagina
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Imprimir Ficha</title>
    </head>
    <body>
        <form class="" action="index.html" method="post">
            <div>
                <p>CARTAO DO PACIENTE</p>
            </div>
            <hr></hr>
            <div id="dados_pessoais">
            <div>
              <label >Nome: </label>
              <!--<input type="text" value="<?php //echo $linha_paciente['nome'];?> <?php //echo " "; ?> <?php// echo $linha_paciente['sobrenome']; ?>">-->
              <?php echo $linha_paciente['nome'];?> <?php echo " "; ?> <?php echo $linha_paciente['sobrenome']; ?>
            </div>
            <div>
                <label>Telefone: </label>
                <?php echo $linha_paciente['telefone_fixo']; ?>
            </div>
            <div>
                <label >Celular 1: </label>
                <?php echo $linha_paciente['telefone_celular1']; ?>
            </div>
            <div>
              <label >Celular 2: </label>
              <?php echo $linha_paciente['telefone_celular2']; ?>
            <div id="encaminhamento">
                <br></br>
                <div>
                    <label>Encaminhamento: </label>
                    <?php if($linha_encaminhamento['encaminhamento'] === 'Outro'){
                        echo $linha_encaminhamento['outro'];
                    }
                    else{
                        echo $linha_encaminhamento['encaminhamento'];
                    } ?>
                </div>
            </div>
        </form>
        <h4>Recomendações ao paciente:</h4>
        <p>Assistir as palestras públicas nas terças as 20:00H</p>
        <p>Evitar faltar nos dias de tratamento.</p>
        <p>Levar uma garrafa com água com temperatura ambiente para fluidificação.</p>
        <p>É importante para seu tratamento, para sua família e seu lar, a prática da prece.</p>
    </body>
</html>

<style media="screen">
    form label {
        font-weight:bold;
    }
</style>

<?php
//referencia o domPDF com namespace
use Dompdf\Dompdf;

//include autoload
include 'dompdf/autoload.inc.php';
//cria a instancia
$dompdf = new Dompdf();

$dompdf -> load_html(ob_get_clean());
//renderiza html
$dompdf -> render ();
//NOMEIA O ARQUIVO PDF GERADO
$nomedoArquivo= "cartao.pdf";
//Download automatico do PDF
$download = false;
//Exibe a página html
$dompdf->stream($nomedoArquivo, array('Attachment' => $download));
?>
