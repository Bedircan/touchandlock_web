

<?php $__env->startSection('content'); ?>
    <script type="text/javascript">
        function getSubDesc(text){
            var max = 45;
            var res = text.substring(0,max);

            if(text.length > max)
                res += ' ...';

            return res;
        }

        function getSubTitle(text){
            var max = 20;
            var res = text.substring(0,max);

            if(text.length > max)
                res += " ...";
            return res;
        }

        $(function () {
            //$('.carousel').carousel();
        });
    </script>

    <div class="main-container">
        <?php if(!isset($keywords)): ?>
        <!-- Carousel -->
        <div id="carousel1" class="carousel slide carousel-fade hoverable">

            <!-- Indicators -->
            <ol class="carousel-indicators" style="left: 55px">
                <li data-target="#carousel1" data-slide-to="0" class="active">
                </li>
                <li data-target="#carousel1" data-slide-to="1"></li>
                <li data-target="#carousel1" data-slide-to="2"></li>
                <li data-target="#carousel1" data-slide-to="3"></li>
                <li data-target="#carousel1" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner z-depth-2" role="listbox">

                <!-- First slide -->
                <div class="item active" >
                    <div class="view overlay hm-blue-slight">
                        <a><img src="../img/1.jpg"  class="img-responsive" alt="slide1">
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>İstanbul</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <!-- Second slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a><img src="../img/2.jpg"  class="img-responsive" alt="slide2">
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>Köln</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <!-- Third slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a><img src="../img/3.jpg" class="img-responsive" alt="slide3">
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>London</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fourth slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a><img src="../img/4.jpg"  class="img-responsive" alt="slide4">
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>Paris </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fifth slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a><img src="../img/5.jpg"  class="img-responsive" alt="slide4">
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>Nevşehir</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

            </div>
            <!-- /.carousel-inner -->

            <!-- Controls -->
            <a class="left carousel-control new-control" href="#carousel1" role="button" data-slide="prev">
                <span class="fa fa fa-angle-left waves-effect waves-light"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control new-control" href="#carousel1" role="button" data-slide="next">
                <span class="fa fa fa-angle-right waves-effect waves-light"></span>
                <span class="sr-only">Previous</span>
            </a>

        </div>
        <!-- /.carousel -->
        <?php endif; ?>
        </br>
        <h1>
            List of Properties
        </h1>
        <hr>

        <!---Property listing section-->
        <div class="row">
            <?php ($counter=0); ?>

            <?php foreach($properties as $property): ?>
                <?php ($counter++); ?>

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <div class="view overlay hm-zoom hm-black-light">
                            <a href="/details/<?php echo e($property->id); ?>">
                                <img src="<?php echo e(isset($property->specs['img_1']) ? $property->specs['img_1'] : '../img/default-home.png'); ?>" class="img-fluid " style="width: 245px; height: 245px;" alt="">

                                <div class="mask flex-center">
                                    <p class="white-text">See Details</p>
                                </div>
                            </a>
                        </div>
                        <div class="card-header">
                            <h2 class="price-property">₺<?php echo e($property->price); ?></h2>

                            <h2 class="title-property" id="title-<?php echo e($counter); ?>"></h2>
                            <script type="text/javascript">
                                $('#title-<?php echo e($counter); ?>').text(getSubTitle("<?php echo $property->title; ?>"))
                            </script>
                            <div>
                                <small class="text-two-line" id="desc-<?php echo e($counter); ?>">
                                </small>
                                <script type="text/javascript">
                                    $('#desc-<?php echo e($counter); ?>').text(getSubDesc("<?php echo $property->description; ?>"));
                                </script>
                            </div>
                            <div class="text-center">
                                <a href="/reserve/<?php echo e($property->id); ?>" class="btn btn-primary center-block" role="button">Reserve</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li class="page-item active" id="page-1">
                    <!--Here, $routeDirection comes dynamically from PropertyController.
                    It is for pagination of both all properties and searched ones.-->
                    <a class="page-link" href="<?php echo e(route($routeDirection)); ?>?page=1<?php echo e(isset($keywords) ? '&keywords='.$keywords : ''); ?>">1 <span class="sr-only">(current)</span></a>
                </li>
                <?php ($counter=($numberOfProperty/12)+1); ?>
                <?php for($i = 2; $i < $counter; $i++): ?>
                    <li class="page-item" id="page-<?php echo e($i); ?>"><a class="page-link" href="<?php echo e(route($routeDirection)); ?>?page=<?php echo e($i); ?><?php echo e(isset($keywords) ? '&keywords='.$keywords : ''); ?>"><?php echo e($i); ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div><!-- /#container div-->
    <br>
    <br>

    <script type="text/javascript">
        var GetURLParameter = function(sParam)
        {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
            }
        }

        $(function () {
            var pageNum = GetURLParameter('page');
            $('li').each(function () {
                $(this).removeClass('active');
            });
            $('#page-'+pageNum).addClass('active');
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>