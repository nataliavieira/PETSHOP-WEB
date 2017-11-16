<?php
/* Carrega a classe DOMPdf */
require_once("dompdf/dompdf_config.inc.php"); 
include ("conexao.php");
// include("mpdf60/mpdf.php");
  			$cod_agendamento = filter_input(INPUT_POST, 'cod_agendamento');
            $Nome_Animal = filter_input(INPUT_POST, 'Nome_Animal');
            $Nome_Dono = filter_input(INPUT_POST, 'Nome_Dono');
            $Pacote = filter_input(INPUT_POST, 'Pacote');
            $Data_Servico = filter_input(INPUT_POST, 'Data_Servico');
            $Horario = filter_input(INPUT_POST, 'Horario');

/* Cria a instância */
$dompdf = new DOMPDF();

/* Carrega seu HTML */
$dompdf->load_html('<fieldset>
 <h1><center>Nota Fiscal </center></h1>
Nº do agendamento: ............................................................................ '.$cod_agendamento.'
 <br> 
 <br>
 Nome do animal: .............................................................................. '.$Nome_Animal.'
 <br>
 <br>
 Tipo do pacote:...............................................................................'.$Pacote.'
 <br>
 <br>
 Data agendada: ................................................................................'.$Data_Servico.'
 <br>
 <br>
 Horário agendado: ............................................................................'.$Horario.' 
 <br>
 <br>'
 );

/* Renderiza */
$dompdf->render();

/* Exibe */
$dompdf->stream(
    "saida.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
?>
