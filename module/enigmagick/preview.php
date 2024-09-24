<?php 
	$args = explode('/', $args);

    $content = "<h1>EnigMagick</h1>";
    if(count($args) < 3) {
        $content .= "<p>Search for matches on values or phrases in various texts</p>.";
    } else {
        $search=$args[0];
        $cipher=$args[1];
        $text=$args[2];

        if(function_exists('curl_version')) {
            $ch = curl_init();
            $api_url = $config->data_sources->enigmagick[1];
            $api_url .= "matches.php?search=".$search."&cipher=".$cipher."&text=".$text.".txt";

            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            if(curl_errno($ch)) {
                $content .= "<div><p>EnigMagick Error: curl error:</p> " . curl_error($ch)."</div>";
            } else {
                // Process the response data (e.g., JSON decode)
                $data = json_decode($response, true);

                // Use the data here
                $content .= "<h2>".$search."=".$data["value"]."</h2>";

                if(count($data["matches"]) > 0) {
                    $content .= "<ol>";
                    foreach($data["matches"] as $match) {
                        $content .= "<li>".$match."</li>";
                    }
                    $content .= "</ol>";
                } else {
                    $content .= "<p>No matches found.</p>";
                }
            }

            curl_close($ch);
        } else {
            $content .= "<div><p>EnigMagick Error: curl not enabled.</p></div>";
        }
    }

    
    

