<?php

require_once realpath(__DIR__.'/../..').'/functions.php';

$horaPase=checkFirstPass();
$hora=$horaPase->format("H");

?>
		<h1 class="theme-heading">Seleccione su versatilidad</h1>
			<form class="form-horizontal col-sm-10" action="?page=3" method="post">
				<input type="hidden" name="step" value="1"/>
				<div class="form-group">
					<label for="cuantosCines" class="col-sm-4 control-label">¿Uno o más cines?</label>
					<input type="radio" name="cuantosCines" value="1" class="col-sm-1 radio-inline" checked/>UNO<br/>
					<input type="radio" name="cuantosCines" value="2" class="col-sm-1 radio-inline"/>MÁS DE UNO
					 <br/>
				</div>
				<div class="form-group form-inline">
					<label for="horaPase" class="col-sm-4 control-label">¿A qué hora?</label>
					<div id="horaPase" class="col-sm-4">
						<select name="hora[]" id="hora" class="col-sm-1 form-control">
						<?php
							for ($i=$hora; $i<26; $i++)
							{
								if ($i<10)
								{
									echo "<option value=".$i.">0".$i."</option>";
								}
								else if ($i>23)
								{
									if ($i==24)
									{
										echo "<option value='o'>00</option>";
									}
									else if($i==25)
									{
										echo "<option value='1'>01</option>";
									}
								}
								else
								{
									echo "<option value=".$i.">".$i."</option>";
								}
							}
							?>
						</select>
						:
						<select name="minutos[]" id="minutos" class="form-control">
						<?php
						for ($i=0; $i<60; $i++)
						{
							if ($i==0)
							{
								echo "<option value=".$i."> 0".$i."</option>";
							}
							else if ($i%10==0)
							{
								echo "<option value=".$i.">".$i."</option>";
							}
						}
						?>
						</select>
					</div>
				</div>
				<input type="submit" name="sendBtn" id="sendBtn" class="btn btn-lg btn-default" value="Siguiente" />
    </form>