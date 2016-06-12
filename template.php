<?php
	include ('pages/init.inc.php');
    
	session_start();
	
    $titles=array("", " 1. Inicio", " 2. Elige tu Pase", "3. Transporte", "4. Cartelera ");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="PFG - Creación de un sistema de BBDD que permita la creación de un plan para ver películas en emisión en salas de cine">
        <meta name="keywords" content="HTML,CSS,PHP,XML,JQuery,SQL,Bootstrap,JavaScript">
        <meta name="author" content="María Maestre">
        <!-- Bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="css/theme.css" rel="stylesheet">
    </head>
    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="theme-container">
                    <div class="header clearfix">
                        <div class="inner">
                            <h3 class="header-brand">Proyecto</h3>
                            
                            <nav>
	                            <ul class="nav header-nav">
	                                <?php 
	                                foreach ($pages as $page_name)
	                                {
	                                	$URL=$_SERVER['REQUEST_URI'];
	                            		$URL=substr($URL,  strpos($URL, '=')+1);	                            		
	                            		
	                                	$pageTitle=substr($page_name, 0, strpos($page_name, '.'));
	                                	
	                                	if ($pageTitle==$URL)
	                                	{
	                                		if ($pageTitle==1)
	                                		{
	                                			echo '<li class=active>'.$titles[(int)$pageTitle].'</li>';
	                                		}
	                                		else if($pageTitle==2)
	                                		{
	                                			echo '<li class=active>'.$titles[(int)$pageTitle].'</li>';
	                                		}
	                                		else if($pageTitle==3)
	                                		{
	                                			echo '<li class=active>'.$titles[(int)$pageTitle].'</li>';
	                                		}
	                                		else
	                                		{
	                                			echo '<li class=active>'.$titles[(int)$pageTitle].'</li>';
	                                		}
	                                	}
	        							else
	        							{
	        							if ($pageTitle==1)
	                                		{
	                                			echo '<li>'.$titles[(int)$pageTitle].'</li>';
	                                		}
	                                		else if($pageTitle==2)
	                                		{
	                                			echo '<li>'.$titles[(int)$pageTitle].'</li>';
	                                		}
	                                		else if($pageTitle==3)
	                                		{
	                                			echo '<li>'.$titles[(int)$pageTitle].'</li>';
	                                		}
	                                		else
	                                		{
	                                			echo '<li>'.$titles[(int)$pageTitle].'</li>';
	                                		}
	        							}
	                                }
	                                ?>
	                                </ul>
                            </nav>
                            
                        </div>
                    </div>
                    
                    <div class="inner theme">
                        <?php
                        	include($include_file);
                        ?>
                    </div>
                    
                    <div class="foot">
                        <div class="inner">
                            <p>PFG - Creación de un sistema de BBDD que permita la creación de un plan para ver películas en emisión en salas de cine, por <a href="https://twitter.com/ireneladler">María Maestre</a>.</p>
                            <div id="license"></div><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
        <!-- Librería jQuery -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        <!--  No right click 
        <script type="text/javascript" language="Javascript">
		document.oncontextmenu = function(){return false}
		</script> -->
    </body>    
</html>
