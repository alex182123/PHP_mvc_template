function Login() {
    var username = $("#txt-username").val();
    var password = $("#txt-password").val();

    // Perform AJAX POST request to a server-side script
    $.ajax({
        type: "POST",
        url: "./controllers/loginController.php", // Replace with your server-side script URL
        data: {
            user: username,
            pass: password,
            action: 'login'
        },
        success: function (response) {
            var data = JSON.parse(response)
            console.log(data);
            if (data === "sql" || data === "no valido") {
                showAlertErrorMessage('Username or password incorrect');
            } else {
                showAlertSuccessMessage('Welcome to Project Manager');
                redirect_Page('./views/', 3000);
            }
        },
        error: function (error) {
            // Handle errors if the AJAX request fails
            console.error("AJAX request failed:", error);
        }
    });
}
function Register() {
    var username = $("#txt-username").val();
    var password = $("#txt-password").val();

    // Perform AJAX POST request to a server-side script
    $.ajax({
        type: "POST",
        url: "./controllers/loginController.php", // Replace with your server-side script URL
        data: {
            user: username,
            pass: password,
            action: 'register'
        },
        success: function (response) {
            var data = JSON.parse(response)
            if (data === false) {
                showAlertErrorMessage('The username is already taken');
            } else {
                showAlertSuccessMessage('Welcome to Project Manager');
                redirect_Page('./views/', 3000);
            }
        },
        error: function (error) {
            // Handle errors if the AJAX request fails
            console.error("AJAX request failed:", error);
        }
    });
}
$(document).ready(function () {
    var active_switch = 0;
    $("#signin").click(function () {
        if (active_switch == 0) {
            Login();
        } else {
            Register();
        }
    });
    characterInputLimit('txt-password', 10, 'character-limit');
    $("#switch").click(function () {
        if (active_switch === 0) {
            $('#icon-span').html('<i class="fa-solid fa-right-to-bracket"></i>');
            $('#subtitle').text('Sign up');
            $('#signin').text('Sign up');
            $(this).text('Sign in')
            active_switch = 1;
        } else {
            $('#icon-span').html('<i class="fa-solid fa-user-plus"></i>');
            $('#subtitle').text('Login');
            $('#signin').text('Sign in');
            $(this).text('Sign up')
            active_switch = 0;
        }
    });
});