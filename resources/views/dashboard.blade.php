<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>HomeoSafe</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
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




    .image-gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
        margin-right: 0%;

        /* Add some negative margin to counteract the spacing */
    }

    .image-item {
        width: calc(25% - 20px);
        /* 25% width with spacing between images */
        margin: 10px;
        /* Add some spacing between images */
        text-align: center;
        /* Center align text under each image */
        height: 200px;
        /* Set a fixed height for all image containers */
        overflow: hidden;
        /* Hide any part of the image that overflows the container */
    }

    .image-item img {
        max-width: 100%;
        height: 100%;
        /* Ensure the image fills the entire container while maintaining its aspect ratio */
    }




    .delete-button {
        background-color: #e74c3c;
        /* Choose the background color you prefer */
        color: #fff;
        /* Text color */
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .delete-button:hover {
        background-color: #c0392b;
        /* Change the background color on hover */
    }




    .status-button {
        padding: 5px 10px;
        border: 1px solid #333;
        background-color: #F7F7F7;
        color: #333;
        cursor: pointer;
        display: inline-block;
        /* Add this property */
        margin-right: 5px;
        /* Add some right margin to separate the buttons */
    }

    .status-button.active {
        background-color: #00FF00;
        color: #FFF;
    }

    .status-button.inactive {
        background-color: #FF0000;
        color: #FFF;
    }



    .gem {
        position: absolute;


    }
    </style>
</head>

<body className='snippet-body'>

    <body id="body-pd">



    <script>
    @if(session('success'))
        toastr.options = {
            "closeButton" : true,
            "progressBar" : true
        };
        toastr.success("{{ session('success') }}");
    @endif
</script>

        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                            class="nav_logo-name">Homeosafe</span> </a>
                    <div class="nav_list"> <a href="{{ route('patient.list') }}" class="nav_link active"> <i
                                class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a
                            href="{{ url('images') }}" class="nav_link"> <i class='bx bx-image nav_icon'></i>
                            <span class="nav_name">Admin-Gallery</span> </a> <a href="{{ url('doctor') }}"
                            class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span
                                class="nav_name">Doctor's Form</span> </a> <a href="#" class="nav_link"> <i
                                class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span>
                        </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span
                                class="nav_name">Files</span>
                        </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                                class="nav_name">Stats
                            </span> </a> </div>
                </div> <a href="{{ route('logout') }}" class="nav_link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">Sign Out</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>

            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Image Upload</h4>
                    <form action="{{ route('images.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="images[]" multiple>
                        <button type="submit">Upload</button>
                    </form>

                    <br><br>

                   

                    <form action="{{ route('images.deleteSelected') }}" method="POST">
                        @csrf
                        <div class="image-gallery">
                            @if(isset($images) && count($images) > 0)
                            @foreach($images as $image)
                            <div class="image-item">
                                <input type="checkbox" name="selected_images[]" value="{{ $image->id }}">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->image_name }}"
                                    width="200">
                                <p>{{ $image->image_name }}</p>

                                <form action="{{ route('images.setStatus', $image->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="btn-group gem"><button type="submit" name="status" value="active"
                                            class="status-button {{ $image->status === 'active' ? 'active' : 'inactive' }}">Active</button>
                                        <button type="submit" name="status" value="inactive"
                                            class="status-button {{ $image->status === 'inactive' ? 'active' : 'inactive' }}">Inactive</button>
                                    </div>
                                </form>
                            </div>
                            @endforeach
                            @else
                            <p>No images to display.</p>
                            @endif
                        </div>
                        <br><br><br><br>
                        <button type="submit" class="delete-button">Delete Selected</button>

                    </form>
                </div>
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif




        <script type='text/javascript'
            src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript'>
        document.addEventListener("DOMContentLoaded", function(event) {

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


        });
        </script>
        <script type='text/javascript'>
        var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
            e.preventDefault();
        });
        </script>

    </body>

</html>