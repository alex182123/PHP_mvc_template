
function showPassword(input_name) {
    const txtPassword = $('#' + input_name);
    if (txtPassword.prop('type') == "password") {
        txtPassword.prop('type', 'text');
    } else {
        txtPassword.prop('type', 'password');
    }
}
function loadMenu() {
    $.ajax({
        type: "POST",
        url: "../controllers/viewController.php", // Replace with your server-side script URL
        data: {
            action: 'access'
        },
        success: function (access) {
            var access = JSON.parse(access)
            var html = "";
            access.forEach(function callback(data, index) {
                if (index === 0) {
                    html += '<li class="nav-item mx-2"><a class="nav-link active" aria-current="page" href="#"><i class="' + data.pa_icon + '"></i> ' + data.pa_name + '</a></li>'
                } else {
                    html += '<li class="nav-item mx-2"><a class="nav-link" aria-current="page" href="#"><i class="' + data.pa_icon + '"></i> ' + data.pa_name + '</a></li>'
                }
            });
            $('.navbar-nav').html(html);
        },
        error: function (error) {
            // Handle errors if the AJAX request fails
            console.error("AJAX request failed:", error);
        }
    });
}
function showAlertErrorMessage(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: message,
        showConfirmButton: false, // Hide the "OK" button
        timer: 3000 // Auto-close after 3 seconds
    });
}
function redirect_Page(url, ms) {
    var tID = setTimeout(function () {
        window.location.href = url;
        window.clearTimeout(tID);		// clear time out.
    }, ms);
}
function characterInputLimit(input_id, limit, text_limit = "") {
    $("#" + input_id).on("input", function () {
        // Get the input value
        var inputText = $(this).val();

        // Check if the number of letters exceeds 10
        if (inputText.length >= limit + 1) {
            // Truncate the input text to 10 letters
            var truncatedText = inputText.substring(0, limit);
            // Update the input value
            $(this).val(truncatedText);
        }
        if (text_limit !== "") {
            var countCharacters = (limit - inputText.length);
            if (countCharacters < 0) {
                countCharacters = 0;
            }
            $("#" + text_limit).text("Character limit: " + countCharacters);
        }
    });
}
function showAlertSuccessMessage(message) {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: message,
        showConfirmButton: false, // Hide the "OK" button
        timer: 3000 // Auto-close after 3 seconds
    });
}
function SessionManager(action) {
    $.ajax({
        type: "POST",
        url: "../helpers/sessionManager.php", // Replace with your server-side script URL
        data: {
            action: action
        },
        success: function (response) {
            if (response != 1) {
                redirect_Page('../index.php', 0);
            }
        },
        error: function (error) {
            // Handle errors if the AJAX request fails
            console.error("AJAX request failed:", error);
        }
    });
}
function getYearCopyright() {
    const currentYear = new Date().getFullYear();
    const link = '<a target="_blank" href="https://github.com/alex182123?tab=repositories">Alex182123</a>';
    $('#copyright').html(`© Copyright ${currentYear} ${link}`);
}
$(document).ready(function () {
    getYearCopyright();
});