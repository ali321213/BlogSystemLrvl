<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/signup-style.css">
    <style>
        form .signin-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        .content form .signin-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .signin-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }

        form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .signin-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .signin-details .input-box input:focus,
        .signin-details .input-box input:valid {
            border-color: #9b59b6;
        }
    </style>
</head>

<body>
    <div class="alert alert-danger d-none" id="errorMessage"></div>
    <div class="alert alert-success d-none" id="successMessage"></div>
    <div class="container">
        <div class="title">Signin</div>
        <div class="content">
            <form id="signin-form">
                @csrf
                <div class="signin-details">
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your password" name="password">
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="SIGNIN" class="btn text-uppercase">
                    <a style="display: none" class="btn btn-info text-decoration-none text-uppercase" href="{{ url('google-auth') }}">Login
                        with Google</a>
                </div>
                <div class="my-5 fw-bold" style="text-align: center"><a class="text-decoration-none" href="{{ url('signup') }}">Create Your Account</a></div>
        </div>
        </form>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#signin-form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: 'signinUser',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $('#errorMessage').addClass('d-none');
                        $('#successMessage').removeClass('d-none').text(res.success);
                        window.location.href = '/home';
                    },
                    error: function(err) {
                        let errors = err.responseJSON.errors;
                        let errorMessage = '';

                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '<br>';
                        });

                        $('#errorMessage').removeClass('d-none').html(errorMessage);
                    }
                });
            });
        });
    </script>
</body>

</html>
