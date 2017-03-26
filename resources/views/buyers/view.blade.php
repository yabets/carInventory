@extends('layouts.dashboard')
@section('page_heading', 'Buyer')

@section('section')
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Name</td>
                <td>{{$buyer->Name}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$buyer->Phone}}</td>
            </tr>
            <tr>
                <td>Alt Phone</td>
                <td>{{$buyer->AltPhone}}</td>
            </tr>
            <tr>
                <td>Star</td>
                <td>{{$buyer->star}}</td>
            </tr>
            <tr>
                <td>Remark</td>
                <td>{{$buyer->Remark}}</td>
            </tr>
            <tr>
                <td><a href="/index.php/buyers/{{$buyer->id}}/edit">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="/index.php/buyers/{{ $buyer->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    {{--<table class="table table-hover">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>Brand</th>--}}
            {{--<th>Model Name</th>--}}
            {{--<th>Year</th>--}}
            {{--<th>Price</th>--}}
            {{--<th>Color</th>--}}
            {{--<th>Transmission</th>--}}
            {{--<th>Meri</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach ($owner->cars as $car)--}}

            {{--<tr>--}}
                {{--<td>{{$car->Brand}}</td>--}}
                {{--<td>{{$car->Name}}</td>--}}
                {{--<td>{{$car->Year}}</td>--}}
                {{--<td>{{$car->Price}}</td>--}}
                {{--<td>{{$car->Color}}</td>--}}
                {{--<td>{{$car->Transmission}}</td>--}}
                {{--<td>{{$car->Meri}}</td>--}}
                {{--<td>--}}
                    {{--<a href="/index.php/cars/{{$car->id}}">--}}
                        {{--<button type="button" class="btn btn-success">View</button>--}}
                    {{--</a>--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--<button type="button" class="btn btn-primary">Edit</button>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}

        {{--</tbody>--}}
    {{--</table>--}}
@stop