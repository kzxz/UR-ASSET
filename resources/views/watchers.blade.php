@extends('layout.app')
@section('content')
    <style>
        .font-color3
        {
            font-family: Andalus;
            color: snow;
            font-size: 30px;
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
            font-size: 18px;
        }
        .form-width
        {
            width: 234px;
        }
    </style>


        <div class="card-header border-bottom font-color3">
            WATCHERS
        </div>
        <table>
            <thead class="font-color1 border-bottom bg-dark">
            <th>NAME</th>
            <th>BIRTH DATE</th>
            <th>SEX</th>
            <th>CONTACT</th>
            <th>ADDRESS</th>

            </thead>
            <tbody class="font-color2">
            @foreach($watchman as $watchman)
            <tr class="list-group-item-action font-color2">
                    <td >{{$watchman->watchman}}</td>
                    <td>{{$watchman->bday}}</td>
                    <td>{{$watchman->sex}}</td>
                    <td>{{$watchman->contact}}</td>
                    <td>{{$watchman->address}}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    <div class="card-footer border-top"></div>

@endsection
