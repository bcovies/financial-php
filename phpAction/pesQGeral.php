<?php
include("../conexao.php");

//Receber a requisão da pesquisa 
$requestData = $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(
	0 => 'idMes',
	1 => 'nomeNf',
	2 => 'valorNf',
	3 => 'nomeMes',
	4 => 'idPagador',
	5 => 'ano'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT idPagador,nome,usuario FROM usuarios";
$resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT mes.ano,usuarios.nome,mensalidade.idPagador,id_nome.nomeMes,mensalidade.idMes,mensalidade.nomeNf,mensalidade.valorNf
FROM mes
  JOIN id_nome ON mes.idNomeMes = id_nome.idNomeMes
   JOIN mensalidade ON mes.idMes = mensalidade.idMes
	 JOIN usuarios ON mes.idPagador = usuarios.idPagador WHERE 1=1";

$resultado_usuarios = mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios .= " AND ( nomeNf LIKE '" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR nomeNf LIKE '" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR nomeMes LIKE '" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR ano LIKE '" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR nome LIKE '" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR valorNf LIKE '" . $requestData['search']['value'] . "%' )";
}


//Ordenar o resultado
$result_usuarios .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
	$dado = array();
	$dado[] = $row_usuarios["idMes"];
	$dado[] = $row_usuarios["nomeNf"];
	$dado[] = $row_usuarios["valorNf"];
	$dado[] = $row_usuarios["nomeMes"];
	$dado[] = $row_usuarios["idPagador"];
	$dado[] = $row_usuarios["ano"];
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval($qnt_linhas),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval($totalFiltered), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
