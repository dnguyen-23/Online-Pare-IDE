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
    session_start();
    $pId = $_SESSION['prjId'];
    $sql = <<<SQL
        SELECT prj_name, prj_code
        FROM projects
        WHERE prj_id = $pId
    SQL;
    
    $conn = get_database_connection();
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    
?>

<form action="saveProject.php" method="POST">
    <div class="mb-3">
        <label for="projectCode" class="form-label">Currently working on: <?php echo $row['prj_name']; ?></label>
        <textarea name="projectCode" class="form-control" rows="4" cols="50" ><?php echo $row['prj_code'];?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
