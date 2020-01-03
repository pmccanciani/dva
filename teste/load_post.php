<?php 
ini_set('display_errors', 0 );
error_reporting(0);

$json_file = file_get_contents("users.json");   
$json_str = json_decode($json_file, true);

if($_POST['tipo'] == 'ASC'){
	$tipo = 'DESC';
}else{
	$tipo = 'ASC';
}

if($_POST['campo'] == 'Name'){
	if($tipo == 'ASC'){
		usort($json_str, function ($a, $b) {
			return $a['name'] <=> $b['name'];
		});
	}else{
		usort($json_str, function ($a, $b) {
			return $b['name'] <=> $a['name'];
		});
	}
}else if($_POST['campo'] == 'Username'){	
	if($tipo == 'ASC'){
		usort($json_str, function ($a, $b) {
			return $a['username'] <=> $b['username'];
		});
	}else{
		usort($json_str, function ($a, $b) {
			return $b['username'] <=> $a['username'];
		});
	}
}else if($_POST['campo'] == 'mail'){
	if($tipo == 'ASC'){
		usort($json_str, function ($a, $b) {
			return $a['email'] <=> $b['email'];
		});
	}else{
		usort($json_str, function ($a, $b) {
			return $b['email'] <=> $a['email'];
		});
	}
}else if($_POST['campo'] == 'Phone'){
	if($tipo == 'ASC'){
		usort($json_str, function ($a, $b) {
			return $a['phone'] <=> $b['phone'];
		});
	}else{
		usort($json_str, function ($a, $b) {
			return $b['phone'] <=> $a['phone'];
		});
	}
}

echo '<table class="table">
					<thead>
						<tr>
							<th scope="col"><a href="#" onclick="loadDoc(\'\',\''.$tipo.'\');">#</a></th>
							<th scope="col"><a href="#" onclick="loadDoc(\'Name\',\''.$tipo.'\');">Name</a></th>
							<th scope="col"><a href="#" onclick="loadDoc(\'Username\',\''.$tipo.'\');">Username</a></th>
							<th scope="col"><a href="#" onclick="loadDoc(\'mail\',\''.$tipo.'\');">E-mail</a></th>
							<th scope="col"><a href="#" onclick="loadDoc(\'Phone\',\''.$tipo.'\');">Phone</a></th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody id="corpo_tabela">';
					
					foreach($json_str as $value){
						echo '<tr>
							<td scope="row">'.$value['id'].'</td>
							<td scope="row">'.$value['name'].'</td>
							<td scope="row">'.$value['username'].'</td>
							<td scope="row">'.$value['email'].'</td>
							<td scope="row">'.$value['phone'].'</td>
							<td scope="row"><a href="#" onclick="printer(\''.$value['id'].'\');">Imprime</a></td>
						</tr>';
					}
					
				echo '</tbody>
				</table>';
?>