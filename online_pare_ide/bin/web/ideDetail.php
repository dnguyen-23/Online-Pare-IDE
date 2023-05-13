<?php

/*************************************************************************************************
 * permitDetail.php
 *
 * Content page to display the detail form for a single application. This page is expected to be
 * contained within index.php.
 *************************************************************************************************/

$usrID = '';
$firstName = '';
$lastName = '';
$email = '';
if (!isset($projects)) {
    $projects[] = array();
}

$conn = get_database_connection();

if (isset($id))
{
    // Step 1: Load the customer and application records
    $sql = <<<SQL
    SELECT *
      FROM users
     WHERE usr_id = $id
    SQL;

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $usrID = $row['usr_id'];
    $firstName = $row['usr_first_name'];
    $lastName = $row['usr_last_name'];
    $email = $row['usr_email'];
    

    // Step 2: Load the projects records
    
    $sql = <<<SQL
    SELECT prj_id, prj_name
      FROM projects
      WHERE prj_usr_id = $id
      ORDER BY prj_name, prj_id
    SQL;

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while ($row = $result->fetch_assoc())
    {
        $projects[] = $row['prj_id'];
    }
    
}

?>

<script>
    function deleteApplication(id) {
        if (confirm('Are you sure you want to delete this application?')) {
            location.href = 'delete.php?id=' + id;
        }
    }
</script>

<!-- Loading the form with the values of the person selected -->
<form action="save.php" method="POST">
    <input type="hidden" name="usrId" value="<?php echo $usrId; ?>" />
    <div class="mb-3">
        <label for="firstName" class="form-label">First name</label>
        <input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>">
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last name</label>
        <input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="mb-3">
        <label for="projects[]" class="form-label">Fields (hold CTRL or CMD to select multiple)</label>
        <select name="projects[]" class="form-select" multiple="true" size="10">
<?php


// Displaying the drop down menu for projects to select
$sql = <<<SQL
SELECT prj_name, prj_code
  FROM projects
 WHERE prj_usr_id = $id
 ORDER BY prj_name
SQL;

$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
{
    $select = in_array($row['prj_id'], $projects) ? ' selected="true" ' : '';
    
    echo '<option value="' . $row['prj_id'] . '"' . $select . '>' . $row['prj_name'] . '</option>';
}

$conn->close();

?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
<?php

if (isset($id))
{
    
    echo '<a href="javascript:deleteApplication(' . $id . ')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>';
}

?>
    <a href="index.php?content=list" class="btn btn-secondary" role="button">Cancel</a>
</form>