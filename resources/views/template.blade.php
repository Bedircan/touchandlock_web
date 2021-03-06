@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="{{secure_asset('/css/table.less')}}">

    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br>


    <div class="container">



        <table class="flatTable">
            <tr class="titleTr">
                <td class="titleTd">TABLE TITLE</td>
                <td colspan="4"></td>
                <td class="plusTd button"></td>
            </tr>
            <tr class="headingTr">
                <td>REFERENCE</td>
                <td>DATE ISSUED</td>
                <td>COMPANY</td>
                <td>AMOUNT</td>
                <td>STATUS</td>
                <td></td>
            </tr>

            <tr>
                <td>#2331212</td>
                <td>Feb 21,2013</td>
                <td>White Out</td>
                <td>$2,000</td>
                <td>Paid</td>
                <td class="controlTd">
                    <div class="settingsIcons">
                        <span class="settingsIcon"><img src="http://i.imgur.com/nnzONel.png" alt="X" /></span>
                        <span class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></span>
                        <div class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>#2331212</td>
                <td>Feb 21,2013</td>
                <td>White Out</td>
                <td>$2,000</td>
                <td>Paid</td>
                <td class="controlTd">
                    <div class="settingsIcons">
                        <span class="settingsIcon"><img src="http://i.imgur.com/nnzONel.png" alt="X" /></span>
                        <span class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></span>
                        <div class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>#2331212</td>
                <td>Feb 21,2013</td>
                <td>White Out</td>
                <td>$2,000</td>
                <td>Paid</td>
                <td class="controlTd">
                    <div class="settingsIcons">
                        <span class="settingsIcon"><img src="http://i.imgur.com/nnzONel.png" alt="X" /></span>
                        <span class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></span>
                        <div class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></div>
                    </div>
                </td>
            </tr>

        </table>

        <div id="sForm" class="sForm sFormPadding">
            <span class="button close"><img src="http://i.imgur.com/nnzONel.png" alt="X"  class="" /></span>
            <h2 class="title">Add a New Record</h2>
        </div>

        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>


    </div>

    <script type="text/javascript">
        $(".button").click(function () {
            $("#sForm").toggleClass("open");
        });

        $(".controlTd").click(function () {
            $(this).children(".settingsIcons").toggleClass("display");
            $(this).children(".settingsIcon").toggleClass("openIcon");
        });


    </script>


@stop