<?php
	//Used to connect the hosted sql database to php

	$server = getenv("sqlServername");
	$dbUser = getenv("sqlUser");
	$dbpwd = getenv("sqlPw");
	$dbname = "sql5660472"; 

	$conn = mysqli_connect($server, $dbUser, $dbpwd, $dbname);

	if(!$conn) {
		die("Connection Failed: ". mysqli_connect_error());
	}
