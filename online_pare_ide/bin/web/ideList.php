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
    -- SELECT app_id, app_date, cus_first_name, cus_last_name, cus_phone, cus_email,
    --        GROUP_CONCAT(CONCAT(par_name, ' - ', pka_name) ORDER BY par_name, pka_name SEPARATOR '<br>') as field_list
    --   FROM applications
    --              JOIN customers              ON cus_id = app_cus_id
    --   LEFT OUTER JOIN application_park_areas ON apa_app_id = app_id
    --   LEFT OUTER JOIN park_areas             ON apa_pka_id = pka_id
    --   LEFT OUTER JOIN parks                  ON pka_par_id = par_id
    --  GROUP BY 1, 2, 3, 4, 5, 6
    --  ORDER BY app_date, cus_last_name, cus_first_name, app_id

    SELECT usr_first_name, usr_last_name, usr_email, usr_password, 
        GROUP_CONCAT(prj_name ORDER BY prj_name SEPARATOR '<br>') as project_list
    FROM users
    JOIN projects ON usr_id = prj_usr_id
    ORDER BY usr_first_name, prj_name
    GROUP BY usr_email
    SQL;

    // Execute the query and save the results
    $result = $conn->query($sql);

    $empty = true;

    // Iterate over each row in the results
    while ($row = $result->fetch_assoc())
    {
        echo '<tr class="align-middle" style="cursor:pointer" onclick="editUser(' . $row['app_id'] . ')">';
        echo '<td>' . $row['usr_id'] . '</td>';
        echo '<td>' . $row['usr_last_name'] . ', ' . $row['usr_first_name'] . '</td>';
        echo '<td><a href="mailto:'. $row['cus_email'] . '">' . $row['cus_email'] . '</a></td>';
        echo '<td>' . $row['usr_password'] . '</td>';
        echo '<td>' . $row['prj_list'] . '</td>';
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