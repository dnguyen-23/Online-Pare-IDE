<?php

/*************************************************************************************************
 * saveProject.php
 *
 * Page to save a single application. This page expects the following request paramaters to
 * be set:
 *
 * - projectCode
 
 *************************************************************************************************/

include('library.php');

$conn = get_database_connection();

// Sanitize all input values to prevent SQL injection exploits



// Determine if we need to create a new project or edit an existing project
if (is_null($newProjectName)) //means we are creating a new project
{

    // Step 1: Create the `customer` record
    session_start();
    $id = $_SESSION["usrId"];
    $sql = <<<SQL
    INSERT INTO projects (prj_name, prj_usr_id)
        VALUES ('$newProjectName', $id)
    SQL;
    
    if (!$conn->query($sql))
    {
        die('Error inserting customer record: ' . $conn->error);
    }
    
}
else
{
    /*
     * This is an existing project (UPDATE operation)
     */

    session_start();
    $_SESSION['prjId'] = $projectId;
    
}

$conn->close();

header('Location: index.php?content=code');