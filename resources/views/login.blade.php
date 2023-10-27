<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>




    <script type="text/javascript">

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'en,hi,bn,mai,mr,sa,ta,te,kn,pa,layout: google.translate.TranslateElement.InlineLayout.SIMPLE' }, 'google_translate_element');

        }

    </script>
    <link rel="icon" href="img/favicon.png" type="image/icon type">

    <script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link rel="stylesheet" href="{{ asset('css/homdeo.css') }}">
    <script src="{{ asset('js/float-panel.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/float-panel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
    <script src="https://kit.fontawesome.com/bbed85d1ee.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    




    <title>InstaHomeo</title>

</head>
<body>

<a href="{{ url('register') }}">Register</a>

<div class="container border  ">
            <div class="panel panel-success">
                
                
                <div class="panel-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 p-0 m-0">
                                <div class="panel-heading  text-center mb-4 p-3">Login</div>
                            </div>
                            <div class="col-md-6">
        
                                <div class="form-group">
                                    <label class="control-label"> email:</label>
                                    <input type="text" class="form-control" name="email" id="email" required
                                        placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Password:</label>
                                    <input type="text" class="form-control" name="password" id="password" required
                                        placeholder="enter password">
                                </div>
                            </div>
                        </div>
                    
                       
                        <div class="text-center">
                            <input type="submit" class="btn   mt-4 mb-4" value="Submit">
                        </div>
                    </form>
                    
    
                </div>
            </div>
        </div>

        


        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



    
</body>
</html>