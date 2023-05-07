<?php

/*************************************************************************************************
 * library.php
 *
 * Common environment settings and functions used througout the Hanover DPW Park application.
 *************************************************************************************************/

extract($_REQUEST); 
//this will automatically create a variable from whatever was created in the url
// ex.) permitForm.php? updatedFac=1 & updatedFacStatus=true


/*
 * Returns the content to be included based on the 'content' request parameter, if present.
 */
function get_content()
{
    global $content;

    if (!isset($content))
    {
        $content = 'list'; //This is the default website 
    }

    $content = 'ide' . ucfirst(strtolower($content));

    return $content;
}


/*
 * Returns a connection to the underlying MySQL database.
 */
function get_database_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "online_pare_ide";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}