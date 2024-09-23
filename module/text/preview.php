<?php 
	$text_file = $args;

    //var_dump($text_file);

    if(file_exists("./content/".$text_file)) {
        $content = file_get_contents("./content/".$text_file);
    } else {
        $content = "404 - Text File Not Found.";
    }

