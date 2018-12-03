<?php
  session_start();
  if(!isset($_SESSION["email"])){
      header("location:Seguridad.php");
  }
  ?>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='../estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../estilos/smartphone.css' />
  </head>
  <body>
  <?php
  $em=$_GET['email'];
  ?>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right" style="display:none;><a href="Registrar.php">Registrarse</a></span>
      		<span class="right" style="display:none;><a href="Login.php">Login</a></span>
      		<span class="right"><a href="logout.php" onclick="return confirm('Hasta la próxima!');">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span>
		<?php
		echo "<a href='layout.php?email=$em'>Inicio</a>";
		?>
		</span>
		<?php
		    if((strpos($em, 'ehu.es') !== false)){
		        echo "<span>";
		        echo "<a href='GestionarCuentas.php?email=$em'>Gestionar Cuentas</a>";
		        echo "</span>";
		    }else{   
		        echo "<span>";
		        echo "<a href='GestionPreguntas.php?email=$em'>Gestionar Preguntas</a>";
		        echo "</span>";
		    }
		?>
		<span>
		<?php
		echo "<a href='creditosConLogin.php?email=$em'>Creditos</a>";
		echo "</span>";
		?>
	</nav>
    <section class="main" id="s1">
    
	<div>
	Aqui se visualizan las preguntas y los creditos ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<a href='https://github.com/luismoles123/Lab7'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
