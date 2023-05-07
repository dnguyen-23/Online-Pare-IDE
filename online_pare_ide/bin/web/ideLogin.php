<?php

/*************************************************************************************************
 * ideLogin.php
 *
 * Content page to display a login page. This page is expected to be contained
 * within index.php.
 * 
 * This content page will receive information and then send it to the login.php
 * The login.php will then validate the information with what is in the database
 *************************************************************************************************/

?>

<h2>Login</h2>

<form action="login.php" method="POST">
    <div class="mb-3">
        <label for="userEmail" class="form-label">Email</label>
        <input type="email" class="form-control" name="userEmail">
    </div>


    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="index.php?content=list" class="btn btn-secondary" role="button">Cancel</a>
</form>






































