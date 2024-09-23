<?php 
	$md_file = $args;

    if(file_exists("./content/".$md_file)) {
        // To do: Add php markdown parser

        $content = file_get_contents("./content/".$md_file);
    } else {
        $content = "404 - Markdown File Not Found.";
    }

