<?php

/*************************************************************************************************
 * ideList.php
 *
 * Content page to display a list of users. This page is expected to be contained within
 * index.php.
 *************************************************************************************************/

?>

<script>
    function editUser(id) {
        location.href = 'index.php?content=detail&id=' + id;
    }
</script>

<table class='table table-bordered table-hover'>
    <thead>
        <tr class="table-dark">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Projects</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">

    <?php

    $conn = get_database_connection();

    // Build the SELECT statement
    $sql = <<<SQL
        SELECT usr_id, usr_first_name, usr_last_name, usr_email, usr_password,
            GROUP_CONCAT(prj_name ORDER BY prj_name SEPARATOR '<br>') as project_list
        FROM users
        JOIN projects ON usr_id = prj_usr_id
        GROUP BY usr_id
        ORDER BY usr_first_name

    
    SQL;

    // Execute the query and save the results
    $result = $conn->query($sql);

    $empty = true;

    // Iterate over each row in the results
    while ($row = $result->fetch_assoc())
    {
        echo '<tr class="align-middle" style="cursor:pointer" onclick="editUser(' . $row['usr_id'] . ')">';
        echo '<td>' . $row['usr_first_name'] . '</td>';
        echo '<td>' . $row['usr_last_name'] . '</td>';
        echo '<td><a href="mailto:'. $row['usr_email'] . '">' . $row['usr_email'] . '</a></td>';
        echo '<td>' . $row['usr_password'] . '</td>';
        echo '<td>' . $row['project_list'] . '</td>';
        echo '</tr>';

        $empty = false;
    }

    if ($empty)
    {
        echo '<tr><td class="text-center" colspan="7"><em>No Records</em></td></tr>';
    }

    ?>

    </tbody>
</table>

<a href='index.php?content=login' class='btn btn-primary' role='button'><i class='fa fa-plus-circle' aria-hidden='true'></i>&nbsp;Add an application</a>