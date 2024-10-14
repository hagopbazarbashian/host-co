<header class="header-light transparent has-topbar">
    {{-- <div id="topbar">
        <div class="container">
            <div class="topbar-left xs-hide">
                <span class="topbar-widget">
                    <a href="#">Get Free Shared Hosting!</a>
                </span>
            </div>

            <div class="topbar-right">
                <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+208 333 9296</a></div>
                <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>support@hostco.com</a></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="{{route('home')}}">
                                    <img class="logo-main" src="{{asset('asset/images/logo.png')}}" alt="" >
                                    <img class="logo-mobile" src="{{asset('asset/images/logo-mobile.png')}}" alt="" >
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            @guest
                                <li><a class="menu-item" href="{{route('free_trial')}}">Transfer</a></li>
                            @endguest

                            <!-- If the user is logged in, show the "Transfer" link to the user home page -->
                            @auth
                                <li><a class="menu-item" href="{{route('user_home')}}">Transfer</a></li>
                            @endauth
                            {{-- <li><a class="menu-item" href="website-builder.html">Pricing</a></li> --}}
                            <li><a class="menu-item" href="#" id="contactUsLink">Contact Us</a></li>
                            <li><a class="menu-item" href="{{route('send_text')}}">send text</a></li>
                            @auth
                            <li><a class="menu-item" href="{{ route('send_text') }}"><i class="fas fa-folder-open"></i> Show Your Files</a></li>
                            @endauth
                        </ul>
                    </div>
                    @guest
                    <div class="de-flex-col">
                    <div class="menu_side_area">
                        <a href="{{route('free_trial')}}" class="btn-main">Login / Register</a>
                        <span id="menu-btn"></span>
                    </div>
                    </div>
                    @else
                    <div class="de-flex-col">
                    <div class="menu_side_area">
                        <a href="{{route('user_home')}}" class="btn-main">Welcome {{auth()->user()->name}}</a>
                        <span id="menu-btn"></span>
                    </div>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Modal container */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal content box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    max-width: 500px; /* Maximum width */
}

/* Close button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Form styling */
form {
    display: flex;
    flex-direction: column;
}

form label {
    margin: 10px 0 5px;
}

form input,
form textarea {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form button:hover {
    background-color: #45a049;
}

    </style>
  <!-- Popup modal -->
<div id="contactModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Contact Us</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form id="contactForm" action="{{ route('send_contact') }}" method="POST">
            @csrf
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the modal
    var modal = document.getElementById("contactModal");

    // Get the link that opens the modal
    var link = document.getElementById("contactUsLink");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the link, open the modal 
    link.onclick = function(event) {
        event.preventDefault();
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});


</script>
</header>
