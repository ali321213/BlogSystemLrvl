<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up</title>
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="icon" href="{{ asset('images/favicon.png') }}">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="{{ asset('images/favicon.png') }}">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="javascript:void(0)" id="signup-form" method="POST">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="name" placeholder="Name">
                </div>
                <!-- Country Dropdown -->
                <div class="form-group">
                  <select id="country-dd" name="country" class="form-control form-control-lg">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                  </select>
                </div>
                <!-- State Dropdown -->
                <div class="form-group">
                  <select id="state-dd" name="state" class="form-control form-control-lg">
                    <option value="">Select State</option>
                  </select>
                </div>
                <!-- City Dropdown -->
                <div class="form-group">
                  <select id="city-dd" name="city" class="form-control form-control-lg">
                    <option value="">Select City</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-lg" name="phone-number" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <a class="btn btn-lg text-light" type="submit" style="background-color:#f85606;" href="{{ route('signup') }}">SIGN UP</a>
                </div>
                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('signin') }}" class="text-primary text-decoration-none">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/misc.js') }}"></script>

  <script>
    // AJAX to fetch states based on selected country
    $('#country-dd').change(function() {
      var countryId = this.value;
      $('#state-dd').html('<option value="">Select State</option>');
      $.ajax({
        url: '{{ url("api/fetch-state") }}',
        type: 'POST',
        dataType: 'json',
        data: {
          country_id: countryId,
          _token: "{{ csrf_token() }}"
        },
        success: function(response) {
          $.each(response.states, function(index, val) {
            $('#state-dd').append('<option value="' + val.id + '">' + val.name + '</option>');
          });
          $('#city-dd').html('<option value="">Select City</option>');
        }
      });
    });

    // AJAX to fetch cities based on selected state
    $('#state-dd').change(function() {
      var stateId = this.value;
      $('#city-dd').html('<option value="">Select City</option>');
      $.ajax({
        url: '{{ url("api/fetch-city") }}',
        type: 'POST',
        dataType: 'json',
        data: {
          state_id: stateId,
          _token: "{{ csrf_token() }}"
        },
        success: function(response) {
          $.each(response.cities, function(index, val) {
            $('#city-dd').append('<option value="' + val.id + '">' + val.name + '</option>');
          });
        }
      });
    });
  </script>
</body>
</html>