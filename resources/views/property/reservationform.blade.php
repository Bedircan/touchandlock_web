@extends('layouts.master')

@section('content')
    <div class="main-container">
        <br>
        <br>
        <br>
        <h2> Select a date</h2>
        <hr>
    <form role="form" method="post" id="main-form">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <br>
            <p>Selectable Range: {{$property->from_date}} to {{$property->to_date}}</p>
            <br>
                <div class="input-daterange" id="datepicker" >
                    <fieldset class="form-group md-form">
                    <input type="text" id="from" readonly required class="input-small form-control" name="start" />
                    <label for="from" class="control-label"><span class="add-on"><i
                                    class="fa fa-calendar"></i> </span> From</label>
                    </fieldset>
                    <fieldset class="form-group md-form">
                    <input type="text" id="to" readonly required class="input-small form-control" name="end" />
                    <label for="to" class="control-label"><span class="add-on"><i
                                    class="fa fa-calendar"></i> </span> To</label>
                    </fieldset>

                </div>

        </div>
    </div>
    </form>
        <button class="btn btn-success btn-lg pull-right" type="submit" id="submitButton">Submit</button>
        <div id="responseContainer"></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <script type="text/javascript">
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
                            url: "{{ url('reserve/'.$property->id)}}",
                            method: "POST",
                            data: {formElements: $('#main-form').serialize(), urls: window.urls},
                            success: function (data) {
                                //$('#responseContainer').html(data);
                                window.location = "{{url('/')}}";
                            },

                            error: function (jqXHR, textStatus, errorThrown ) {
                                //$('#responseContainer').html(jqXHR.responseText);
                            }
                        });
                    }else{
                        alert('Please fill all inputs!');
                    }

                });
            });
    </script>

    <script type="text/javascript">
        function GetTodayDate() {
            var tdate = new Date();
            var dd = tdate.getDate(); //yields day
            var MM = tdate.getMonth(); //yields month
            if(MM<10) MM = '0'+(MM);
            if(dd<10) dd = '0'+dd;
            var yyyy = tdate.getFullYear(); //yields year
            var today = yyyy + "/" +MM + "/" + dd;

            return today;
        }

        var today = GetTodayDate();
        var startDate;

        if(today>'{{$property->from_date}}'){
            startDate = today;
        }
        else{
            startDate = '{{$property->from_date}}';
        }

        $('.input-daterange').datepicker({
            format: 'yyyy/mm/dd',
            startDate: startDate,
            endDate: '{{$property->to_date}}'
        });
    </script>

@stop