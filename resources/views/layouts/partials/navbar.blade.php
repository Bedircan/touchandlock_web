<nav class="navbar navbar-toggleable-md navbar-dark default-color scrolling-navbar fixed-top navbar-toggleable-md">
    <style>
        h1 {
            font-size: 20px;
            color: #111;
        }

        .content {
            width: 35%;
            margin: 0 auto;
            margin-top: 10px;
        }

        #awesomplete {
            width: 200px;
            box-sizing: border-box;
            border: 2px solid whitesmoke;
            border-radius: 4px;
            font-size: 16px;
            background-image: url("{{url('../img/map2.png')}}");
            background-repeat: no-repeat;
            background-size: 18px 18px;
            background-position: 10px 6px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        #awesomplete:focus {
            width: 140%;
        }

        ::-webkit-input-placeholder {
            color: whitesmoke;
        }

        #awesomplete {
            color: whitesmoke;
        }

        .icon {
            width: 85px;
            height: 85px;
            color: white;

        }

        .icon2 {
            width: 85px;
            height: 85px;
            color: white;
            margin-left: -42px;

        }


    </style>

    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarNav3" aria-controls="navbarNav3" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </button><a href="https://www.team-8.tk" class="navbar-brand">
            <i class="glyphicon glyphicon-home"><span>   </span></i> Touch & Lock </a>
        <div class="collapse navbar-collapse" id="navbarNav3">
            <div class="content">


                <input type="text" id="awesomplete" name="city" size="30" class="city"
                       placeholder=" Search for places">

                <!--<a href="#"><span class="icon"><i class="fa fa-search"></i></span></a>-->


            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->path() == "/" ? 'active' : 'n' }}">
                    <a href="https://www.team-8.tk" class="nav-link waves-effect waves-light"><i class="fa fa-home"></i>
                        Home</a>
                </li>
                <li class="nav-item {{ request()->path() == "contact" ? 'active' : 'n' }}">
                    <a href="{{ route('contact') }}" class="nav-link waves-effect waves-light"><i
                                class="fa fa-envelope"></i> Contact</a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item {{ request()->path() == "login" ? 'active' : 'n' }}">
                        <a href="{{ route('auth.login') }}" class="nav-link waves-effect waves-light"><i
                                    class="fa fa-user"></i>Login</a>
                    </li>
                    <li class="nav-item {{ request()->path() == "signup" ? 'active' : 'n' }}">
                        <a href="{{ route('auth.register') }}" class="nav-link waves-effect waves-light"><i
                                    class="fa fa-user-plus"></i>Create Account</a>
                    </li>
                @else
                    <li class="nav-item dropdown {{ request()->path() == "account" || request()->path() == "account/addproperty" ? 'active' : 'n' }}">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" type="button"
                           id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img src="{{ Auth::user()->getAvatarUrl() }}" class="rounded-circle" width="25"
                                 height="25"/>    {{ Auth::user()->fullname }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-default dropdown-menu-right"
                             aria-labelledby="navbarDropdownMenuLink" data-dropdown-in="fadeIn"
                             data-dropdown-out="fadeOut">
                            <a class="dropdown-item waves-effect waves-light" href="{{route('account.dashboard')}}">Account
                                Settings</a>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('account.addproperty')}}">Add
                                Property</a>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('account.reservations')}}">My
                                Reservations</a>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('account.properties')}}">
                                My Properties</a>
                            <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<link rel="stylesheet" href="{{ secure_asset('css/awesomplete.css')}}"/>
<script src="https://cdn.rawgit.com/LeaVerou/awesomplete/gh-pages/awesomplete.min.js"></script>
<script type="text/javascript">
    window.addEventListener("awesomplete-select", function (e) {
        // User made a selection from dropdown.
        // This is fired before the selection is applied
    }, false);

    window.addEventListener("awesomplete-selectcomplete", function (e) {
        // User made a selection from dropdown.
        // This is fired after the selection is applied
    }, false);

    window.addEventListener("awesomplete-open", function (e) {
        // The popup just appeared.
    }, false);

    window.addEventListener("awesomplete-close", function (e) {
        // The popup just closed.
    }, false);

    window.addEventListener("awesomplete-highlight", function (e) {
        // The highlighted item just changed
        // (in response to pressing an arrow key or via an API call).
    }, false);


    $(function () {
        //awesomplete
        var input = $("#awesomplete");
        var awesomplete = new Awesomplete('#awesomplete', {
            minChars: 1,
            //autoFirst: true
        });

        $(input).on("keydown", function (e) {
            var left = 37
            var up = 38
            var right = 39
            var down = 40
            if (e.keyCode != left && e.keyCode != up && e.keyCode != right && e.keyCode != down && e.keyCode) {
                    $.ajax({
                        url: '{{url('/search')}}',
                        type: 'POST',
                        data: {keywords: this.value},
                        success: function (data) {
                            //console.log(data);
                            var list = [];
                            $.each(data, function (key, value) {
                                list.push(value.address);
                            });
                            awesomplete.list = list;
                        }
                    });
            }//end of if for arrow section
        });

        $('#awesomplete').on('keyup', function (e) {
            if (e.keyCode == 13 && this.value) {
                //it is to fire the laravel to fill search page with values.
                window.location = '{{url('/search/specific')}}' + '?page=1&keywords=' + this.value;
            }
        });

    });
</script>