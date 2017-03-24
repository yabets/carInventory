@extends('layouts.dashboard')
@section('page_heading','Cars')
@section('search_page','/index.php/cars/search')

@section('filters')
    <form class="form-inline" >
        <div class="jumbotron form-inline">
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Brand</label>
                    <input class="form-control" name="brand" placeholder="brand">
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="name">
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Year</label>
                    <input class="form-control" name="year" placeholder="year">
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-lg-5">
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" name="priceFrom" placeholder="100000">
                    <label> - </label>
                    <input class="form-control" name="priceTo" placeholder="400000">
                </div>
            </div>
            {{--col-lg-6--}}

            <p class="clearfix"></p>

            <div class="col-lg-2">
                <div class="form-group">
                    <label>Color</label>
                    <input class="form-control" name="color" placeholder="color">
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Transmission</label>
                    <input class="form-control" name="transmission" placeholder="Transmission">
                </div>
            </div>
            {{--col-lg-2--}}

            <div class="col-lg-2">
                <div class="form-group">
                    <label for="meri">Meri</label>
                    <select class="form-control" id="meri" name="meri">
                        <option></option>
                        <option>yalezore</option>
                        <option>yezore</option>
                    </select>
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option></option>
                        <option>avaliable</option>
                        <option>unavalible</option>
                        <option>sold</option>
                    </select>
                    <input class="form-control" name="status" placeholder="Status">
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Owner</label>
                    <input class="form-control" name="owner" placeholder="Owner">
                </div>
            </div>
            {{--col-lg-2--}}

            <p class="clearfix"></p>

            <div class="col-lg-4 col-offset-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
@endsection
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
