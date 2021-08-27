<?php 
	$params = explode("/", $_SERVER['REQUEST_URI']);
	$rote = explode("?",$params[2]);
	switch($rote[0]){
		case "HomeSite";
			require('HomeSite.php');
			break;
		case "Insert":
			require('Insert.php');
			break;
			case "Search":
				require('Search.php');
			break;
		default;
			require ('404.php');
			break;	
	}
?>