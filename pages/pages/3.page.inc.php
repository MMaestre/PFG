<?php
	require_once realpath(__DIR__.'/../..').'/functions.php';
	require_once realpath(__DIR__.'/../..').'/checkForm.php';

	
	$fields=array('cuantosCines', 'hora', 'minutos');
	$wrongFields=array();
	
	foreach ($fields as $field)
	{
		if (empty($_POST[$field]))
		{
			$wrongFields[]=$field;			
		}
		else
		{
			switch ($field)
			{
				case 'cuantosCines':
					if ($_POST[$field]==1)
					{
						$_SESSION[$field]=$_POST[$field];
						$_SESSION['transporte']=0;
					}
					else if ($_POST[$field]==2)
					{
						$_SESSION[$field]=$_POST[$field];
					}
					else
					{
						session_destroy();
						header ('Location: ?page=1');
					}
					break;
				case 'hora':				
					$horaSeleccionada=toTime($_POST[$field][0], $_POST['minutos'][0]);
					
					$horaPase=checkFirstPass();
					$horaPase=$horaPase->format("H:i");
					
					if ($horaSeleccionada < $horaPase)
					{
						$wrongFields[]=$field;
						header('Location: ?page=1');
					}
					else
					{
						$_SESSION['horaPase']=$horaSeleccionada;
					}
			}
		}
	}
	
	if (isset($_SESSION['transporte']))
	{
		header('Location: ?page=4');
	}		
	?>
<h1 class="theme-heading">Seleccione su medio de transporte</h1>
<form class="form-horizontal col-sm-10" action="?page=4" method="post">
	<div class="form-group">
	<label for="transporte" class="col-sm-4 control-label">¿Qué transporte usará?</label>
		<input type="radio" name="transporte" value="1" class="col-sm-1 radio-inline" checked/>ANDANDO<br/>
		<input type="radio" name="transporte" value="2" class="col-sm-1 radio-inline" checked/>COCHE<br/>
		<input type="radio" name="transporte" value="3" class="col-sm-1 radio-inline" checked/>TRANSPORTE PÚBLICO<br/>
	<br/>
	</div>
	<input type="submit" name="sendBtn" id="sendBtn" class="btn btn-lg btn-default" value="Siguiente" />
</form>