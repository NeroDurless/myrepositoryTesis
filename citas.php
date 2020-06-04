<?php

header('Content-Type: application/json');

$pdo = new PDO("mysql:dbname=pruebas;host=127.0.0.1", "root", "");


$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

	switch($accion){
	
	case 'agregar':
	// Instrucción agregar
	$sentenciaSQL = $pdo->prepare("INSERT INTO DATOS_CITAS(title, description, color, textColor, start, end) VALUES(:title,:description,:color,:textColor,:start,:end)");
	
	$respuesta=$sentenciaSQL->execute(array(
	

		"title"=>$_POST['title'],
		"description"=>$_POST['description'],
		"color"=>$_POST['color'],
		"textColor"=>$_POST['textColor'],
		"start"=>$_POST['start'],
		"end"=>$_POST['end'],
	));
	
	echo json_encode($respuesta);
	break;
	
	
	case 'eliminar':
	// Instrucción eliminar
	
		$respuesta=false;
		
		if(isset($_POST['id'])){
		
		$sentenciaSQL = $pdo->prepare("DELETE FROM DATOS_CITAS WHERE id=:id");
		$respuesta=$sentenciaSQL->execute(array("id"=>$_POST['id']));
		
		}
	
	echo json_encode($respuesta);
	
	
	break;
	
	case 'modificar':
	// Instrucción modificar
	
	$sentenciaSQL = $pdo->prepare("UPDATE DATOS_CITAS SET title=:title, description=:description, color=:color, textColor=:textColor, start=:start, end=:end WHERE id=:id");
	
	
	$respuesta=$sentenciaSQL->execute(array(
	
		"id"=>$_POST['id'],
		"title"=>$_POST['title'],
		"description"=>$_POST['description'],
		"color"=>$_POST['color'],
		"textColor"=>$_POST['textColor'],
		"start"=>$_POST['start'],
		"end"=>$_POST['end']
	));
	
	echo json_encode($respuesta);
	
	
	break;
	
	default:
	
	$sentenciaSQL= $pdo->prepare("SELECT * FROM DATOS_CITAS");
	$sentenciaSQL->execute();
	
	$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($resultado);
	
	break;
}
	
?>