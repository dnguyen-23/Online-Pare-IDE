<?php

/*************************************************************************************************
 * index.php
 *
 * Main page for the Online Pare IDE .
 *
 * This page will use the optional 'content' request parameter to include a specific page. If the
 * parameter is not specified then the default list page will be included.
 *************************************************************************************************/

include('library.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <title>Online Pare IDE</title>
    </head>

    <body>
        <!-- Navigation -->
        <div>
            <nav class="navbar navbar-expand-lg bg-dark-subtle">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Online Pare IDE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link <?php print($content == 'list' ? 'active' : ''); ?>" href="index.php?content=list">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php print($content == 'login' ? 'active' : ''); ?>" href="index.php?content=login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php print($content == 'signup' ? 'active' : ''); ?>" href="index.php?content=signup">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="container-fluid mt-3">
            <?php include(get_content() . '.php'); ?>
        </div>
    </body>
</html>