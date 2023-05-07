<?php

/*************************************************************************************************
 * signup.php
 *
 * Page to signup. This page expects the following request paramaters to
 * be set:
 *
 * - userEmail
 * - firstName
 * - lastName
 * - password
 *************************************************************************************************/

include('library.php');

extract($_REQUEST);
// This php file is only executed after a form/information was posted from ideLogin.php
// $_REQUEST holds the variables created from the created inputs within the form in ideLogin.php


$conn = get_database_connection();

// Sanitize all input values to prevent SQL injection exploits
$userEmail = $conn->real_escape_string($userEmail);
$firstName = $conn->real_escape_string($firstName);
$lastName = $conn->real_escape_string($lastName);
$password = $conn->real_escape_string($password);

// Query information
$sql = <<<SQL
    -- SELECT usr_email, usr_password
    -- FROM users
    -- WHERE usr_email = $userEmail
    INSERT INTO users (usr_email, usr_password, usr_first_name, usr_last_name)
        VALUES ('{$userEmail}', '{$password}', '{$firstName}', '{$lastName}')
SQL;

// Execute the query and redirect to the list
if ($conn->query($sql) == TRUE)
{
    header('Location: index.php?content=list');
}
else
{
    echo "Error inserting record: " . $conn->error;
}

$conn->close();