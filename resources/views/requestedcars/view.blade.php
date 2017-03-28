@extends('layouts.dashboard')
@section('page_heading', 'Requested Car')
@section('search_page','/index.php/callrecords/search')

@section('section')
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Brand</td>
                <td>{{$car->Brand}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$car->Name}}</td>
            </tr>
            <tr>
                <td>Year</td>
                <td>{{$car->Year}}</td>
            </tr>
            <tr>
                <td>Color</td>
                <td>{{$car->Color}}</td>
            </tr>
            <tr>
                <td>Transmission</td>
                <td>{{$car->Transmission}}</td>
            </tr>
            <tr>
                <td>Price From</td>
                <td>{{$car->PriceFrom}}</td>
            </tr>
            <tr>
                <td>Price To</td>
                <td>{{$car->PriceTo}}</td>
            </tr>
            <tr>
                <td>Plate</td>
                <td>{{$car->Plate}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{$car->Status}}</td>
            </tr>
            <tr>
                <td>Meri</td>
                <td>{{$car->Meri}}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{$car->created_at}}</td>
            </tr>
            <tr>
                 <td><a href="/index.php/requestedcars/{{$car->id}}/edit">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="/index.php/requestedcars/{{$car->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@stop