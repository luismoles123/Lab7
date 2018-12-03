<?php
session_start();
if(!isset($_SESSION["email"])){
    header("location:Seguridad.php");
}

include "ParametrosDB.php";
	$correo=$_GET['email'];
    $pregunta=$_GET['enunc'];
    $respCorr=$_GET["respu"];
    $complej=$_GET["compl"];
    $tema=$_GET["tema"];
	   
    $link = new mysqli($server, $user, $pass, $basededatos);
    if($link->connect_error){
        die("La conexión falló:" . $link->connect_error);
    }
      $sql = "INSERT INTO Preguntas (Email, Enunciado, RespuestaC, Incorrecta1, Incorrecta2, Incorrecta3, Complejidad, Tema) VALUES ('$correo', '$pregunta', '$respCorr', ' ', ' ', ' ', $complej, '$tema')";
    if(!mysqli_query($link, $sql)){
        die(mysqli_error($link));
    }
    mysqli_close($link);
	
	 $xml = simplexml_load_file("../xml/preguntas.xml");

	    
	    foreach($xml->assessmentItem as $ai){
	        if(strcasecmp($ai->itemBody->p,$pregunta)==0){
	            die("Esta pregunta ya existe, por lo que no se volverá a introducir en el xml");
	        }
	    }

  		$assessmentItem = $xml->addChild("assessmentItem");
		$assessmentItem->addAttribute('subject', $tema);
		$assessmentItem->addAttribute('author', $correo);
    	$itemBody = $assessmentItem -> addChild("itemBody");
		$itemBody->addChild('p', $pregunta);
  		$correctResponse = $assessmentItem -> addChild("correctResponse");
		$correctResponse-> addChild('value', $respCorr);
		
		$xml->asXML("../xml/preguntas.xml");
		header("location:VerPreguntasXML.php?email=$correo");
	    ob_end_flush();
?>