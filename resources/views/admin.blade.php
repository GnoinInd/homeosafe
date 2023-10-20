<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Snippets</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>

  <meta name="csrf-token" content="{{ csrf_token() }}"> 

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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



 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">



  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <style>


      .fa-stack[data-count]:after {
            position:absolute;
            right:0%;
            top:1%;
            content: attr(data-count);
            font-size: 30%;
            padding: .6em;
            border-radius: 999px;
            line-height: .75em;
            color: white;
            background: rgba(255, 0, 0, .85);
            text-align: center;
            min-width: 2em;
            font-weight: bold;
        }




    ::-webkit-scrollbar {
      width: 8px;
    }

   
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

   
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
      --header-height: 3rem;
      --nav-width: 68px;
      --first-color: #4723D9;
      --first-color-light: #AFA5D9;
      --white-color: #F7F6FB;
      --body-font: 'Nunito', sans-serif;
      --normal-font-size: 1rem;
      --z-fixed: 100
    }

    *,
    ::before,
    ::after {
      box-sizing: border-box
    }

    body {
      position: relative;
      margin: var(--header-height) 0 0 0;
      padding: 0 1rem;
      font-family: var(--body-font);
      font-size: var(--normal-font-size);
      transition: .5s
    }

    a {
      text-decoration: none
    }

    .header {
      width: 100%;
      height: var(--header-height);
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1rem;
      background-color: var(--white-color);
      z-index: var(--z-fixed);
      transition: .5s
    }

    .header_toggle {
      color: var(--first-color);
      font-size: 1.5rem;
      cursor: pointer
    }

    .header_img {
      width: 35px;
      height: 35px;
      display: flex;
      justify-content: center;
      border-radius: 50%;
      overflow: hidden
    }

    .header_img img {
      width: 40px
    }

    .l-navbar {
      position: fixed;
      top: 0;
      left: -30%;
      width: var(--nav-width);
      height: 100vh;
      background-color: var(--first-color);
      padding: .5rem 1rem 0 0;
      transition: .5s;
      z-index: var(--z-fixed)
    }

    .nav {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow: hidden
    }

    .nav_logo,
    .nav_link {
      display: grid;
      grid-template-columns: max-content max-content;
      align-items: center;
      column-gap: 1rem;
      padding: .5rem 0 .5rem 1.5rem
    }

    .nav_logo {
      margin-bottom: 2rem
    }

    .nav_logo-icon {
      font-size: 1.25rem;
      color: var(--white-color)
    }

    .nav_logo-name {
      color: var(--white-color);
      font-weight: 700
    }

    .nav_link {
      position: relative;
      color: var(--first-color-light);
      margin-bottom: 1.5rem;
      transition: .3s
    }

    .nav_link:hover {
      color: var(--white-color)
    }

    .nav_icon {
      font-size: 1.25rem
    }

    .show {
      left: 0
    }

    .body-pd {
      padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
      color: var(--white-color)
    }

    .active::before {
      content: '';
      position: absolute;
      left: 0;
      width: 2px;
      height: 32px;
      background-color: var(--white-color)
    }

    .height-100 {
      height: 100vh
    }

    @media screen and (min-width: 768px) {
      body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem)
      }

      .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
      }

      .header_img {
        width: 40px;
        height: 40px
      }

      .header_img img {
        width: 45px
      }

      .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0
      }

      .show {
        width: calc(var(--nav-width) + 156px)
      }

      .body-pd {
        padding-left: calc(var(--nav-width) + 188px)
      }
    }
  </style>
</head>

<body className='snippet-body'>

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
      <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
              class="nav_logo-name">BBBootstrap</span> </a>
          <div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span
                class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i>
              <span class="nav_name">Users</span> </a> <a href="#" class="nav_link"> <i
                class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> <a
              href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Testimonials</span>
            </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Testimonials</span>
            </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                class="nav_name">Stats</span> </a> </div>
        </div> <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class='bx bx-log-out nav_icon'></i>
    <span class="nav_name">Sign Out</span>
</a>

<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
    @csrf
</form>
      </nav>
    </div>

   






    <div class="row">
    <div class="col-12 text-end">
        @if(count($notifications) > 0)
            <a href="#" class="notification-icon" data-bs-toggle="modal" data-bs-target="#notificationModal" data-notification-id="">
                <span class="fa-stack fa-3x mt-2" data-count="{{ count($notifications) }}">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                </span>
                <span class="notification-ids" data-ids="{{ implode(',', $notifications->pluck('id')->toArray()) }}"></span>
            </a>
        @endif
    </div>
</div>
<br>

<br><br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel-heading  text-center mb-4 p-3">Patient List</div>

<div class="container-fluid p-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Patient name</th>
                <th scope="col">Gender</th>
                <th scope="col">Refered_by</th>
                <th scope="col">Phone number</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Description</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <th scope="row">{{ $patient->id}}</th>
                    <td>{{ $patient->name}}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->referringDoctor->name }}</td>
                    <td>{{ $patient->phone}}</td>
                    <td>{{ $patient->date }}</td>
                    <td>{{ $patient->description }}</td>
                    <td>{{ $patient->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Recent Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(count($notifications) > 0)
                    <ul>
                        @foreach($notifications as $notification)
                            <li>
                                {{ $notification->name }} - {{ $notification->description }} - {{ $notification->phone }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No notifications available.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function openNotificationModal() {
        $('#notificationModal').modal('show');
    }

    function markNotificationsAsRead() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var notificationIds = $('.notification-ids').data('ids').split(',');

        notificationIds.forEach(function (notificationId) {
            var url = '{{ route('mark-notification-as-read', ['id' => ':notificationId']) }}';
            url = url.replace(':notificationId', notificationId);

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                success: function (response) {
                    console.log(response.message);
                    updateNotificationCount(0); // Update count to 0 after marking as read
                },
                error: function (response) {
                    console.error('Error marking notification as read');
                }
            });
        });
        location.reload();
    }

    function updateNotificationCount(count) {
        $('.fa-stack[data-count]').attr('data-count', count);
    }

    $('#notification-icon').click(openNotificationModal);
    $('#notificationModal').on('hidden.bs.modal', markNotificationsAsRead);
</script>














    
   
   
    <script type='text/javascript'
      src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>document.addEventListener("DOMContentLoaded", function (event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
          const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

         
          if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
             
              nav.classList.toggle('show')
              
              toggle.classList.toggle('bx-x')
             
              bodypd.classList.toggle('body-pd')
             
              headerpd.classList.toggle('body-pd')
            })
          }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

       
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
          if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
          }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

       
      });</script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
      myLink.addEventListener('click', function (e) {
        e.preventDefault();
      });</script>

  </body>

</html>