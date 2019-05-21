    @extends('layout.app')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        .font-color1
        {
            font-family: Andalus;
            color: snow;
            font-size: 14px;
        }
        .font-color2
        {
            font-family: Andalus;

            font-size: 14px;
        }
        .form-width
        {
            width: 234px;
        }
        .hcostume
        {
            height: 400px;
        }
    </style>
    {{--<watcher>--}}
    <script >
        $(document).ready(function(){
            $('#add_data').click(function(){
                $('#watcher_modal').modal('show');
                $('#watchman_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
            });

            $('#watchman_form').on('submit', function(event){
                event.preventDefault();

                var form_data = {
                    'watchman'              : $('input[name=watchman]').val(),
                    'bday'             : $('input[name=bday]').val(),
                    'sex'    : $('select[name=sex]').val(),
                    'contact'    : $('input[name=contact]').val(),
                    'address'    : $('input[name=address]').val(),
                };

                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    url:"{{route('production.postdata')}}",
                    type:"POST",
                    data:form_data,
                    dataType:"json",
                    success:function(data)
                    {
                        if(data.error > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error; count++)
                            {
                                error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                            }
                            $('#form_output').html(error_html);


                        }
                        else
                        {
                            $('#form_output').html(data.success);
                            $("#watchman_form").trigger( "reset" );
                            $('#button_action').val('insert');
                            $('#watcher_modal').modal('toggle');
                            $('#watchman_id').append(data.append_to);
                        }


                    },
                })
                return false
            });

        });
    </script>
    <span class="align-content-lg-center" id="prod_output"></span>
    <div class="font-color1 card-title">

        <center><h3>EGG PRODUCTION</h3></center>
        @if(count($errors) > 0)
            <div class="alert alert-danger">

                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach

            </div>
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

    </div>
    <table class="">
        <tbody>
        <tr>
            <td width="320px">
                <form id="prodform" class="font-color1" method="post" action="{{route('production.prod_data')}}">
                    {{csrf_field()}}
                    <label>WATCHMAN -</label><br>

                    <div class="form-group" id="watchman" name="watchman">
                        <select id="watchman_id" name="watchman_id" class="form-control-sm form-width">

                            <option>SELECT WATCHMAN</option>
{{--                            @foreach($production as $watchman)--}}
                                {{--<option value="{{$watchman->watchman_id}}">{{$watchman->watchman}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                        <button class="btn btn-sm btn-outline-success" type="button" id="add_data"><span class="fa fa-user-plus" aria-hidden="true"></span></button>
                    </div>

                    <div class="form-group">
                        <label>DATE -</label><br>
                        <input type="date" name="date" class="form-control-sm">
                    </div>

                    <div class="form-group">
                        <label>NO. OF TRAYS -</label><br>
                        <input type="number" name="trays_count" class="form-control-sm">
                    </div>

                    <div class="form-group">
                        <label>NO. PIECES -</label><br>
                        <input type="number" name="pieces" class="form-control-sm">
                    </div>

                    <div class="form-group">
                        <label>NO. CRACKS -</label><br>
                        <input type="number"  name="cracks" class="form-control-sm">
                    </div>

                    <div class="form-group">
                        <label>NO. MORTALITY -</label><br>
                        <input type="number"  name="mortality"  class="form-control-sm">
                    </div>

                    <div class="form-group">
                        <label>REMARKS -</label><br>
                        <input type="text"  name="description" class="form-control-sm">
                    </div>

                    <div id="error"></div>

                    <button class="btn btn-outline-success form-control-sm" type="submit" id="submit" value="insert">SUBMIT <span class="fa fa-send-o"></span></button>
                </form>
            </td>
            <td class="">
                <br>
                <br>
                <br>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner card bg-dark">
                        <div class="carousel-item active">
                            <img class="d-block w-100 hcostume" src="{{URL::asset('/image/cafe_racer_tmx_155.jpg ')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 hcostume" src="{{URL::asset('/image/cafe_racer_yamaha.jpg ')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 hcostume" src="{{URL::asset('/image/ducati_cafe_racer_slide_3.jpg ')}}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <br>


                <a href="/egg_production"><button class="btn btn-outline-success pull-right">VIEW OF ALL PRODUCTION  <span class="fa fa-list"></span></button></a>
            </td>
        </tr>
        </tbody>
    </table>

    <br>
    <br>
    <br>
    <br>

    {{--MODAL--}}
    <div class="modal fade show font-color1" id="watcher_modal" role="dialog" style="background-color: rgba(0,0,0,0.5)">

        <div class="modal-dialog">

            {{--MODAL CONTENT--}}

            <div class="modal-content"  style="background-color:#022140">
                <form  class="form-group font-color1" id="watchman_form">
                    <div class="modal-header">

                        <h3> WATCHER INFO</h3>
                        <span class="align-content-lg-center" id="form_output"></span>
                    </div>

                    <div class="modal-body" style="background-color:#265077">

                        {{csrf_field()}}


                        <div class="form-group">
                            <label>Full-name</label><br>
                            <input type="text"  name="watchman" id="fullname" class="form-control-sm">
                        </div>

                        <div class="form-group">
                            <label>Date of birth</label><br>
                            <input type="date"  name="bday" id="bday" class="form-control-sm">
                        </div>

                        <div class="form-group" id="watchman">
                            <select name="sex" class="form-control-sm form-width">
                                <option class="disabled"></option>
                                <option>Male</option>
                                <option>Female</option>

                            </select>


                        </div>

                        <div class="form-group">
                            <label>Contact</label><br>
                            <input type="number"  name="contact" id="contact" class="form-control-sm">
                        </div>

                        <div class="form-group">
                            <label>Address</label><br>
                            <input type="text"  name="address" id="address" class="form-control-sm">
                        </div>




                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" id="button_action" >submit</button>
                        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

@endsection


