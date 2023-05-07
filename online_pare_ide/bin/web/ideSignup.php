<?php

/*************************************************************************************************
 * ideSignup.php
 *
 * Content page to display a signup page. This page is expected to be contained
 * within index.php.
 * 
 * This content page will receive information and then send it to the signup.php
 * The signup.php will then validate the information with what is in the database
 *************************************************************************************************/

?>

<h2>Sign up</h2>

<form action="signup.php" method="POST">
    <div class="mb-3">
        <label for="userEmail" class="form-label">Email</label>
        <input type="email" class="form-control" name="userEmail">
    </div>

    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" name="firstName">
    </div>

    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastName">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
    <a href="index.php?content=list" class="btn btn-secondary" role="button">Cancel</a>
</form>






































