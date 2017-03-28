@extends('layouts.dashboard')
@section('page_heading', 'Buyer')
@section('search_page','/index.php/buyers/search')

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

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Want to see</th>
            <th>Schedule</th>
            <th>Checked</th>
            <th>Buy</th>
            <th>Call At</th>
            <th>Car</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($buyer->callRecords as $call)
            <tr>
                <td> @if ($call->wantSee == 1) yes @else no @endif </td>
                <td>{{$call->schedule}}</td>
                <td> @if ($call->checked == 1) yes @else no @endif </td>
                <td> @if ($call->sold == 1) yes @else no @endif </td>
                <td>{{$call->created_at}}</td>
                <td>
                    @foreach ($call->cars as $car)
                        <a href="/index.php/cars/{{$car->id}}">
                            {{$car['Brand']}} -
                            {{$car['Name']}} -
                            {{$car['Year']}}
                        </a>
                    @endforeach
                </td>
                <td>
                    <a href="/index.php/callrecords/{{$call->id}}">
                        <button type="button" class="btn btn-success">View</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop