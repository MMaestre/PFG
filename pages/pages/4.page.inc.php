<?php
require_once realpath(__DIR__.'/../..').'/functions.php';
require_once realpath(__DIR__.'/../..').'/showmovies.php';

$fields=array('transporte');
$wrongFields=array();

foreach ($fields as $field)
{
	if (empty($_POST[$field]))
	{
		$wrongFields[]=$field;
	}
	else if ($_POST[$field]>0 AND $_POST[$field]<4)
	{
		$_SESSION[$field]=$_POST[$field];
	}
	else
	{
		session_destroy();
		header ('Location: ?page=1');
	}
}

//session_destroy();

?>

<h1 class="theme-heading">Películas disponibles</h1>
<form class="form-horizontal col-sm-12" action="?page=5" method="post">
	<div class="form-group">
        <?php
        showResults(showAllMovies($_SESSION['horaPase'], $_SESSION['transporte']));
        ?>
     </div>
</form>