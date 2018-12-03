<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	$ns="http://localhost/nusoap-0.9.5/samples";
	$server = new soap_server;
	$server->configureWSDL('comprobar1',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	//registramos la función que vamos a implementar
	$server ->register('comprobar1',
	array('x'=> 'xsd:string', 'y' => 'xsd:string' ),
	array('z'=> 'xsd:string'),
	$ns);
	
	//implementamos la función
	function comprobar1($x, $y){
	$pagina = file_get_contents('../toppasswords.txt');
	$pos = strpos($pagina, $y);
	$V="VALIDA";
	$I="INVALIDA";
		if ($pos === false){
			return $V;
		}
		else{
			return $I;
		}
	}
	//llamamos al método service de la clase nusoap
	if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	$server ->service($HTTP_RAW_POST_DATA);
?>
