<?php

/*************************************************************************************************
 * login.php
 *
 * Page to login. This page expects the following request paramaters to
 * be set:
 *
 * - userEmail
 * - password
 *************************************************************************************************/

include('library.php');

extract($_REQUEST);
// This php file is only executed after a form/information was posted from ideLogin.php
// $_REQUEST holds the variables created from the created inputs within the form in ideLogin.php


$conn = get_database_connection();

// Sanitize all input values to prevent SQL injection exploits
$userEmail = $conn->real_escape_string($userEmail);
$password = $conn->real_escape_string($password);

// Query information
$sql = <<<SQL
    SELECT usr_email, usr_password
    FROM users
    WHERE usr_email = $userEmail
SQL;

// Execute the query and redirect to the list
if ($conn->query($sql) == TRUE)
{
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {
        header('Location: index.php?content=projects');
    }
    
}
else
{
    echo "Error searching for user: " . $conn->error;
}

$conn->close();