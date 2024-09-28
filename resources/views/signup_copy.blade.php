<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/signup-style.css">
</head>

<body>
    <div class="container">
        <div class="title">Signup</div>
        <div class="content">
            <form id="signup-form" action="javascript:void(0)">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" name="name">
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" name="username">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="number" placeholder="Enter your number" name="phone_number">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your password" name="password">
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" value="male" id="dot-1">
                    <input type="radio" name="gender" value="female" id="dot-2">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input class="btn btn-info" type="submit" value="Signup">
                </div>
                <div class="my-5 fw-bold" style="text-align: center">
                    <a class="text-decoration-none" href="{{ url('signin') }}">
                        Already Have An Account? Sign In 
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#signup-form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: 'signupUser',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        window.location.href = '/signin';
                    },
                });
            });
        });
    </script>

</body>

</html>