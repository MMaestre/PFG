<?php
require_once realpath(__DIR__.'/../..').'/functions.php';
require_once realpath(__DIR__.'/../..').'/checkForm.php';

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
		header ('Location: ?page=3');
	}
}
?>

<h1 class="theme-heading">Películas disponibles</h1>

<?php
	print_r(showAllMovies($_SESSION['horaPase'], $_SESSION['transporte']));
	// session_destroy();
?>