<?php

//// funcao que realiza a conexao com o banco de dados ////
function conexao_mysql($host,$user,$pass,$db){
global $host, $user, $pass, $db;
//verifica se as variaveis (host,user,pass,db) estao setadas
if(isset($host) and isset($user) and isset($pass) and isset($db)){
//realiza a conexao com o banco de dados
$conexao = @mysql_connect($host, $user, $pass);
//checa se a conexao foi bem sucedida
if(!$conexao){
print("<font color='#FF0000'>Error!! Impossível conectar-se ao MYSQL.</font>");
exit();
}

//verifica e seleciona o banco de dados
if(!@mysql_select_db($db, $conexao)){
print("<font color='#FF0000'>Error!! Impossível selecionar o banco de dados $db"  . mysql_error() . '</font>');
exit();
}

}else{
print("<font color='#FF0000'>Error!! Alguma(s) da(s) variáveis (host, user, pass, db), não está atribuída!!</font>");
}
}

//Formata a data do banco de dados MYSQL (ex.: 2004-02-08 22:56:30) para uma mais
//convencional (ex.: 08 de Fevereiro de 2004 - 22h 56min).

function formatData($data)
{
$dia = substr($data, 8, 2);
$mes = substr($data, 5, 2);
switch ($mes) {
  case 1:
    $newmes = "Jan";
    break;
  case 2:
    $newmes = "Fev";
    break;
  case 3:
    $newmes = "Mar";
    break;
  case 4:
    $newmes = "Abr";
    break;
  case 5:
    $newmes = "Mai";
    break;
  case 6:
    $newmes = "Jun";
    break;
  case 7:
    $newmes = "Jul";
    break;
  case 8:
    $newmes = "Ago";
    break;
  case 9:
    $newmes = "Set";
    break;
  case 10:
    $newmes = "Out";
    break;
  case 11:
    $newmes = "Nov";
    break;
  case 12:
    $newmes = "Dez";
    break;
}
$ano = substr($data, 0, 4);
$novadata = $dia . ' de ' . $newmes . ' de ' . $ano;
$novahora = $novadata . ' - ' . substr($data, 11, 2) . 'h' . substr($data, 14, 2) . 'min';
$datahora = $novahora;
return $datahora;
}



/////////////////////////////////// incio cortar texto sem cortar palavra

function limitar($texto, $numero){
 
	$total = strlen($texto);
	$texto = substr($texto,0,$numero);
	$separar = explode(" ",$texto);
 
	if($total >= $numero){
		for($i=0; $i< (count($separar)-1); $i++){	
			$fim .= $separar[$i]." ";
		}
		$fim .= '...';
	}
        else
	{
         $fim = $texto;
        }
return $fim;
}
/////////////////////////////////// fim cortar texto sem cortar palavra
?>