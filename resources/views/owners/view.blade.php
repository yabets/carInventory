@extends('layouts.dashboard')
@section('page_heading', 'Car')

@section('section')
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Name</td>
                <td>{{$owner->Name}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$owner->Phone}}</td>
            </tr>
            <tr>
                <td>Alt Phone</td>
                <td>{{$owner->AltPhone}}</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>
                    @if ($owner->Owner === 1)
                        Owner
                    @else
                        Agent
                    @endif
                </td>
            </tr>
            <tr>
                <td>Remark</td>
                <td>{{$owner->Remark}}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Brand</th>
            <th>Model Name</th>
            <th>Year</th>
            <th>Price</th>
            <th>Color</th>
            <th>Transmission</th>
            <th>Meri</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($owner->cars as $car)

            <tr>
                <td>{{$car->Brand}}</td>
                <td>{{$car->Name}}</td>
                <td>{{$car->Year}}</td>
                <td>{{$car->Price}}</td>
                <td>{{$car->Color}}</td>
                <td>{{$car->Transmission}}</td>
                <td>{{$car->Meri}}</td>
                <td>
                    <a href="/index.php/cars/{{$car->id}}">
                        <button type="button" class="btn btn-success">View</button>
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop