<?php
/*************************************************************************************************
 * saveProject.php
 * Called from ideCode.php
 * This saves the project that is being worked on
 *
 * expects the following variables:
 * projectCode
 * 
 * 
 * Content in this page will include a form with an input box to enter code This page is expected to be
 * contained within index.php.
 *************************************************************************************************/
include('library.php');

// echo json_encode($projectCode);
// $projectCode = $conn->real_escape_string($projectCode);

$conn = get_database_connection();
session_start();
$uId = $_SESSION["usrId"];
$pId = $_SESSION["prjId"];


$sql = <<<SQL
UPDATE projects
SET prj_code = '$projectCode'
WHERE prj_usr_id = $uId AND prj_id = $pId

SQL;
$conn = get_database_connection();

if (!$conn->query($sql))
{
    die('Error updating customer record: ' . $conn->error);
}

header('Location: index.php?content=code');

?>


