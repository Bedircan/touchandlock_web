@extends('layouts.master')

@section('content')
    <style type="text/css">
        body {
            overflow-x: hidden; }

        img {
            max-width: 100%; }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column; }
        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px; } }

        .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px; }
        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%; }
        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block; }
        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0; }
        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0; }

        .tab-content {
            overflow: hidden; }
        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s; }

        .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em; }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex; } }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column; }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; }

        .product-title, .price, .sizes, .colors {
            font-weight: bold; }

        .checked, .price span {
            color: #ff9f1a; }

        .product-title, .rating, .product-description, .price, .vote, .sizes {
            margin-bottom: 15px; }

        .product-title {
            margin-top: 0; }

        .size {
            margin-right: 10px; }
        .size:first-of-type {
            margin-left: 40px; }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px; }
        .color:first-of-type {
            margin-left: 20px; }

        .add-to-cart, .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease; }
        .add-to-cart:hover, .like:hover {
            background: #b36800;
            color: #fff; }

        .not-available {
            text-align: center;
            line-height: 2em; }
        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff; }

        .orange {
            background: #ff9f1a; }

        .green {
            background: #85ad00; }

        .blue {
            background: #0076ad; }

        .tooltip-inner {
            padding: 1.3em; }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1); } }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1); } }
        .off {
            text-decoration: line-through;
            color: #D50000;
            font-size: medium;
        }

        .on {
            font-size: medium;
            color: #00aa00;

        }

        /*# sourceMappingURL=style.css.map */
    </style>

    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            @if($property['specs']['img_1'] == null)
                                <div class="tab-pane active" id="pic-1"><img src="../img/default-home.png" /></div>
                            @else
                                <div class="tab-pane active" id="pic-1"><img src="{{$property['specs']['img_1']}}" /></div>
                            @endif

                            @for ($cnt = 1; $cnt < 8; $cnt++)
                                @if($property['specs']['img_'.($cnt+1)] != null)
                                    <div class="tab-pane" id="pic-{{$cnt+1}}"><img src="{{$property['specs']['img_'.($cnt+1)]}}" /></div>
                                @endif
                            @endfor
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            @if($property['specs']['img_1'] == null)
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="../img/default-home.png"/></a></li>
                            @else
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{$property['specs']['img_1']}}"/></a></li>
                            @endif

                            @for ($cnt = 2; $cnt <= 8; $cnt++)
                                @if($property['specs']['img_'.($cnt)] != null)
                                    <li><a data-target="#pic-{{$cnt}}" data-toggle="tab"><img src="{{$property['specs']['img_'.($cnt)]}}"/></a></li>
                                @endif
                            @endfor
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <br>
                        <br>
                        <h3 class="product-title">{{$property->title}}</h3>
                        <h4 style="font-style: italic"><small>{{$property->address}}</small></h4>
                        <hr>
                        <h5 style="font-style: italic">Description:</h5>
                        <p class="product-description">{{$property->description}}</p>
                        <h6 class="price">TYPE: <span>{{$property->type}}</span></h6>
                        <br>
                        <h4 class="price">PRICE: <span>{{$property->price}}₺ (Per Night)</span></h4>
                        @if($property['user_id'] != Auth::user()->id)
                        <div class="action">
                            <a href="/reserve/{{$property->id}}"><button class="add-to-cart btn btn-default" type="button">Reserve</button></a>
                        </div>
                        @else
                            <div class="action">
                                <a href="{{url('/account/guests?prop_id='.$property->id)}}"><button class="add-to-cart btn btn-default" type="button">See Guests</button></a>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="row setup-content">
                    <div class="col-md-12">
                        </br></br></br>
                        <h4> General Needs</h4>
                        </br>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_smoke" aria-hidden="true"></i>
                                    <label for="s_smoke" class="{{$property['specs']['s_smoke']}}">Smoke-Allowed</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_pet" aria-hidden="true"></i>
                                    <label for="s_pet" class="{{$property['specs']['s_pet']}}">Pet-Allowed</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_wifi" aria-hidden="true"></i>
                                    <label for="s_wifi" class="{{$property['specs']['s_wifi']}}">Wi-Fi</label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_basic" aria-hidden="true"></i>
                                    <label for="s_basic" class="{{$property['specs']['s_basic']}}">Basic Needs</label></br>
                                    <small>(Towel, Shampoo, Slipper)</small>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_tv" aria-hidden="true"></i>
                                    <label for="s_tv" class="{{$property['specs']['s_tv']}}">TV</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_heating" aria-hidden="true"></i>
                                    <label for="s_heating" class="{{$property['specs']['s_heating']}}">Heating</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_cooling" aria-hidden="true"></i>
                                    <label for="s_cooling" class="{{$property['specs']['s_cooling']}}">Cooling</label>
                                </fieldset>
                            </div>
                        </div>

                        </br>
                        <h4> Security</h4>
                        </br>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_firededector" aria-hidden="true"></i>
                                    <label for="s_firededector" class="{{$property['specs']['s_firededector']}}">Fire Dedector</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_aidkit" aria-hidden="true"></i>
                                    <label for="s_aidkit" class="{{$property['specs']['s_aidkit']}}">First Aid Kit</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_extinguisher" aria-hidden="true"></i>
                                    <label for="s_extinguisher" class="{{$property['specs']['s_extinguisher']}}">Extinguisher</label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <i id="s_nfc" aria-hidden="true"></i>
                                    <label for="s_nfc" class="{{$property['specs']['s_nfc']}}">NFC Supported</label></br>
                                    <small>(Entry gates are opened by NFC)</small>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

        <script type="text/javascript">
            $(function () {
                $('.off').each(function () {
                   $(this).prev().addClass('fa fa-close');
                });

                $('.on').each(function () {
                    $(this).prev().addClass('fa fa-check');
                });
            });
        </script>
@stop