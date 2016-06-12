<?php
if (empty($_GET['page']))
{
	header('Location: ?page=1');
	die();
}

$init_path=__DIR__;

$pages = scandir("{$init_path}/pages");
unset($pages[0], $pages[1]);

foreach ($pages as $page)
{
	$page=substr($page, 0, strpos($page, '.'));
}

	$include_file="{$init_path}/pages/{$_GET['page']}.page.inc.php";

?>