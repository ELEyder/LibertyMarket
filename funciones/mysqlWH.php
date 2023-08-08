<?php
function fnConnect( &$msg ){
	$cn=mysqli_connect("localhost","id21096967_eyder","EydervictorWH123.");
	if(!$cn){
		$msg = "Error en la conexión.";
		return 0;
	}
	$n = mysqli_select_db($cn,"drinkandfood");
	if(!$n){
		$msg = "Base de datos no existe.";
		mysqli_close($cn);
		return 0;
	}
	return $cn;
}

function fnConsultaSelect($consulta){
	// LLamar a la funcion de conexión que retorna la conexion
	$cn=fnConnect($msg);
	// Si no hay conexión se muestra error y se regresa
	if(!$cn){
		fnShowMsg("Error",$msg); // Mostrar mensaje de error
		return; // Salir
	}
	// Si no
	else{
		// Realiza la petición a la base de datos y devuelte la tabla
		$tablaSQL = mysqli_query($cn,$consulta);
		return $tablaSQL;
	}
}

function fnShowMsg($title,$msg){
    echo("<p>$title</p>"); 
	echo("<p>$msg</p>");
	echo("<a href='index.php'>Regresar</a>");
}
?>