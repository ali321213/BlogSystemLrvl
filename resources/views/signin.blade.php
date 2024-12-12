<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>SignIn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .text-danger {
            font-size: 0.875em;
            margin-top: 0.25rem;
        }

        .btn:disabled {
            background-color: grey;
            border-color: grey;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 formDiv">
                <img class="d-flex justify-content-center text-center mb-5" style="height: 200px;width:200px;" src="{{ asset('images/dropifyTech.png') }}">
                <form id="signin-form"> @csrf
                    <div class="form-group">
                        <label class="fw-bold">Enter Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email">
                        <div class="text-danger text-capitalize"></div>
                    </div>
                    <div class="form-group my-4">
                        <label class="fw-bold">Enter Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        <div class="text-danger text-capitalize"></div>
                    </div>
                    <div class="my-4">
                        <button type="submit" class="btn btn-primary fw-bold w-100" id="submitBtn" disabled>Sign In</button>
                    </div>
                </form>
                <div class="my-5 text-center">
                    <a class="text-decoration-none fw-bold text-dark" style="border-bottom: 2px solid black"
                        href="{{ url('signup') }}">
                        Create Your Account
                    </a>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>


    <script>
        const submitBtn = document.getElementById("submitBtn");
        const email = document.querySelector("[name='email']");
        const password = document.querySelector("[name='password']");

        // Validate form inputs before enabling submit button
        function validateForm() {
            let isValid = true;

            if (!email.value.trim() || !email.checkValidity()) {
                isValid = false;
            }

            if (!password.value.trim()) {
                isValid = false;
            }

            submitBtn.disabled = !isValid;
        }

        email.addEventListener('input', validateForm);
        password.addEventListener('input', validateForm);

        $('#signin-form').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            // Clear any previous errors
            $('#emailError').text('');
            $('#passwordError').text('');

            $.ajax({
                url: 'signinUser',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    Swal.fire({
                        title: 'Signin Successful!',
                        text: 'Redirecting to home page...',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/home';
                        }
                    });
                },
                error: function(err) {
                    let errors = err.responseJSON.errors;
                    if (errors.email) {
                        $('#emailError').text(errors.email[0]);
                    }

                    if (errors.password) {
                        $('#passwordError').text(errors.password[0]);
                    }
                }
            });
        });
    </script>
</body>

</html>