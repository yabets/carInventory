@extends('layouts.dashboard')
@section('page_heading', 'Call Record')
@section('search_page','/index.php/callrecords/search')

@section('section')
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Date</td>
                <td>{{$call->created_at}}</td>
            </tr>
            <tr>
                <td>Buyer Name</td>
                <td>
                    <a href="/index.php/buyers/{{$call->buyer->id}}">
                        {{$call->buyer->Name}} - {{$call->buyer->Phone}}
                    </a>
                </td>
            </tr>
            <tr>
                <td>Found</td>
                <td> @if ($call->found == 1) yes @else no @endif </td>
            </tr>
            @if ($call->found == 1)
                <tr>
                    <td>Want to see</td>
                    <td> @if ($call->wantSee == 1) yes @else no @endif </td>
                </tr>
                <tr>
                    <td>Schedule</td>
                    <td>{{$call->schedule}}</td>
                </tr>
                <tr>
                    <td>Checked</td>
                    <td> @if ($call->checked == 1) yes @else no @endif </td>
                </tr>
                <tr>
                    <td>Seen</td>
                    <td> @if ($call->seen == 1) yes @else no @endif </td>
                </tr>
                <tr>
                    <td>Sold</td>
                    <td> @if ($call->sold == 1) yes @else no @endif </td>
                </tr>
                <tr class="info">
                    <th>Car</th>
                    <th></th>
                </tr>
                @foreach ($call->cars as $car)
                    <tr>
                        <td>Brand</td>
                        <td>
                            <a href="/index.php/cars/{{$car->id}}">{{$car->Brand}}</a>
                        </td>
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
                        <td>Owner Name</td>
                        <td><a href="/index.php/owners/{{$car->owner->id}}">{{$car->owner->Name}}</a></td>
                    </tr>
                    <tr>
                        <td>Owner Phone Number</td>
                        <td><a href="/index.php/owners/{{$car->owner->id}}">{{$car->owner->Phone}}</a></td>
                    </tr>
                @endforeach
            @else
                <tr class="info">
                    <th>Requested Car</th>
                    <th></th>
                </tr>
                @foreach ($call->requestedCars as $car)
                    <tr>
                        <td>Brand</td>
                        <td>
                            <a href="/index.php/requestedcars/{{$car->id}}">{{$car->Brand}}</a>
                        </td>
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
                @endforeach
            @endif

            <tr>
                <td><a href="/index.php/callrecords/{{$call->id}}/edit">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="/index.php/callrecords/{{$call->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@stop