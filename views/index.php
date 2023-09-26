<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include('../includes/head.php'); ?>
    <link rel="stylesheet" href="../assets/css/views.index.css">
    <title>Main</title>
</head>

<body>
    <!-- <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div> -->
    <main class="content">
        <nav class="nav-custom navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid mx-5">
                <h1 class="navbar-brand">Project Manager</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <div class="d-flex">
                        <button class="btn-link" id="signout">Log out<i class="fa-solid fa-right-from-bracket mx-2"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </main>
    <?php include('../includes/scripts.php'); ?>
    <script src="../assets/js/views.index.js"></script>
</body>

</html>