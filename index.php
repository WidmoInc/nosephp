<!doctype html>
<html lang="en">
	<head>
		<title id="title">loading...</title>
		<script src="jquery.js"></script>
		<script src="init.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon"
      type="image/png"
      href="content/default/BP-logo-16px.png">
		<style>
			body{
				background: #1a1813;
				color: #bca43a;
				text-align: center;
				margin-top: 2em;
			}

			.BPloading {
	    animation: hue-rotate 1s infinite;
			}

			@keyframes hue-rotate {
			    0% { filter:hue-rotate(0deg);}
					12% {filter:hue-rotate(45deg); }
					25% { filter:hue-rotate(90deg);}
					37% {filter:hue-rotate(135deg); }
			    50% { filter:hue-rotate(180deg);}
					62% { filter:hue-rotate(225deg);}
					75% { filter:hue-rotate(270deg);}
					87% { filter: hue-rotate(315deg);}
			    100% { filter:hue-rotate(360deg);}
				}

		</style>
	</head>

	<body>
	<?php
	$content = "PHP Generated Preview Goes Here...";
	
	$json = file_get_contents("./local_config.json");
	//var_dump($json);
	$config = json_decode($json);
	//var_dump($config);
	$page = $_GET['p'];

	if(is_null($page)) {
		$page = $config->firstpage->type.'/'.implode("/",$config->firstpage->args);
	}
	//var_dump($page);
	$module = strtok($page, '/');
	//var_dump($module);
	$args = substr($page, strpos($page, "/") + 1);
	//var_dump($args);

	require_once(__DIR__.'/module/'.$module.'/preview.php');
?>

		<?=$content?>
	</body>
</html>