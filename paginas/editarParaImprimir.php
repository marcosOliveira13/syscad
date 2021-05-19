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

?>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <title>PDF</title>
</head>
<body>
  <div >

  <div >
    <div >
      <div >
        <div >
          <div>
            <div>
              <div>
                <h4 >Dados Pessoais</h4>
                <p >ALTERAR DADOS DO PACIENTE</p>
              </div>

              <div>
                <form action="update_paciente.php" method="POST">

                    <!-- RECEBE ID DO PACIENTE -->
                    <input type="hidden" name="id_paciente" value="<?php echo $linha_paciente['id_pessoa']; ?>">

                  <div>

                    <div>
                      <div>
                        <label >Nome</label>
                        <input type="text" name="nome" class="form-control" value="<?php echo $linha_paciente['nome']; ?>" required>
                      </div>
                    </div>

                    <div>
                      <div >
                        <label >Sobrenome</label>
                        <input type="text" name="sobrenome" class="form-control" value="<?php echo $linha_paciente['sobrenome']; ?>" required>
                      </div>
                    </div>

                    <div>
                      <div>
                        <label >Data de Nascimento</label>
                        <input type="date" name="data_nascimento" class="form-control" value="<?php echo $linha_paciente['data_nascimento']; ?>">

                      </div>
                    </div>

                    <div>
                      <div>
                        <label >Idade (apenas números)</label>
                        <input type="text" name="idade"class="form-control" value="<?php echo $linha_paciente['idade']; ?>" required="required" name="numbers" pattern="[0-9]+$">
                      </div>
                    </div>
                    <div>
                      <div>
                        <label >Cidade de nascimento</label>
                        <input type="text" name="cidade" class="form-control" value="<?php echo $linha_paciente['sobrenome']; ?>">
                      </div>
                    </div>
                  </div>


                    <div>
                      <div>
                        <label>Telefone</label>
                        <input type="text" name="telefone" class="form-control" value="<?php echo $linha_paciente['telefone_fixo']; ?>">
                      </div>
                    </div>
                    <!--<div class="row"> -->
                    <?php $unFederal = $linha_paciente['uf']; ?>
                    <div >
                      <div>
                        <label for="sel1">Unidade da Federação</label>
                        <select class="form-control" name="uf"id="sel1"  >
                          <option value=" <?php echo "$unFederal"; ?> "> <?php echo $linha_paciente['uf']; ?> </option>
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
                    <!--recebe estado civil -->
                    <?php $est_civil = $linha_paciente['estado_civil'];?>

                    <div>
                    <div>
                      <div>
                        <label for="sel1">Estado Civil</label>
                        <select class="form-control" name="estado_civil"id="sel1">
                          <option value ="<?php echo "$est_civil";?>"> <?php echo $linha_paciente['estado_civil'];?></option>
                          <option value="Solteiro(a)">Solteiro (a)</option>
                          <option value="União Estavel">União Estável</option>
                          <option value="Casado">Casado (a)</option>
                          <option value="Divorciado">Divorciado (a)</option>
                          <option value="Viuvo">Viuvo (a)</option>
                          <option value="Separado">Separado (a)</option>
                        </select>
                      </div>
                    </div>
                  <div >
                    <div>
                      <label>Endereço</label>
                      <input type="text" name="endereco"class="form-control" value="<?php echo $linha_paciente['endereco']; ?>" >
                    </div>
                  </div>
                  <div>
                    <div>
                      <label>Complementar</label>
                      <input type="text" name="complementar"class="form-control" value="<?php echo $linha_paciente['complementar']; ?>" >
                    </div>
                  </div>
                  </div>
                  <div>
                    <div
                      <div class="form-group label-floating">
                        <label >E-mail</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $linha_paciente['email']; ?>" >
                      </div>
                    </div>
                    <div>
                      <div>
                        <label >Celular 1</label>
                        <input type="tel" name="telefone_celular1" class="form-control" value="<?php echo $linha_paciente['telefone_celular1']; ?>" >
                      </div>
                    </div>
                    <div>
                      <div>
                        <label >Celular 2</label>
                        <input type="tel" name="telefone_celular2" class="form-control" value="<?php echo $linha_paciente['telefone_celular2']; ?>" >
                      </div>
                    </div>
                    <div >
                      <div class="form-group label-floating">
                        <label >Ocupação</label>
                        <input type="tel" name="ocupacao" class="form-control" value="<?php echo $linha_paciente['ocupacao']; ?>" >
                      </div>
                    </div>
                  </div>
                    <div>
                      <div>
                        <h4 class="title">Dados Médicos e Espirituais</h4>
                      </div>
                      <div>
                          <div>

                            <div>
                              <div>
                                <label>Peso</label>
                                <input type="text" name="peso" class="form-control" value = "<?php echo $linha__dados_medicos['peso']; ?>" >
                              </div>
                            </div>
                            <div>
                              <div>
                                <label>Altura</label>
                                <input type="text" name="altura" class="form-control" value = "<?php echo $linha__dados_medicos['altura']; ?>" >
                              </div>
                            </div>
                            <div>
                              <div>
                                <label >Preção Arterial</label>
                                <input type="text" name="precao_arterial"class="form-control" value = "<?php echo $linha__dados_medicos['precao_arterial']; ?>" >
                              </div>
                            </div>
                            <div>
                              <div>
                                <label >Doenças crônicas</label>
                                <input type="text" name="doenca_cronica" class="form-control" value = "<?php echo $linha__dados_medicos['doenca_cronica']; ?>" >
                              </div>
                          </div>
                            <div>
                              <div>
                                <label class="comment">Relação Familiar</label>
                                <textarea class="form-control" name="relacao_familiar"rows="5"id="comment"><?php echo $linha__dados_medicos['relacao_familiar']; ?></textarea>
                              </div>
