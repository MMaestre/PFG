<?php

// ¿Qué hacemos con el array de películas?
/* Array (
 * 		[0] => Array ( 
 * 				[Cine] => C.C. Thader 
 * 				[IDpelicula] => 2 
 * 				[TituloPelicula] => Objetivo: Londres 
 * 				[CartelPelicula] => http://www.labutaca.net/peliculas/wp-content/uploads/2014/11/london-has-fallen-cartel2.jpg 
 * 				[HoraFinalPase] => 00:39:00 
 * 				[HoraPase] => 23:00:00 ) ) */

function showResults ($array)
{
	$cine=$array[0][0]['Cine'];
	
	echo "<h2>".$cine."</h2>      <div class='row'>";
	
		foreach ($array as $rows)
			foreach ($rows as $row)
			{
				if ($row['Cine']==$cine)
				{
					echo htmlMovie($row);
				}
				else
				{
					$cine=$row['Cine'];
					echo '</div><br/><h2>'.$cine.'</h2>       <div class="row">';
					echo htmlMovie($row);
				}
			}
		echo "</div>";
			
}

function htmlMovie($array)
{
	return '<div class="col-xs-6 col-md-4 col-lg-4 col-centered">
							          <img class="img-rounded" src="'.$array["CartelPelicula"].' "width="140" height="140">
							          <h3>'.$array["TituloPelicula"].'</h3>
							          <p><strong>Hora Pase: '.$array["HoraPase"].' </p>
							          <input type="submit" name="sendBtn" class="btn btn-default"  id="'.$array["passID"].' "  value="Seleccionar" />
							    </div>';
}
?>