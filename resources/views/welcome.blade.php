@extends('layouts.master')

@section('content')
    <div class="main-container">
        </br>
        <h1>
            List of Properties
        </h1>
    <hr>

        <!---Property listing section-->
        <div class="row">
            @for($i=0; $i<20; $i++)

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="view overlay hm-zoom hm-black-light">
                        <a href="/details">
                            <img src="http://goksallarinsaat.com/wp-content/uploads/2014/10/ca1.jpg" class="img-fluid " alt="">

                        <div class="mask flex-center">
                            <p class="white-text">See Details</p>
                        </div>
                        </a>
                    </div>
                    <div class="card-header">
                        <h3>₺45 Property Label</h3>
                        <p class="">
                            This property is a property. This property is a property. This property is a property.
                            This property is a property. This property is a property. This property is a property.
                        </p>
                        <p><a href="/reserve/{{}}" class="btn btn-primary" role="button">Reserve</a></p>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <!-- Pagination -->
        <div class="center">
            <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="/property/page/2">2</a></li>
                <li><a href="/property/page/3">3</a></li>
                <li><a href="/property/page/4">4</a></li>
                <li><a href="/property/page/5">5</a></li>
            </ul><!-- /.pagination-->
        </div><!-- /.center-->

    </div><!-- /#container div-->
@stop