@extends('layout.app')
@section('content')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#transactionTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('egg_sales.getdata') }}",
                "columns":[
                    { "data": "date" },
                    { "data": "type" },
                    { "data": "amount" },
                    { "data": "No_trays" },
                    { "data": "last_name" },
                    { "data": "action", orderable:false, searchable: false}
                ]
            });

            $('#add_data').click(function(){
                $('#transactionModal').modal('show');
                $('#transactionForm')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
                $('.modal-title').text('Add Data');
            });

            $('#transactionForm').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url:"{{ route('egg_sales.postdata') }}",
                    method:"post",
                    data:form_data,
                    dataType:"json",
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                            }
                            $('#form_output').html(error_html);
                        }
                        else
                        {
                            $('#form_output').html(data.success);
                            $('#transactionForm')[0].reset();
                            $('#action').val('Add');
                            $('.modal-title').text('Add Data');
                            $('#button_action').val('insert');
                            $('#transactionTable').DataTable().ajax.reload();
                        }
                    }
                })
            });

            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $('#form_output').html('');
                $.ajax({
                    url:"{{route('egg_sales.fetchdata')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#first_name').val(data.first_name);
                        $('#last_name').val(data.last_name);
                        $('#student_id').val(id);
                        $('#studentModal').modal('show');
                        $('#action').val('Edit');
                        $('.modal-title').text('Edit Data');
                        $('#button_action').val('update');
                    }
                })
            });

        });
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





    <div class="container">

        <div class="card-header font-color3">
            SALES MONITORING

        </div>

            <div align="right">
                <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
            </div>
            <br />
            <table id="transactionTable" class="table table-bordered font-color1" style="width:100%">
                <thead class="font-color1 border-bottom bg-dark border-top">
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>No_trays</th>
                    <th>No_Pieces</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>

        <div id="transactionModal" class="modal fade show" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="transactionForm">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Data</h4>
                        </div>
                        <div class="modal-body">
                            {{csrf_field()}}
                            <span id="form_output"></span>
                            <div class="form-group">
                                <label>Enter First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="student_id" id="student_id" value="" />
                            <input type="hidden" name="button_action" id="button_action" value="insert" />
                            <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    @endsection
