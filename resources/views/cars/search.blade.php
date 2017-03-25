@extends('layouts.dashboard')
@section('page_heading','Cars')
@section('search_page','index.php/cars/search')

@section('section')

    <div class="col-sm-12">
        @section ('htable_panel_body')
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
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{$car->Brand}}</td>
                            <td>{{$car->Name}}</td>
                            <td>{{$car->Year}}</td>
                            <td>{{$car->Price}}</td>
                            <td>{{$car->Color}}</td>
                            <td>{{$car->Transmission}}</td>
                            <td>{{$car->Meri}}</td>
                            <td>
                                <button type="button" class="btn btn-success">View</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'htable'))
    </div>
            
@stop
