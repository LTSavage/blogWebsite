<?php
    //Kieran Molloy, 2018
	session_start();
    define ('ROOT_PATH', realpath(dirname(__FILE__)));

    //1. Select whichever connection method is required
    //2. Comment out the other connection method
    //3. This file should not change, upload to server once.

	// ---------------------------------------
    // 1&1 MySQL Server Connection 
    // DOES NOT ACCEPT OUTSIDE CONNECTIONS
    // 
    // ---------------------------------------

    /*
	$host_name = 'db740672129.db.1and1.com';
    $database = 'db740672129';
    $user_name = 'dbo740672129';
    $password = 'Testing1_';
    define('BASE_URL', 'http://blog.kieranmolloy.me');
    */
    

    //---------------------------------------
    // LocalHost MySQL Server (TESTING)
    // ONLY FOR TESTING PURPOSES
    // DO NOT TRANSFER THIS FILE
    //
    //---------------------------------------
    
    
    $host_name = 'localhost';
    $database = 'complete_blog_php';
    $user_name = 'root';
    $password = '';
    define('BASE_URL', 'http://localhost/blogWebsite/');
    

    //Connection to MySQL Database, Ensure correct details are input
    $conn = mysqli_connect($host_name, $user_name, $password, $database);
        
	   if (!$conn) {
           die("Error connecting to database: " . mysqli_connect_error());
	   }

?>