<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Prac1 - Ej. 2 - Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        form {
            width: 800px;
            border: 4px solid black;
            padding: 20px;
            background: rgb(204, 102, 0);
            border-radius: 20px;

        }

        h2 {
            text-align: center;
        }

        input {
            display: block;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        button {
            float: left;
            margin-left: 47%;
            background: rgb(40, 160, 202);
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            border: none;
        }

        button:hover {
            opacity: .9;
        }

        label {
            color: black;
            font-size: 18px;
            padding: 10px;
        }

        .error {
            background: #C04B4B;
            color: #0c0101;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }

        .countresult {
            background: #F2DEDE;
            color: #0c0101;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }


        h1 {
            text-align: center;
        }

        a {
            float: right;
            background: rgb(183, 225, 233);
            padding: 10px 15px;
            color: #fff;
            border-radius: 10px;
            margin-right: 10px;
            border: none;
            text-decoration: none;
        }

        a:hover {
            opacity: .7;
        }
    </style>
</head>

<body>

    <form action="mongo_query.php" method="post">

        <h2>LOGIN</h2>
		<!--Si existe un error -> vuelve a intentarlo-->
        <?php if (isset($_GET['error'])) { ?>

        <p class="error">
            <?php echo $_GET['error'] . ". Vuelve a intentarlo"; ?>
        </p>
        <?php } ?>

		<!--Si los datos introducidos estan bien -> Devuelve countresult? -->
        <?php if (isset($_GET['countresult'])) { 
			//Si countresult > 0 significa que "mongo_query.php" ha encontrado que existeun usuario con ese nombre y contraseña
			if ($_GET['countresult'] > 0){ 
        	?>
        		<!--Muestra por pantalla que existe el usuario-->
				<p class="countresult"> Usuario existente con esa contraseña</p>
			<!--Si no, no existe ese usuario-->
        	<?php }else{ ?>
        		<p class="error"> No existe ese usuario o contraseña. Vuelve a intentarlo </p>
        	<?php }
        } ?>

		<!--Sintaxis para el formulario-->
        <label>Nombre de usuario</label>

        <input type="text" name="username" placeholder="Juan"><br>

        <label>Contraseña</label>

        <input type="password" name="pass" placeholder="Juan1234"><br>

        <button type="submit">Login</button>

    </form>

</body>


</html>
