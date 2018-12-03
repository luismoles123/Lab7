<?php
include "ParametrosDB.php";

    $correo=$_POST["mail"];
    $pregunta=$_POST["enun"];
    $respCorr=$_POST["resp"];
    $inc1=$_POST["inc1"];
    $inc2=$_POST["inc2"];
    $inc3=$_POST["inc3"];
    $complej=$_POST["comp"];
    $tema=$_POST["tem"];
	
    if(filter_var($correo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z]*[0-9]{3}@ikasle.ehu.eus/")))==false) {
		echo "La dirección de correo introducida no es valida";
		echo "<br>";
		return false;
	}
	
	if($complej<0 || $complej>5){
		echo "La complejjidad no está entre 0 y 5";
		echo "<br>";
		return false;
	}
	
	if(strlen($correo)===0 || strlen($pregunta)===0 || strlen($respCorr)===0 || strlen($inc1)===0 ||strlen($inc2)===0 ||strlen($inc3)===0 || strlen($complej)===0 || strlen($tema)===0){
        echo "Los campos obligatorios no pueden estar vacíos";
		echo "<br>";
		return false;
	}
       
    $link = new mysqli($server, $user, $pass, $basededatos);
    if($link->connect_error){
        die("La conexión falló:" . $link->connect_error);
    }
      $sql = "INSERT INTO Preguntas (Email, Enunciado, RespuestaC, Incorrecta1, Incorrecta2, Incorrecta3, Complejidad, Tema) VALUES ('$correo', '$pregunta', '$respCorr', '$inc1', '$inc2', '$inc3', $complej, '$tema')";
    if(!mysqli_query($link, $sql)){
        die(mysqli_error($link));
    }else{
        echo "<p>Los datos se han introducido correctamente en la base de datos</p>";
    }
    mysqli_close($link);
    echo "<a href='VerPreguntas.php?email=$correo'>Ver Preguntas</a>";
	
	 $xml = simplexml_load_file("../xml/preguntas.xml");

	    
	    foreach($xml->assessmentItem as $ai){
	        if(strcasecmp($ai->itemBody->p,$pregunta)==0){
				echo "<br>";
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
    	$incorrectResponses = $assessmentItem -> addChild("incorrectResponses");
		$incorrectResponses->addChild('value', $inc1);
		$incorrectResponses->addChild('value', $inc2);
		$incorrectResponses->addChild('value', $inc3);
		
		$xml->asXML("../xml/preguntas.xml");
		
		echo "<br>";
		echo "<p> Los datos se han introducido correctamente en el XML</p>";
		echo "<a href='VerPreguntasXML.php?email=$correo'>Ver Preguntas XML</a>";
    ?>
    