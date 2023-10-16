<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <link rel="stylesheet" href="{{ asset('css/form.css') }}>
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
    <script src="https://kit.fontawesome.com/bbed85d1ee.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

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
    </style>

    <title>InstaHomeo</title>

</head>
<body>
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
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
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
</body>
</html>
