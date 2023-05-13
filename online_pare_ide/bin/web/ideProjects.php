<?php

/*************************************************************************************************
 * ideProjects.php
 *
 * Content in this page will include a form with an input box to enter code This page is expected to be
 * contained within index.php.
 *************************************************************************************************/



?>

<form action="openProject.php" method="POST">
    <div class="mb-3">
        <label for="projectId" class="form-label">Projects</label>
        <select name="projectId" class="form-select" size="10">
        <?php
        session_start();
        $id = $_SESSION["usrId"];
        $sql = <<<SQL
        SELECT prj_id, prj_name
        FROM projects
        WHERE prj_usr_id = $id
        SQL;

        $conn = get_database_connection();
        $result = $conn->query($sql);
        
        while ($row = $result->fetch_assoc())
        {   
            echo '<option value="' . $row['prj_id'] . '"' . $select . '>' . $row['prj_name'] . '</option>';
        }
        $conn->close();
        
        ?>
        </select>



    </div>

    <div class="mb-3">
        <label for="newProjectName" class="form-label">New Project</label>
        <input name="newProjectName" class="form-control" type="text">
    </div>

    <button type="submit" class="btn btn-primary">Go</button>

    


</form>