@extends('layouts.dashboard')
@section('page_heading','Call Records')
@section('section')

    <div class="col-sm-12">
        @section ('htable_panel_body')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Buyer Name</th>
                    <th>Phone Number</th>
                    <th>Found</th>
                    <th>Want See</th>
                    <th>Schedule</th>
                    <th>Checked</th>
                    <th>Buy</th>
                    <th>Time</th>
                    <th>Car</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($calls as $call)
                    <?php $buyer = \App\Buyer::findOrFail($call->buyer_id); ?>
                    <tr>
                        <td>{{$call->buyer->Name}}</td>
                        <td>{{$call->buyer->Phone}}</td>
                        <td> @if ($call->found == 1) yes @else no @endif </td>
                        <td> @if ($call->wantSee == 1) yes @else no @endif </td>
                        <td>{{$call->schedule}}</td>
                        <td> @if ($call->checked == 1) yes @else no @endif </td>
                        <td> @if ($call->sold == 1) yes @else no @endif </td>
                        <td>{{$call->created_at}}</td>
                        <td>
                            @if($call->found == 1)
                                @foreach ($call->cars as $car)
                                    <a href="/index.php/cars/{{$car->id}}">
                                        {{$car['Brand']}} -
                                        {{$car['Name']}} -
                                        {{$car['Year']}}
                                    </a>
                                @endforeach
                            @else
                                @foreach ($call->requestedCars as $rCar)
                                    <a href="/index.php/requestedcars/{{$rCar->id}}">
                                        {{$rCar['Brand']}} -
                                        {{$rCar['Name']}} -
                                        {{$rCar['Year']}}
                                    </a>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a href="/index.php/callrecords/{{$call->id}}">
                                <button type="button" class="btn btn-success">View</button>
                            </a>
                        </td>
                        <td>
                            <a href="/index.php/callrecords/{{$call->id}}/edit">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'htable'))
    </div>

@stop