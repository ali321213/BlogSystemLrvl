<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>SignUp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 50px 40px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .btn:disabled {
            background-color: grey;
            border-color: grey;
            cursor: not-allowed;
        }

        .text-danger {
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 form-container">
            <img class="d-flex justify-content-center text-center mb-5" style="height: 200px;width:200px;" src="{{ asset('images/dropifyTech.png') }}">
                <form id="registrationForm">
                    @csrf
                    <div class="mb-3">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                    </div>

                    <p class="fs-6 fw-bold m-0">Gender:</p>
                    <div class="d-flex mb-3" style="gap: 20px;">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Male" id="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Female" id="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="tel" id="phone_number" name="phone_number" class="form-control"
                            placeholder="Phone Number">
                    </div>

                    <div class="mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary fw-bold w-100" id="submitBtn" disabled>
                        Sign Up
                    </button>

                    <div class="mt-5 text-center">
                        <a href="/signin" class="text-decoration-none fw-bold text-dark"
                            style="border-bottom: 2px solid black">Already registered? Sign in</a>
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            // Enable the submit button when all fields are filled
            $('#registrationForm input').on('input', function () {
                const allFilled = $('#registrationForm input').toArray().every(input => $(input).val().trim() !== '');
                $('#submitBtn').prop('disabled', !allFilled);
            });

            // Submit the form
            $('#registrationForm').on('submit', function (e) {
                e.preventDefault();
                const formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    gender: $('input[name="gender"]:checked').val(),
                    phone_number: $('#phone_number').val(),
                    password: $('#password').val(),
                    _token: $('input[name="_token"]').val()
                };

                $.ajax({
                    url: '/signupUser',
                    type: 'POST',
                    data: formData,
                    success: function () {
                        Swal.fire({
                            title: "Registration Successful!",
                            text: "You have been successfully registered.",
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then(() => {
                            window.location.href = '/signin';
                        });
                    },
                    error: function (xhr) {
                        $('.text-danger').remove();
                        $('.form-control').removeClass('is-invalid');
                        if (xhr.status === 422) {
                            $.each(xhr.responseJSON.errors, function (field, messages) {
                                const input = $('[name="' + field + '"]');
                                input.addClass('is-invalid');
                                input.after('<div class="text-danger">' + messages[0] + '</div>');
                            });
                        } else {
                            Swal.fire("Error", "Something went wrong during registration.", "error");
                        }
                    },
                });
            });
        });
    </script>
</body>

</html>
