@extends('layout.app')
@section('content')
    <style>
        .font-color3
        {
            font-family: Andalus;
            color: snow;
            font-size: 50px;
            text-align: center;
        }
        .font-color1
        {
            font-family: Andalus;
            color: snow;
            font-size: 20px;
        }
        .font-color2
        {
            font-family: Andalus;
            color: snow;
            font-size: 16px;
        }
        .form-width
        {
            width: 234px;
        }
        .hcostume
        {
            height: 450px;
            width: 500px;
        }
    </style>

    <div class="card-header border-bottom font-color3">
        GET STARTED
    </div>
<table>
    <tr>
        <td class="">
        </td>
        <td class="pull-right">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner card bg-dark">
                    <div class="carousel-item active">

                        <img class="d-block hcostume" src="{{URL::asset('/image/quotes/charge.jpg ')}}" alt="First slide">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block hcostume" src="{{URL::asset('/image/quotes/albert.jpg ')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block hcostume" src="{{URL::asset('/image/quotes/what_if.jpg ')}}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block hcostume" src="{{URL::asset('/image/quotes/happy.jpg ')}}" alt="fourth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block hcostume" src="{{URL::asset('/image/quotes/bloom.jpg ')}}" alt="fifth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block hcostume" src="{{URL::asset('/image/quotes/believe.png ')}}" alt="sixth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block hcostume" src="{{URL::asset('/image/quotes/arrow.jpg ')}}" alt="seventh slide">
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
        </td>
    </tr>
</table>

    @endsection
