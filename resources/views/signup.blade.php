<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('css/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap-5.0.2/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- Twillio --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/css/intlTelInput.css">
    <title>Registration Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .btn-primary {
            background-color: #0A3C98;
            border-color: #0A3C98;
        }

        .btn-primary:hover {
            background-color: #0EC2EE;
            border-color: #0EC2EE;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Register</h2>

            <!-- Validation Errors Placeholder -->
            <div class="alert alert-danger d-none" id="errorMessages"></div>

            <!-- Registration Form -->
            <form method="POST" action="javascript:void(0)" id="signup-form">
                @csrf
                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Your Email">
                </div>

                <div class="form-group mb-3">
                    <select id="country-dd" class="form-control" name="country">
                        <option value="">Select Your Country</option>
                        @foreach ($countries as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <select id="state-dd" class="form-control" name="state">
                        <option value="">Select Your State</option>
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <select id="city-dd" class="form-control" name="city">
                        <option value="">Select Your City</option>
                    </select>
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" id="phone" class="form-control" name="phone_number">
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Confirm Password">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <!-- Already Registered Link -->
                <div class="mt-5 text-center">
                    <a href="/signin" class="text-decoration-none">Already registered? Sign in</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Twillio Script --}}
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        $('#signup-form').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: '/register',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    // window.location.href = '/signin';
                },
            });
        });


        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/utils.js",
        });

        // Form submission logic
        const form = document.querySelector("form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();

            // Get the full phone number in international format
            const phoneNumber = iti.getNumber();

            // Get the country data (including country code)
            const countryData = iti.getSelectedCountryData();
            const countryCode = countryData.iso2; // Example: 'us' for United States
            const countryDialCode = countryData.dialCode; // Example: '1' for United States

            // You can append this data to a hidden input field or send it to your server
            console.log("Phone Number: ", phoneNumber);
            console.log("Country Code: ", countryCode);
            console.log("Dial Code: ", countryDialCode);

            // For example, appending these to hidden fields before form submission
            const countryField = document.createElement('input');
            countryField.setAttribute('type', 'hidden');
            countryField.setAttribute('name', 'country_code');
            countryField.setAttribute('value', countryCode);

            const dialCodeField = document.createElement('input');
            dialCodeField.setAttribute('type', 'hidden');
            dialCodeField.setAttribute('name', 'dial_code');
            dialCodeField.setAttribute('value', countryDialCode);

            form.appendChild(countryField);
            form.appendChild(dialCodeField);

            // Optionally add phoneNumber to hidden field or directly use it as value
            const phoneField = document.createElement('input');
            phoneField.setAttribute('type', 'hidden');
            phoneField.setAttribute('name', 'phone_number');
            phoneField.setAttribute('value', phoneNumber);

            form.appendChild(phoneField);

            form.submit();
        });

        $('#country-dd').change(function(event) {
            var idCountry = this.value;
            $('#state-dd').html('');
            $.ajax({
                url: 'api/fetch-state',
                type: 'POST',
                dataType: 'json',
                data: {
                    country_id: idCountry,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#state-dd').html('<option value="">Select Your State</option>');
                    $.each(response.states, function(index, val) {
                        $('#state-dd').append('<option value="' + val.id + '"> ' +
                            val.name + ' </option>')
                    });
                    $('#city-dd').html('<option value="">Select Your City</option>');
                }
            })
        });

        $('#state-dd').change(function(event) {
            var idState = this.value;
            $('#city-dd').html('');
            $.ajax({
                url: 'api/fetch-cities',
                type: 'POST',
                dataType: 'json',
                data: {
                    state_id: idState,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#city-dd').html('<option value="">Select Your State</option>');
                    $.each(response.cities, function(index, val) {
                        $('#city-dd').append('<option value="' + val.id + '"> ' +
                            val.name + ' </option>')
                    });
                }
            })
        });
    </script>

</body>

</html>
