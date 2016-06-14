<?php

	// Devuelve el nombre del cine
	function showCine($id)
	{
		$name=0;
		$conexion = new PDO( "mysql:host=localhost;dbname=project", "root", "" );
	
		$sql = "SELECT cineName FROM cinemas WHERE cineID = ?";
		$rs = $conexion->prepare( $sql );
		$rs->bindParam( 1, $id);
	
		$rs->execute();
		while ( $row =  $rs->fetch() )
		{
			$name=$row[0];
		}
	
		return $name;
	}

	// Devuelve el título de la película
	function showTitle($id)
	{
		$title=0;
		$conexion = new PDO( "mysql:host=localhost;dbname=project", "root", "" );
		
		$sql = "SELECT filmTitle FROM films WHERE filmID = ?";
		$rs = $conexion->prepare( $sql );
		$rs->bindParam( 1, $id);
		
		$rs->execute();
        while ( $row =  $rs->fetch() )
        {
        	$title=$row[0];
        }
        
        return $title;
	}
	
	// Devuelve la url del poster de la película
	function showPoster($id)
	{
		$img=0;
		$conexion = new PDO( "mysql:host=localhost;dbname=project", "root", "" );
		
		$sql = "SELECT filmURL_image FROM films WHERE filmID = ?";
		$rs = $conexion->prepare( $sql );
		$rs->bindParam( 1, $id);
		
		$rs->execute();
		while ( $row =  $rs->fetch() )
		{
			$title=$row[0];
		}
		
		return $title;
	}
	
	// Devuelve la duración de la película
	function filmDuration($id)
	{
		// La duración va en minutos
		$time=0;
		$conexion = new PDO( "mysql:host=localhost;dbname=project", "root", "" );
		
		$sql = "SELECT filmDuration FROM films WHERE filmID = ?";
		$rs = $conexion->prepare( $sql );
		$rs->bindParam( 1, $id);
		
		$rs->execute();
		while ( $row =  $rs->fetch() )
		{
			$time=$row[0];
		}
		
		return $time;
	}
	
	/* Devuelve un array con todos los datos del pase: identificador del pase, nombre del cine, título de la película, url del poster de la misma
	 * hora de inicio y hora de fin del pase	 */
	// Llama a showCine($id)
	// Llama a showTitle($id)
	// Llama a showPoster($id)
	// Llama a filmDuration($id)
	function passData($passID)
	{
		$fields=array('passID', 'cineID', 'filmID', 'passHour');
		$horaCierre=0;
		$i=0;
		$passData=array();
		$conexion = new PDO( "mysql:host=localhost;dbname=project", "root", "" );
		
		$sql = "SELECT * FROM pass WHERE passID= ?";
		$rs = $conexion->prepare( $sql );
		$rs->bindParam( 1, $passID);
		
		$rs->execute();
		
		while ( $row =  $rs->fetch() )
        {
			foreach($fields as $field)
			{
				if ($field == 'cineID')
				{
					$passData['Cine']=showCine($row[$field]);
				}
				else if ($field == 'filmID')
				{
					$passData['IDpelicula']=$row[$field];
					$passData['TituloPelicula']=showTitle($row[$field]);
					$passData['CartelPelicula']=showPoster($row[$field]);
					$horaCierre=filmDuration($row[$field]);
				}
				else if ($field == 'passHour')
				{
					$HoraPase=new DateTime($row[$field]);
					$passData['HoraFinalPase']=$HoraPase->add(new DateInterval('PT'.$horaCierre.'M'));
					$passData['HoraPase']=new DateTime($row[$field]);
					
					$passData['HoraPase']=date_format($passData['HoraPase'],'H:i:s');
					$passData['HoraFinalPase']=date_format($passData['HoraFinalPase'],'H:i:s');
				}
			}
        }
		
		return $passData;
	}
	
	// Devuelve el tiempo que se tarda en ir de un cine a otro en funci�n de su medio de transporte.
	function travelTime($cine1, $cine2, $transport)
	{
		$time=0;
		$conexion = new PDO( "mysql:host=localhost;dbname=project", "root", "" );
		
		$sql = "SELECT gtDuration FROM goto WHERE cineID1 = ? AND cineID2 = ? AND how = ?";
		$rs = $conexion->prepare( $sql );
		$rs->bindParam( 1, $cine1);
		$rs->bindParam( 2, $cine2);
		$rs->bindParam( 3, $transport);
		
		$rs->execute();
		while ( $row =  $rs->fetch() )
		{
			$time=$row[0];
		}
		
		return $time;
	}
	
	// Muestra todos los datos de las películas en función del cine y de la hora de emisión
	// Llama a passData($passID)
	function showMovies ($hour, $cine)
	{
		$time1=date_format($hour,'H:i:s');
		
		$movies=array();
		$conexion = new PDO( "mysql:host=localhost;dbname=project", "root", "" );
		
		$sql = "SELECT passID FROM pass WHERE cineID= ? AND passHour> ? ORDER BY cineID DESC, passHour ASC";
		$rs = $conexion->prepare( $sql );
		$rs->bindParam( 1, $cine);
		$rs->bindParam( 2, $time1);
		
		$rs->execute();
		while ( $row =  $rs->fetch() )
		{
			array_push($movies, passData($row['passID']));
		}
		
		print_r($movies);
		return $movies;
	}

	// Muestra todas las películas en función de la hora y el medio de transporte
	// Llama a travelTime($cine1, $cine2, $transport)
	// Llama a showMovies($time, $cine2)
	function showAllMovies($hourPass)
	{
		for ($cine1=1; $cine1<6; $cine1++)
		{
			$time=new DateTime($hourPass);
			showMovies($time, $cine1);
		}
	}
	
	function filmsOtherCinema($cine1, $transporte, $hourPass)
	{
		$time=new DateTime($hourPass);
		for ($cine2=1; $cine2<6; $cine2++)
		{
			if ($cine1==$cine2)
			{
				$transporte=0;
			}
			$time->add(new DateInterval('PT'.travelTime($cine1, $cine2, $transporte).'M'));
			showMovies($time, $cine2);
		}
	}

	// Comprueba la hora del primer pase
	function checkFirstPass()
	{
		$horaPase=0;
		
		$conexion = new PDO( "mysql:host=localhost;dbname=project", "root", "" );
		$sql = "SELECT passHour FROM pass ORDER BY passHour LIMIT 1";
		$rs = $conexion->prepare( $sql );
		
		$rs->execute();
		
		while ( $row =  $rs->fetch() )
		{
			$horaPase=new DateTime ($row[0]);
		}
		
		return $horaPase;
	}
	
	?>