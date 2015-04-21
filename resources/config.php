<?php
$config = array(
    "db" => array(
        "dbname" => "phpsandbox",
        "username" => "phpsandbox",
        "password" => "password",
        "host" => "localhost"
    ),
    "paths" => array(
        "resources" => "/path/to/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
        )
    )
);

$mysqli = new mysqli(
	$config["db"]["host"],
	$config["db"]["username"],
	$config["db"]["password"],
	$config["db"]["dbname"]);
	
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));
     
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
 
/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);
 
?>