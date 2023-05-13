<?php
/*************************************************************************************************
 * ideCode.php
 *
 * Content in this page will include a form with an input box to enter code This page is expected to be
 * contained within index.php.
 *************************************************************************************************/
?>

<!-- Get existing code -->
<?php
    $pId = $_SESSION["prjId"];
    $sql = <<<SQL
        SELECT prj_code
        FROM projects
        WHERE prj_id = $pId
    SQL;

    $conn = get_database_connection();
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<form action="saveProject.php" method="POST">
    <div class="mb-3">
        <label for="projectCode" class="form-label">Code</label>
        <input name="projectCode" class="form-control" type="text" value=<?php echo $row['prj_code']?>>
    </div>
    <button type="submit">Save</button>
</form>
