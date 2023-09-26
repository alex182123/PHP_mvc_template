<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/vendor/bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Project Manager</title>
</head>

<body>
    <main>
        <section id="sct-login">
            <div class="login-container text-center">
                <div class="mb-5">
                    <h1 id="title" class="mb-5">Project Manager</h1>
                    <h2 id="subtitle" class="mb-5">Login</h2>
                </div>
                <div class="mb-5">
                    <form method="POST">
                        <div class="label-input-group">
                            <label for="txt-username"><i class="fa-solid fa-user"></i> Username</label>
                            <input type="text" id="txt-username" name="txt-username">
                        </div>
                        <div class="label-input-group">
                            <label for="txt-password"><i class="fa-solid fa-lock"></i> Password</label>
                            <input type="password" id="txt-password" name="txt-password">
                            <span>
                                <p id="character-limit">Character limit: 10</p>
                            </span>
                            <a href="javascript: void(0);" onclick="showPassword('txt-password')" id="show-password">Show password</a>
                        </div>
                        <div class="mb-5" id="div-button">
                            <button type="button" name="signin" id="signin" class="btn btn-primary">Sign in</button>
                        </div>
                        <div class="mb-5" id="div-switch">
                            <span id="icon-span"><i class="fa-solid fa-user-plus"></i></span>
                            <button type="button" class="btn-link" id="switch">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer class="text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3">
            <p class="text-white" id="copyright"></p>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="assets/vendor/jquery/jquery-3.7.0.min.js"></script>
    <script src="assets/vendor/bootstrap-5.3.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/sweetalert2-11.7.3/package/dist/sweetalert2.all.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>