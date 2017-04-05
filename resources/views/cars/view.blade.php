@extends('layouts.dashboard')
@section('page_heading', 'Car')
@section('search_page','/index.php/cars/search')

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
                <td>Type</td>
                <td>{{$car->Type}}</td>
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
                <td>Price</td>
                <td>{{$car->Price}}</td>
            </tr>
            <tr>
                <td>Location</td>
                <td>{{$car->location}}</td>
            </tr>
            <tr>
                <td>Plate</td>
                <td>{{$car->Plate}}</td>
            </tr>
            <tr>
                <td>Plate Type</td>
                <td>{{$car->PlateType}}</td>
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
                <td>
                    @if ($car->published == 1)
                        yes
                    @else
                        no
                    @endif
                </td>
            </tr>
            <tr>
                <td>Number of posts</td>
                <td>{{$car->counter}}</td>
            </tr>
            <tr>
                <td>Owner Name</td>
                <td><a href="/index.php/owners/{{$car->owner->id}}">{{$car->owner->Name}}</a></td>
            </tr>
            <tr>
                <td>Remark</td>
                <td>{{$car->Remark}}</td>
            </tr>
            <tr>
                <td>Images</td>
                <td class="text-center">
                    <img class="img-rounded" width="400" height="400" src="/public/uploads/images/{{$car->Image}}"/>
                </td>
            </tr>
            <tr>
                <td><a href="/index.php/cars/{{$car->id}}/edit">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="/index.php/cars/{{$car->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>

@stop
