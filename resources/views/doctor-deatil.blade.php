<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#datepicker").datepicker();
    });
    </script>




    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,hi,bn,mai,mr,sa,ta,te,kn,pa,layout: google.translate.TranslateElement.InlineLayout.SIMPLE'
        }, 'google_translate_element');

    }
    </script>
    <link rel="icon" href="img/favicon.png" type="image/icon type">

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <link rel="stylesheet" href="{{ asset('css/homdeo.css') }}">
    <script src="{{ asset('js/float-panel.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/float-panel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
    <script src="https://kit.fontawesome.com/bbed85d1ee.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>





    <title>InstaHomeo</title>

    <style>
    .btnDctrlogin {
        font-weight: 400;
        font-size: 16px;
        padding: 12px 25px;
        text-align: center;
        color: rgb(255, 255, 255);
        font-family: Poppins;
        line-height: 1.4;
        border-color: rgba(95, 141, 39, 0.9);
        border-style: solid;
        border-width: 2px;
        border-radius: 30px;
        letter-spacing: 0px;
        background-color: rgba(95, 141, 39, 0.9);
        text-decoration: none;
    }

    #dctrsform {
        background: aliceblue;
    }
    </style>

</head>

<body id="dctrsform">

<script>
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>




    <div class="container border  ">

        <div class="row">
            <div class="col-12 mt-5">
                <a class="btnDctrlogin" href="{{ url('doctor-login') }}">Doctor Login</a>
            </div>

            <div class="col-12 mt-5">
                <div class="panel panel-success">


                    <div class="panel-body">
                        <form id="registrationForm" action="{{ url('doctor-details') }}" method="POST">
                            @csrf
                            <div class="row ">
                                <div class="col-md-12 p-0 mb-3">
                                    <div class="panel-heading  text-center  p-3">Doctor Form</div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="control-label"> Name:*</label>
                                        <input type="text" class="form-control" name="name" id="name" required
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email:*</label>
                                        <input type="text" class="form-control" name="email" id="email" required
                                            placeholder="enter email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="control-label">Phone Number:*</label>
                                        <input type="tel" class="form-control" name="phone" id="number" required
                                            placeholder="1234567890">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Specialist</label>
                                        <input type="text" class="form-control" name="specialist" id="specialist"
                                            required placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Password:</label>
                                        <input type="password" class="form-control " name="password" id="password"
                                            required placeholder="Enter password">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password:</label>
                                        <input type="password" class="form-control" name="confirmPassword"
                                            id="confirmPassword" required placeholder="enter conform password">
                                    </div>
                                </div>
                            </div>






                            <div class="text-center">
                                <input type="submit" class="btn   mt-4 mb-4" value="Submit">
                            </div>
                        </form>



                        <script>
                        // JavaScript code for password validation
                        const registrationForm = document.getElementById('registrationForm');
                        const password = document.getElementById('password');
                        const confirmPassword = document.getElementById('confirmPassword');

                        registrationForm.addEventListener('submit', function(e) {
                            if (password.value !== confirmPassword.value) {
                                alert("Passwords do not match. Please try again.");
                                e.preventDefault(); // Prevent form submission
                            }
                        });
                        </script>



                    </div>
                </div>
            </div>
        </div>

    </div>







</body>

</html>