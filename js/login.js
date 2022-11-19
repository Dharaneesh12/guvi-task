let error = document.querySelector('#login-submit');
$('#login-submit').click(function (e) {
    e.preventDefault();

    let email = $('#email').val();
    let password = $('#password').val();
    // console.log(email);
    $.ajax({
        url: "/guvi/php/login.php",
        type: "POST",
        data: {
            email: email,
            password: password
        },
        async: true,
        success: function (response) {
            if (response) {
                console.log(response);
                location.href = '/guvi/profile.html';
                error.textContent = response;
            }
            else {
                error.textContent = response;

            }
        }
    });
});
