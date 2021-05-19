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

ob_start(); // iniciaa o DOMPDF para gerar essa pagina em PDF
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Imprimir Ficha</title>
    </head>
    <body>
        <div id="watermark">
            <img src="../assets/img/marcadagua.png"  />
        </div>
        <!--<div id="logo"><img src="../assets/img/logo.png"></img></div><br></br> -->
        <form class="" action="index.html" method="post">
            <div id="titulo">
                <h3>Ficha de Triagem</h3>
            </div>
            <h4 >Dados Pessoais</h4>
            <hr></hr>
            <div id="dados_pessoais">
            <div>
              <label >Nome:</label>
              <!--<input type="text" value="<?php //echo $linha_paciente['nome'];?> <?php //echo " "; ?> <?php// echo $linha_paciente['sobrenome']; ?>">-->
              <?php echo $linha_paciente['nome'];?> <?php echo " "; ?> <?php echo $linha_paciente['sobrenome']; ?>
            </div>
            <div id="dataNascimento">
              <label >Data de Nascimento:</label>
              <!--<input type="text"  value="<?php// echo $linha_paciente['data_nascimento']; ?>">-->
              <?php echo $linha_paciente['data_nascimento']; ?>
            </div>
            <div>
              <label >Idade:</label>
              <?php echo $linha_paciente['idade']; ?>
            </div>
            <!--<br></br>-->
            <div>
              <label> Cidade de nascimento:</label>
              <?php echo $linha_paciente['cidade']; ?>
            </div>
            <div>
                <label>Unidade da Federação:</label>
                <?php echo $linha_paciente['uf']; ?>
            </div>
              <div>
                <label >Estado Civil:</label>
                <?php echo $linha_paciente['estado_civil'];?>
            </div>
            <div>
                <label>Endereço:</label>
                <?php echo $linha_paciente['endereco']; ?>
            </div>
            <div>
                <label>Complementar:</label>
                <?php echo $linha_paciente['complementar']; ?>
            </div>
            <div>
                <label >E-mail:</label>
                <?php echo $linha_paciente['email']; ?>
            </div>
            <div>
                <label>Telefone:</label>
                <?php echo $linha_paciente['telefone_fixo']; ?>
            </div>
            <div>
                <label >Celular 1:</label>
                <?php echo $linha_paciente['telefone_celular1']; ?>
            </div>
            <div>
              <label >Celular 2:</label>
              <?php echo $linha_paciente['telefone_celular2']; ?>
            </div>
            <div>
                <label >Ocupação:</label>
                <?php echo $linha_paciente['ocupacao']; ?>
            </div>
            </div>
            <div>
                <h4 >Dados Medicos - Espirituais:</h4>
            </div>
            <hr></hr>
            <div id="dados_medicos">
                <div>
                  <label>Peso:</label>
                  <?php echo $linha__dados_medicos['peso']; ?>
                </div>
                <div>
                  <label>Altura:</label>
                  <?php echo $linha__dados_medicos['altura']; ?>
                </div>
                <div>
                  <label >Preção Arterial:</label>
                  <?php echo $linha__dados_medicos['precao_arterial']; ?>
                </div>
                <div>
                  <label >Doenças crônicas:</label>
                  <?php echo $linha__dados_medicos['doenca_cronica']; ?>
                </div>
                <div>
                  <label>Relação Familiar:</label>
                  <!--<textarea><?php// echo $linha__dados_medicos['relacao_familiar'];?></textarea>-->
                  <?php echo nl2br("<p>". wordwrap($linha__dados_medicos['relacao_familiar'], 100, '<br />', 1) ."</p>"); ?>
                </div>
                <div>
                  <label>Problemas Mediúnicos:</label>
                  <!--<textarea><?php //echo $linha__dados_medicos['problemas_mediunicos'];?></textarea>-->
                  <?php echo nl2br("<p>". wordwrap($linha__dados_medicos['problemas_mediunicos'], 100, '<br />', 1) ."</p>"); ?>
                </div>
                <div>
                  <label>Vícios:</label>
                  <!--<textarea><?php// echo $linha__dados_medicos['vicios'];?></textarea>-->
                  <?php echo nl2br("<p>". wordwrap($linha__dados_medicos['vicios'], 100, '<br />', 1) ."</p>"); ?>
                </div>
                <div>
                  <label>Queixa principal que levou a fazer o tratamento:</label>
                  <!--<textarea><?php //echo $linha__dados_medicos['queixa'];?></textarea>-->
                  <?php echo nl2br("<p>". wordwrap($linha__dados_medicos['queixa'], 100, '<br />', 1) ."</p>"); ?>
                </div>
            </div>
            <div id="encaminhamento">
                <div>
                  <h4>Encaminhamento:</h4>
                </div>
                <hr></hr>
                <div >
                    <label>Observações:</label>
                    <!--<textarea rows="60" cols="60"><?php// echo $linha_encaminhamento['observacao'];?></textarea>-->
                    <?php//echo nl2br($linha_encaminhamento['observacao']); ?>
                    <?php echo nl2br("<p>". wordwrap($linha_encaminhamento['observacao'], 100, '<br />', 1) ."</p>"); ?>

                </div>
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
    </body>
</html>

<style media="screen">
    label {
        font-weight:bold;
    }
    #dataNascimento{
        position: relative;
    }
    #titulo{
        position: relative;
        left: 35%;
    }
    #logo{
        position: absolute;
        left: 80%;
    }
    /**
    * Set the margins of the PDF to 0
    * so the background image will cover the entire page.
    **/
    @page {
        margin: 0cm 0cm;
    }

    /**
    * Define the real margins of the content of your PDF
    * Here you will fix the margins of the header and footer
    * Of your background image.
    **/
    body {
        margin-top:    3cm;
        margin-bottom: 1cm;
        margin-left:   1cm;
        margin-right:  1cm;
    }

    /**
    * Define the width, height, margins and position of the watermark.
    **/
    #watermark {
        position: fixed;
        bottom:   0px;
        left:     0px;
        /** The width and height may change
            according to the dimensions of your letterhead
        **/
        width:    21.8cm;
        height:   28cm;

        /** Your watermark should be behind every content**/
        z-index:  -1000;
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
$nomedoArquivo= "Ficha.pdf";
//Download automatico do PDF
$download = false;
//Exibe a página html
$dompdf->stream($nomedoArquivo, array('Attachment' => $download));
?>
