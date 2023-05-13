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
$conn = get_database_connection();
$projectCode = $conn->real_escape_string($projectCode);
$uId = $_SESSION["usrId"];
$pId = $_SESSION["prjId"];

$sql = <<<SQL
UPDATE projects
SET prj_code = '$projectCode'
WHERE prj_usr_id = $uId AND prj_id = $pId

SQL;

if (!$conn->query($sql))
{
    die('Error updating customer record: ' . $conn->error);
}

?>


