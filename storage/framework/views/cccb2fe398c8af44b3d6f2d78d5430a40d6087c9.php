
<?php $__env->startSection('content'); ?>
    <style>
        #locationField, #controls {
            position: relative;
            width: 480px;
        }
        #autocomplete {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 99%;
        }
        .label {
            text-align: right;
            font-weight: bold;
            width: 100px;
            color: #303030;
        }
        #address {
            border: 1px solid #000090;
            background-color: #f0f0ff;
            width: 480px;
            padding-right: 2px;
        }
        #address td {
            font-size: 10pt;
        }
        .field {
            width: 99%;
        }
        .slimField {
            width: 80px;
        }
        .wideField {
            width: 200px;
        }
        #locationField {
            height: 20px;
            margin-bottom: 2px;
        }
        #map {
             height: 100%;
         }
    </style>
    <script type="text/javascript">
        var urls = [];
    </script>
    <div class="main-container">
        </br>
        <h2> New Property</h2>
        <hr>
        </br>
        <!-- step by step form--->
        <div class="stepwizard col-md-offset-3">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Tell About Your Property</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Specification</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Available Date</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p>Upload Photo(s)</p>
                </div>
            </div>
        </div>

        <form role="form" method="post" id="main-form" action="<?php echo e(url('account/addproperty')); ?>">
            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
            <div class="row setup-content" id="step-1">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        </br></br>
                        <h3> Tell About Your Property</h3>
                        <hr>
                        </br>
                        <div class="form-group md-form">
                        <div id="locationField">
                            <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" name="address">
                            <label for="autocomplete" class="control-label">Address</label>
                        </div>
                        <!--<table id="address">
                            </br>
                            <tr>
                                <td class="label">Street address</td>
                                <td class="slimField">
                        -->
                                    <input type="hidden" class="field" id="street_number" disabled="true" name="street_number">
                                <!--</td>
                                <td class="wideField" colspan="2">-->
                                    <input type="hidden" class="field" id="route" disabled="true" name="street">
                               <!--</td>
                            </tr>
                            <tr>
                                <td class="label">City</td>
                                <td class="wideField" colspan="3">-->
                                    <input type="hidden" class="field" id="administrative_area_level_1" disabled="true" name="city">
                                <!--</td>
                            </tr>
                            <tr>
                                <td class="label">Country</td>
                                <td class="wideField">-->
                                    <input type="hidden" class="field" id="country" disabled="true" name="country">
                                <!--</td>
                                <td class="label">Zip code</td>
                                <td class="wideField"  colspan="2">-->
                                    <input type="hidden" class="field" id="postal_code" disabled="true" name="zipcode">
                                <!--</td>
                            </tr>
                        </table>-->
                        </div>
                            <div id="map"></div>
                        </br>
                        <div class="form-group md-form">
                            <input type="text" id="title"
                                   placeholder="Type a related title to your property (at least 10 character)"
                                   name="title" pattern="[A-Za-z0-9 .'ğüşıöçĞÜŞİÖÇ]{10,50}" maxlength="50"
                                   required="required" class="form-control">
                            <label for="title" class="control-label">Title</label>
                        </div>
                        <div class="form-group md-form">
                            <input type="number" id="price" name="price" pattern="[0-9]{1,4}" min="10" max="999" required="required"
                                   class="form-control">
                            <label for="price" class="control-label">Price</label>
                        </div>
                        </br><h4>Type</h4></br>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input name="type" value="Entire Home" type="radio" id="radio11" checked="checked">
                                    <label for="radio11">Entire Home</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input name="type" value="Private Room" type="radio" id="radio21">
                                    <label for="radio21">Private Room</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input name="type" value="Shared Room" type="radio" id="radio31">
                                    <label for="radio31">Shared Room</label>
                                </fieldset>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        </br></br>
                        <h3> Specifications</h3>
                        <hr>
                        </br>
                        <h4> Description</h4>
                        </br>
                        <div class="row">
                            <div class="form-group col-md-12 md-form">
                                <textarea id="textarea1" name="description" class="md-textarea"
                                          pattern="[A-Za-z]{20,250}" maxlength="200" minlength="50" required="required"
                                          class="form-control"></textarea>
                                <label for="textarea1" class="control-label">Describe your property in your word</label>
                                <span id="textarea1-counter"
                                      style="float: right; color: #0b51c5; font-size: 12px; height: 1px;"></span>
                            </div>
                        </div>
                        </br>
                        <h4> General Needs</h4>
                        </br>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_smoke" name="s_smoke">
                                    <label for="s_smoke">Smoke-Allowed</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_pet" name="s_pet">
                                    <label for="s_pet">Pet-Allowed</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_wifi" name="s_wifi">
                                    <label for="s_wifi">Wi-Fi</label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_basic" name="s_basic">
                                    <label for="s_basic">Basic Needs</label></br>
                                    <small>(Towel, Shampoo, Slipper)</small>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_tv" name="s_tv">
                                    <label for="s_tv">TV</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_heating" name="s_heating">
                                    <label for="s_heating">Heating</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_cooling" name="s_cooling">
                                    <label for="s_cooling">Cooling</label>
                                </fieldset>
                            </div>
                        </div>

                        </br>
                        <h4> Security</h4>
                        </br>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_firededector" name="s_firededector">
                                    <label for="s_firededector">Fire Dedector</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_aidkit" name="s_aidkit">
                                    <label for="s_aidkit">First Aid Kit</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_extinguisher" name="s_extinguisher">
                                    <label for="s_extinguisher">Extinguisher</label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <input type="checkbox" id="s_nfc" name="s_nfc">
                                    <label for="s_nfc">NFC Supported</label></br>
                                    <small>(Entry gates are opened by NFC)</small>
                                </fieldset>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        </br></br>
                        <h3> Available Date</h3>
                        <hr>
                        </br>
                        <div class="row">
                            <div class="form-group md-form col-md-12">
                            <div class="input-daterange" id="datepicker" >
                                <fieldset class="form-group md-form">
                                    <input type="text" id="from" readonly required="required" class="form-control" name="start" />
                                    <label for="from" class="control-label"><span class="add-on"><i
                                                    class="fa fa-calendar"></i> </span> From</label>
                                </fieldset>
                                <fieldset class="form-group md-form">
                                    <input type="text" id="to" readonly required="required" class="form-control" name="end" />
                                    <label for="to" class="control-label"><span class="add-on"><i
                                                    class="fa fa-calendar"></i> </span> To</label>
                                </fieldset>
                            </div>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                    </div>
                </div>
            </div>

        </form>
        <div class="row setup-content" id="step-4">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    </br></br>
                    <h3> Upload Photo(s) </h3>
                    <hr>
                    </br>

                    <form action="<?php echo e(url('account/uploadproperty')); ?>" method="post" class="dropzone" id="my-awesome-dropzone">

                    </form>

                    <button class="btn btn-success btn-lg pull-right" type="submit" id="submitButton">Submit</button>
                </div>
            </div>
        </div>

        <div id="responseContainer"></div>
    </div>
    <script  type="text/javascript">
        $(function () {
            function validateForm() {
                var isValid = true;
                $('.form-control').each(function() {
                    if ( $(this).val() === '' )
                        isValid = false;
                });
                return isValid;
            };

            $('#submitButton').on('click', function () {
                if(validateForm()){
                    $.ajax({
                        url: "<?php echo e(url('account/addproperty')); ?>",
                        method: "POST",
                        data: {formElements: $('#main-form').serialize(), urls: window.urls},
                        success: function (data) {
                            window.location.href = "<?php echo e(url('/account/properties')); ?>";
                        },

                        error: function (jqXHR, textStatus, errorThrown ) {
                            alert('could not add the property! please check your form entries')
                        }
                    });
                }else{
                    alert('Please fill all inputs!');
                }

            });
        });
    </script>
    <script type="text/javascript">
        /**
         * Created by Can on 12.04.2017.
         */
        $(document).ready(function () {
            var submitButton = $('#submitButton');
            submitButton.attr("disabled", true);
            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');
            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text']," +
                        "input[type='url'],input[type='number'],textarea[class='md-textarea']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        submitButton.attr("disabled", true);
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid){
                    nextStepWizard.removeAttr('disabled').trigger('click');
                    submitButton.attr("disabled", false);
                }
                else{
                    submitButton.attr("disabled", true);
                }

            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('textarea[maxLength]').each(function () {
                var tId = $(this).attr("id");
                $(this).after('<br><span id="cnt' + tId + '"></span>');
                $(this).keyup(function () {
                    var tId = $(this).attr("id");
                    var tMax = $(this).attr("maxLength");//case-sensitive, unlike HTML input maxlength
                    var left = tMax - $(this).val().length;
                    if (left < 0) left = 0;
                    $('#' + tId + '-counter').text(left + '/' + tMax);
                }).keyup();
            });
        });

        $(function () {
            /*$('input[type=checkbox]').each(function () {
                $(this).val("on");
            });*/
        });
    </script>


    <script type="text/javascript">
        $(function(){

           /* Dropzone.options.myAwesomeDropzone = {
                maxFilesize: 5,
                maxFiles: 8,
                addRemoveLinks: true,
                dictResponseError: 'Server not Configured',
                acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                dictDefaultMessage: 'Drag photos.',
                dictMaxFilesExceeded: 'Maximum allowed upload is 8!',
                dictRemoveFile: 'Delete',
                init:function(){
                    var self = this;
                    // config
                    self.options.addRemoveLinks = true;
                    self.options.dictRemoveFile = "Deletes";
                    //New file added
                    self.on("addedfile", function (file) {
                        console.log('new file added ', file);
                    });
                    // Send file starts
                    self.on("sending", function (file) {
                        console.log('upload started', file);
                        $('.meter').show();
                    });

                    // File upload Progress
                    self.on("totaluploadprogress", function (progress) {
                        console.log("progress ", progress);
                        $('.roller').width(progress + '%');
                    });

                    self.on("queuecomplete", function (progress) {
                        $('.meter').delay(999).slideUp(999);
                    });

                    // On removing file
                    self.on("removedfile", function (file) {
                        console.log(file);
                    });

                    //on complete
                    self.on('success',function () {
                        alert("uploaded!");
                    });
                },
                success: function (file,data) {
                    alert("uploaded");
                }

            };*/

        })
    </script>

    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type  {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>
    <script>
        // The following example creates complex markers to indicate beaches near
        // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
        // to the base of the flagpole.
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: {lat: -33.9, lng: 151.2}
            });

            setMarkers(map);
        }

        // Data for the markers consisting of a name, a LatLng and a zIndex for the
        // order in which these markers should display on top of each other.
        var beaches = [
            ['Bondi Beach', -33.890542, 151.274856, 4],
            ['Coogee Beach', -33.923036, 151.259052, 5],
            ['Cronulla Beach', -34.028249, 151.157507, 3],
            ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
            ['Maroubra Beach', -33.950198, 151.259302, 1]
        ];

        function setMarkers(map) {
            // Adds markers to the map.

            // Marker sizes are expressed as a Size of X,Y where the origin of the image
            // (0,0) is located in the top left of the image.

            // Origins, anchor positions and coordinates of the marker increase in the X
            // direction to the right and in the Y direction down.
            var image = {
                url: 'https://res.cloudinary.com/www-team-8-tk/image/upload/v1493231167/Double-J-Design-Origami-Colored-Pencil-Blue-home_1_vv3xd6.ico',
                // This marker is 20 pixels wide by 32 pixels high.
                size: new google.maps.Size(20, 32),
                // The origin for this image is (0, 0).
                origin: new google.maps.Point(0, 0),
                // The anchor for this image is the base of the flagpole at (0, 32).
                anchor: new google.maps.Point(0, 32)
            };
            // Shapes define the clickable region of the icon. The type defines an HTML
            // <area> element 'poly' which traces out a polygon as a series of X,Y points.
            // The final coordinate closes the poly by connecting to the first coordinate.
            var shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: 'poly'
            };
            for (var i = 0; i < beaches.length; i++) {
                var beach = beaches[i];
                var marker = new google.maps.Marker({
                    position: {lat: beach[1], lng: beach[2]},
                    map: map,
                    icon: image,
                    shape: shape,
                    title: beach[0],
                    zIndex: beach[3]
                });
            }
        }
        /*$(function () {
            google.maps.event.addDomListener(window, "load", initMap());
        });*/

    </script>

    <script type="text/javascript">
        function GetTodayDate() {
            var tdate = new Date();
            var dd = tdate.getDate(); //yields day
            var MM = tdate.getMonth(); //yields month
            if(MM<10) MM = '0'+(MM+1);
            if(dd<10) dd = '0'+dd;
            var yyyy = tdate.getFullYear(); //yields year
            var today = yyyy + "/" +MM + "/" + dd;

            return today;
        }

        function GetSecondDate() {
            var tdate = new Date();
            var dd = tdate.getDate() + 1; //yields day
            var MM = tdate.getMonth(); //yields month
            if(MM<10) MM = '0'+(MM+1);
            if(dd<10) dd = '0'+dd;
            var yyyy = tdate.getFullYear(); //yields year
            var today = yyyy + "/" +MM + "/" + dd;


            return today;
        }

        var today = GetTodayDate();

        $('.input-daterange').datepicker({
            format: 'yyyy/mm/dd',
            startDate: today,
        });

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTxnH2RQvSZ5V7hJ57TlHimvWFr43Cv0A&libraries=places&callback=initAutocomplete"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>