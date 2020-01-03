<?php

echo '<div id="fechar" align=right><a href="javascript:fechar();">FECHAR</a></div> ';

$json_file = file_get_contents("users.json");   
$json_str = json_decode($json_file, true);

$ID = $_POST['id'];
$expected = array_filter($json_str, function ($var) use ($ID) {
    return ($var['id'] == $ID);
});
foreach($expected as $dados){
	echo '<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td>'.$dados['name'].'</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td>'.$dados['username'].'</td>
			</tr>
			<tr>
				<td>E-mail:</td>
				<td>'.$dados['email'].'</td>
			</tr>
			<tr>
				<td>Rua:</td>
				<td>'.$dados['address']['street'].'</td>
			</tr>
			<tr>
				<td>Número:</td>
				<td>'.$dados['address']['suite'].'</td>
			</tr>
			<tr>
				<td>Cidade:</td>
				<td>'.$dados['address']['city'].'</td>
			</tr>
			<tr>
				<td>CEP:</td>
				<td>'.$dados['address']['zipcode'].'</td>
			</tr>
			<tr>
				<td>LAT:</td>
				<td>'.$dados['address']['geo']['lat'].'</td>
			</tr>
			<tr>
				<td>LONG:</td>
				<td>'.$dados['address']['geo']['lng'].'</td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td>'.$dados['phone'].'</td>
			</tr>
			<tr>
				<td>Site:</td>
				<td>'.$dados['website'].'</td>
			</tr>
			<tr>
				<td>Empresa:</td>
				<td>'.$dados['company']['name'].'</td>
			</tr>
			<tr>
				<td>Frase:</td>
				<td>'.$dados['company']['catchPhrase'].'</td>
			</tr>
			<tr>
				<td>Obs:</td>
				<td>'.$dados['company']['bs'].'</td>
			</tr>
		</tbody>
	</table>';
}
?>