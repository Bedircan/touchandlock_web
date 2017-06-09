<!--/**
* Created by PhpStorm.
* User: Can
* Date: 1.05.2017
* Time: 07:20
*/-->
@extends('layouts.master')

@section('content')
    <style type="text/css">
        .table {
            margin: 0 0 40px 0;
            width: 100%;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            display: table;
        }
        @media screen and (max-width: 580px) {
            .table {
                display: block;
            }
        }

        .row {
            display: table-row;
            background: #f6f6f6;
        }
        .row:nth-of-type(odd) {
            background: #e9e9e9;
        }
        .row.header {
            font-weight: 900;
            color: #ffffff;
            background: #ea6153;
        }
        .row.green {
            background: #27ae60;
        }
        @media screen and (max-width: 580px) {
            .row {
                padding: 8px 0;
                display: block;
            }
        }

        .cell {
            padding: 6px 12px;
            display: table-cell;
        }
        @media screen and (max-width: 580px) {
            .cell {
                padding: 2px 12px;
                display: block;
            }
        }

    </style>


    <br><br><br><br><br><br>
    <h1>Your Reservations</h1>
    <hr>
    <br>
    <div class="container">
        <div class="table">

            <div class="row header green">
                <div class="cell">Title</div>
                <div class="cell">Price   </div>
                <div class="cell">ID</div>
                <div class="cell">Reservation Key</div>
                <div class="cell">From</div>
                <div class="cell">To</div>
                <div class="cell">Status</div>
                <div class="cell">Manage</div>
            </div>

            @for($i = 0; $i < count($reservations); $i++)
            <div class="row">
                <div class="cell"><a href="{{'https://www.team-8.tk/details/'.$properties[$i]->id}}">{{$properties[$i]->title}}</a></div>
                <div class="cell">₺ {{$properties[$i]->price}}</div>
                <div class="cell">{{$reservations[$i]->id}}</div>
                <div class="cell">{{$reservations[$i]->unique_id}}</div>
                <div class="cell">{{$reservations[$i]->from}}</div>
                <div class="cell">{{$reservations[$i]->to}}</div>
                <div class="cell">{{$reservations[$i]->active == 1 ? 'ACTIVE' : 'PASSIVE'}}</div>
                <div class="cell"><a href="{{url('/account/reservations/delete')}}{{'?prop_id='.$properties[$i]->id}}{{'&reservation_id='.$reservations[$i]->id}}">Delete</a></div>
            </div>
            @endfor
        </div>

    </div>

    <script type="text/javascript" charset="utf-8">
        $(function(){
            //$('#keywords').tablesorter();
        });

        function fillTable(dataset) {
            $('#reservationsTable').datatable({
                data: dataset,
                "columnDefs": [
                    {
                        targets: [0],
                        visible: false,
                        searchable: false
                    }
                ],
                columns: [
                    {data: "id"},
                    {title: "Müşteri Kısa Adı", data: "name"},
                    {title: "Müşteri Ünvanı", data: "title"},
                    {title: "Durumu", data: "status"},
                    {title: "Sektörü", data: "industry"},
                    {title: "Tipi", data: "type"},
                    {
                        title: 'Commands',
                        defaultContent: "<button class='btn btn-primary btn-xs btn-tablo-guncelle'><i class='fa fa-pencil'>  Update</i>" +
                        "</button><button class='btn btn-danger btn-xs btn-tablo-sil' data-toggle='modal' href='#musteri_modal_sil'><i class='fa fa-trash-o '>  Delete</i></button>"
                    }
                ],

                "language": {
                    "lengthMenu": ' <select>' +
                    '<option value="10">10</option>' +
                    '<option value="30">30</option>' +
                    '<option value="50">50</option>' +
                    '<option value="100">100</option>' +
                    '<option value="200">200</option>' +
                    '<option value="500">500</option>' +
                    '<option value="1000">1000</option>' +
                    '<option value="-1">All</option>' +
                    '</select> Kayıt Görüntüle',
                    "sInfo": "Toplam \_TOTAL\_ sonuç arasından \_START\_ ile \_END\_ arasındaki sonuçlar gösteriliyor.",
                    "paginate": {
                        "next": "Next",
                        "previous": "Previous"
                    },
                    "emptyTable": "There is no reservation for you",
                    "sInfoEmpty": "Total 0 result from 0 to 0 showing."
                },

                fnCreatedRow: function (row, data, index) {


                    $(row).find('.btn-tablo-guncelle').on('click', function () {
                        showguncelle(data);
                    });

                    $(row).on('dblclick', function () {
                        showguncelle(data);
                    });

                    $(row).find('.btn-tablo-sil').on('click', function () {

                        $('#modal_delete_body').html(data['name'] + '   isimli müşteriyi silmek istediğinizden eminmisiniz?');
                        $('#modal_delete').on('click', function () {
                            $.ajax({
                                url: window.location + '/delete',
                                type: 'POST',
                                data: {'id': data['id'], 'type': data['type']},
                                success: function (data) {
                                    row.remove();
                                }
                            });
                            $('#musteri_modal_sil').modal('hide');

                        });
                    });
                }

            });
        }
    </script>



@stop