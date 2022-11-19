
let submitButton = document.querySelector('.btn-action');
let error = document.querySelector('.error-message');

//functions submit listener
submitButton.addEventListener('click', function (e) {
    e.preventDefault();
    let name = $("#username").val();
    let email = $('#email').val();
    let pwd = $('#password').val();
    let cpassword = $('#cpassword').val();
    let mobile = $('#mobile').val();
    if (pwd != cpassword)
        alert('password does not match with confirm password');
    else {
        $.ajax({
            url: "/GUVI/php/register.php",
            type: "POST",
            data: {
                name: name,
                email: email,
                pwd: password,
                mobile: mobile,
            },
            async: true,
            success: function (response) {
                if (response) {
                    error.textContent = response;

                }
                else {
                    error.textContent = response;

                }
            }
        });


    }
});