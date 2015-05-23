<?php
	$uri = "http://php.net/manual/en/reserved.variables.server.php";
    $parts = parse_url($uri);
    echo "path: " . $parts["path"] . "\n";
    $context = substr($parts["path"], 0, strrpos($parts["path"], "/"));
    echo "context: " . $context . "\n";
?>