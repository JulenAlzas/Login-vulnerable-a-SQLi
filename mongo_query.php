<?php
//Se ha enviado por solicitus POST el nombre de usuario y contraseña?
if( isset($_POST['username']) && isset($_POST['pass']) ){
	//Guardamos en variables el usuario y contraseña
	$username =$_POST['username'];
	$pass = $_POST['pass'];
	//Controlamos si los campos usuario y contraseña estan vacios
	if( empty($username) || empty($pass)){
		//Si estan vacios, se lo comunicamos en una solicitud GET por el parametro error
		header("Location: login.php?error=Usuario o contraseña vacios");
    	exit();
	}
	//Me conecto al servidor de mongodb activo
	$conn =new MongoDB\Driver\manager("mongodb://127.0.0.1:27017");
	//Busco en la base de datos "prac1" y en la coleccion "users" que exista algun usuario con el nombre y contraseña especificados
	$query = new MongoDB\Driver\Query(array('username' => $username, 'pass' => $pass));
	$cursor = $conn->executeQuery('prac1.users', $query);
	//cuento el numero de resultados
	$count_results = count($cursor->toArray());
	//Devuelvo el numero de resultados por medio del parametro countresult
	header("Location: login.php?countresult=$count_results");
    exit();

}else{ // Si no existen los parametros requeridos, devolvemos el error correspondiente
	header("Location: login.php?error=Nombre de usuario o contraseña no especificados");
	exit();
}
?>
