<?php
	$content = "PHP Generated Preview Goes Here...";
	$title = "Title of the page goes here.";
	
	$json = file_get_contents("./local_config.json");#
	
	$config = json_decode($json);

	$title = $config->sitetitle;

	$page = $_GET['p'];

	if(is_null($page)) {
		$page = $config->firstpage->type.'/'.implode("/",$config->firstpage->args);
	}
	$module = strtok($page, '/');
	$args = substr($page, strpos($page, "/") + 1);
?>
<?php require_once(__DIR__.'/module/'.$module.'/preview.php'); ?>
<!doctype html>
<html lang="en">
	<head>
		<title id="title"><?=$title?></title>
		<script src="jquery.js"></script>
		<script src="init.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="content/default/widmoinc-logo-32px.png" sizes="32x32">
		<link rel="icon" type="image/png" href="content/default/widmoinc-logo-32px.png" sizes="32x32">
		<link rel="icon" type="image/png" href="content/default/widmoinc-logo-32px.png" sizes="32x32">
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
		<?=$content?>
	</body>
</html>
