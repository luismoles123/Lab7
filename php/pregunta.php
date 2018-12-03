<html>
  <head>
    <meta name="tipo_contenido" content="text/html" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='../estilos/Pregunta.css' />
  </head>
  <body>
      
      <?php $co = $_GET['email'];?>
      <div id="divForm" align="center">
          
          <h2>Inserte la pregunta que desee</h2>
          <form id="fpreguntas" name="fpreguntas" method="post" action="InsertarPregunta.php">
              <div class="datosRegistro">
                  <label>Introduzca su correo electrónico:*</label>
                  <input type="text" id="corr" name="mail" class="datos" value="<?php echo $co?>" readonly="readonly" >
                  <br><br>
              </div>
              
             <div class="datosRegistro">
                  <label>Introduzca el enunciado de la pregunta:*</label>
                  <input type="text" id="enun" name="enun" class="datos">
                  <br><br>
              </div>
              <div class="datosRegistro">
                  <label>Respuesta correcta:*</label>
                  <input type="text" id="resp" name="resp" class="datos">
                  <br><br>
              </div>
              <div class="datosRegistro">
                  <label>Respuesta incorrecta 1:*</label>
                  <input type="text" id="inc1" name="inc1" class="datos">
                  <br><br>
              </div>
              <div class="datosRegistro">
                  <label>Respuesta incorrecta 2:*</label>
                  <input type="text" id="inc2" name="inc2" class="datos">
                  <br><br>
              </div>
              <div class="datosRegistro">
                  <label>Respuesta incorrecta 3:*</label>
                  <input type="text" id="inc3" name="inc3" class="datos">
                  <br><br>
              </div>
              <div class="datosRegistro">
                  <label>Complejidad (0-5):*</label>
                  <input type="number" id="comp" name="comp" class="datos">
                  <br><br>
              </div>
              <div class="datosRegistro">
                  <label>Tema de la pregunta:*</label>
                  <input type="text" id="tem" name="tem" class="datos">
                  <br><br>
              </div>
              <input type="submit" id="subm" name="subm" value="Enviar">
          </form>
        </div>
        
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
        <script>
				
               function validarCorreo(){
                  var correo=$("#corr").val();
                  var correoER= new RegExp("[a-z]*[0-9]{3}@ikasle.ehu.eus");
                  var test=correoER.test(correo);
                  return test;
                }
                    
                $("#fpreguntas").submit(function (){
                    
                    var correo=$("#corr").val();
                    var enunciado = $("#enun").val();
                    var respuesta = $("#resp").val();
                    var inc1 = $("#inc1").val();
                    var inc2 = $("#inc2").val();
                    var inc3 = $("#inc3").val();
                    var complej = $("#comp").val();
                    var tema = $("#tem").val();
                    
                    if(correo.length==0 || enunciado.length==0 || respuesta.length==0 || inc1.length==0 ||inc2.length==0 ||inc3.length==0 || complej.length==0 || tema.length==0){
                        alert("Los campos obligatorios no pueden estar vacíos")
                        return false;
                    }
                    if(!validarCorreo()){
                         alert("El correo tiene que ser de la universidad")
                       return false;
                    }
                    if(enunciado.length<10){
                        alert("La pregunta debe tener al menos 10 carácteres")
                        return false; 
                    }
                    if(complej<0 || complej>5){
                        alert("La complejidad debe ser un valor entre 0 y 5")
                        return false;
                    }
                      return true;
                });
        </script>
		-->
    </body>
</html>