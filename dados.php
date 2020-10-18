<?php
define ('UNO',"&#x2680");
define ('DOS',"&#x2681");
define ('TRES',"&#x2682");
define ('CUATRO',"&#x2683");
define ('CINCO',"&#x2684");
define ('SEIS',"&#x2685");

function generarAleatorio(){    
    for ($i=0;$i<5;$i++){
        $jugador[$i]=random_int(1,6);
    }
    return $jugador;
}
function obtenerPuntos($player){
    $maximo=max($player);
    $minimo=min($player);
    $resultado=array_sum($player)-$maximo-$minimo;
    return  $resultado;
}
function ganador($suma1,$suma2){
    if($suma1>$suma2){
        $winner="Ha ganado el jugador 1";
    }elseif ($suma1<$suma2){
        $winner= "Ha ganado el jugador 2";
    }else{
        $winner= "Han empatado";
    }
    return $winner;
}
function imprimir ($jugador,$color){
    for($x=0;$x<count($jugador);$x++){
        echo '<td id="'.$color.'">';
        switch ($jugador[$x]){
            case 1: 
                echo UNO;
                break;
            case 2: 
                echo DOS;
                break;
            case 3:
                echo TRES;
                break;
            case 4:
                echo CUATRO;
                break;
            case 5:
                echo CINCO;
                break;
            case 6: 
                echo SEIS;
                break;
        }
        echo '</td>';
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>	
        <style>
           	body{text-align:center;padding-top:50px;}
           	table{padding: 0;}
            #azul{border:blue solid 7px;
                  border-collapse: collapse;
                  font-size:100;}
            #rojo{border:red solid 7px;
                  border-collapse: collapse;
                  font-size:100;}
        </style>
    </head>
<body >
<h1> Cinco dados </h1>
<p>Actualice la página para mostrar una nueva tirada.</p>
<?php
echo "<center><table>";
$color1="azul";
$color2="rojo";
$player1=generarAleatorio();
$player2=generarAleatorio();
$suma1= obtenerPuntos($player1);
$suma2=obtenerPuntos($player2);


echo '<tr><td><b>Jugador 1 </td>';
echo imprimir($player1,$color1)."</td>";
echo "<td><b>".$suma1."</td>";

echo '<tr><td><b>Jugador 2 </td>';
echo imprimir($player2,$color2);
echo "<td><b>".$suma2."</td>";
echo "</table></center>";

echo '<p><b> Resultado </b>'.ganador($suma1, $suma2);
?>
	</body>
</html>