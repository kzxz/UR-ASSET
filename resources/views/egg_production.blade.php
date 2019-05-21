@extends('layout.app')
@section('content')



    <script>
        $(document).ready(function(){

            fetch_production_data();

            function fetch_production_data(query = '')
            {
                $.ajax({
                    url:"{{ route('egg_production.action') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    },error:function (data) {
                        console.log(data)
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_production_data(query);
            });
        });
    </script>

    {{--PRINT--}}

    <script>

            $(document).ready(function () {
                $("#print_button").on('click' , function () {
                    $.print('#table_to_print')
                })
            })

    </script>


    <style>
        .font-color3
        {
            font-family: Andalus;
            color: #fffafa;
            font-size: 30px;
            text-align: center;
        }
        .font-color1
        {
            font-family: Andalus;
            color: #ffffff;
            font-size: 18px;
        }
        .font-x
        {
            font-family: Andalus;
            color: #000000;
            font-size: 15px;
        }
        .form-width
        {
            width: 234px;
        }

        @media print {

            table {
                width: 100% !important;
            }

            th {
                font-style: italic;
                border-top: 1px black solid !important;
                border-bottom: 1px black solid !important;
                color: black;
            }

            td {
                border-bottom: 1px black solid !important;
                color: black;
            }

        }

    </style>

        <div class="card-header font-color3">
            EGG PRODUCTIONS

        </div>
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control-sm" placeholder="Search Production Data" />
                <button id="print_button">Print </button>
            </div>

        <table class="" id="table_to_print"  style="width:99%; margin: 5.5px;">
            <div class="font-color1">Total Data : <span id="total_records"></span></div>

            <thead class="font-color1 border-bottom bg-dark border-top">
            <th>Watchman</th>
            <th>Date</th>
            <th>No. Of Trays</th>
            <th>No. Of Pieces</th>
            <th>No. Of Cracks</th>
            <th>No. Of Mortality</th>
            <th>REMARKS</th>
            <th></th>
            <th></th>

            </thead>
            <tbody class="">

            </tbody>
        </table>
        <div class="card-footer">
            <a href="/production" class="pull-right btn btn-outline-success">
                GO BACK
            </a>
        </div>


@endsection
