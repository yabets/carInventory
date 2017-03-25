@extends('layouts.dashboard')
@section('page_heading', 'Car')

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
                <td>Location</td>
                <td>{{$car->location}}</td>
            </tr>
            <tr>
                <td>Transmission</td>
                <td>{{$car->Transmission}}</td>
            </tr><tr>
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
                <td>Mileage</td>
                <td>{{$car->Mileage}}</td>
            </tr>

            <tr>
                <td>Posted</td>
                <td>{{$car->published}}</td>
            </tr>
            <tr>
                <td>Number of posts</td>
                <td>{{$car->counter}}</td>
            </tr>
            <tr>
                <td>Owner Name</td>
                <td>{{$car->owner->Name}}</td>
            </tr>
            <tr>
                <td>Remark</td>
                <td>{{$car->Remark}}</td>
            </tr>

        </tbody>
    </table>

@stop