// relacao familiar ja feito certo




                            </div>
                            <div>
                              <div>
                                <label class="comment">Problemas Mediúnicos</label>
                                <textarea class="form-control" name="problema_mediunico"rows="5" id="comment"><?php echo $linha__dados_medicos['problemas_mediunicos']; ?></textarea>
                              </div>
                            </div>
                            <div>
                              <div>
                                <label class="comment">Vicios</label>
                                <textarea class="form-control" rows="5" name="vicios" id="comment"><?php echo $linha__dados_medicos['vicios']; ?></textarea>
                              </div>
                          </div>
                              <div>
                                  <div>
                                    <label class="comment">Queixa principal que levou a buscar o tratamento</label>
                                    <textarea class="form-control" name="queixa"rows="5" id="comment" required><?php echo $linha__dados_medicos['queixa']; ?></textarea>
                                  </div>
                                </div>
                         </div>




                          </div>
                      </div>
                    </div>
                    <div>
                      <div>
                        <h4>Encaminhamento</h4>
                      </div>
                      <div>
                          <div>

                            <div>
                              <div>
                                <label>Observação</label>
                                <textarea class="form-control areamaior" name="observacao"rows="10" name="Nobservacao" id="comment"><?php echo $linha_encaminhamento['observacao']; ?></textarea>
                              </div>
                            </div>
                          </div>
                          <?php $encaminhar = $linha_encaminhamento['encaminhamento'];?>
                          <div>
                            <div>
                              <div >
                                <label for="sel1">Ecaminhar para</label>
                                <select name="encaminhamento"id="sel1">

                                  <option value = "<?php echo "$encaminhar";?>"> <?php echo $linha_encaminhamento['encaminhamento']; ?> </option>
                                  <option value="Corrente Magnética I">Corrente Magnética I</option>
                                  <option value="Corrente Magnética II">Corrente Magnética II</option>
                                  <option value="Fluidoterapia">Fluidoterapia</option>
                                  <option value="Outro">Outro</option>
                                </select>
                              </div>
                            </div>
                            <div>
                              <div>
                                <label>Especificar outro</label>
                                <input type="text" name="outro" class="form-control" value="<?php echo $linha_encaminhamento ['outro']; ?>" >
                              </div>
                            </div>
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
</body>

</html>
