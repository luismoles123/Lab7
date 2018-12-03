<?php
include "ParametrosDB.php";

    $link = new mysqli($server, $user, $pass, $basededatos);
    if($link->connect_error){
        die("La conexión falló:" . $link->connect_error);
    }
    
    $dat= mysqli_query($link, "select * from Preguntas");
    
    echo "<table border=1>";  
    echo "<tr>";  
    echo "<th>Correo</th>";  
    echo "<th>Enunciado</th>";  
    echo "<th>Respuesta Correcta</th>";  
    echo "<th>Incorrecta1</th>";  
    echo "<th>Incorrecta2</th>";
    echo "<th>Incorrecta3</th>";  
    echo "<th>Complejidad</th>";  
    echo "<th>Tema</th>";
    echo "</tr>"; 
    
while ($row = mysqli_fetch_array($dat)){   
    echo "<tr>";  
    echo "<td>".$row['Email']."</td>";  
    echo "<td>".$row['Enunciado']."</td>";  
    echo "<td>".$row['RespuestaC']."</td>";  
    echo "<td>".$row['Incorrecta1']."</td>";  
    echo "<td>".$row['Incorrecta2']."</td>";  
    echo "<td>".$row['Incorrecta3']."</td>";
    echo "<td>".$row['Complejidad']."</td>";  
    echo "<td>".$row['Tema']."</td>";  
    echo "</tr>";  
}
$dat->close();
mysqli_close($link);
echo "</table>";  
?>  