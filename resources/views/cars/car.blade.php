@extends('layouts.dashboard')
@section('page_heading','Cars')
@section('search_page','/index.php/cars/search')

@section('filters')
    <?php

        $params = \App\Param::first();

        $brands = explode(",", $params->Brand);
        $names = explode(",", $params->Name);
        $types = explode(",", $params->Type);
        $platetypes = explode(",", $params->PlateType);
        $colors = explode(",", $params->Color);
        $status = explode(",", $params->Status);
        $transmissions = explode(",", $params->Transmission);
    ?>
    <form class="form-inline" role="form" action="/index.php/cars/filter" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="jumbotron form-inline">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select class="form-control" id="brand" name="brand">
                        <option></option>
                        @foreach($brands as $brand)
                            <option value="{{$brand}}" >{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name">Name</label>
                    <select class="form-control" id="name" name="name">
                        <option></option>
                        @foreach($names as $name)
                            <option value="{{$name}}" >{{$name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-md-2">
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" id="meri" name="type">
                        <option></option>
                        @foreach($types as $type)
                            <option value="{{$type}}" >{{$type}}</option>
                        @endforeach
                    </select>
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

            {{--2nd row --}}
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="color">Color</label>
                    <select class="form-control" id="color" name="color">
                        <option></option>
                        @foreach($colors as $color)
                            <option value="{{$color}}" >{{$color}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{--col-lg-2--}}
            <div class="col-md-3">
                <div class="form-group">
                    <label for="transmission">Transmission</label>
                    <select class="form-control" name="transmission">
                        <option></option>
                        @foreach($transmissions as $transmission)
                            <option value="{{$transmission}}">{{$transmission}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--col-lg-2--}}

            {{--col-lg-2--}}
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                        <option></option>
                        @foreach($status as $statu)
                            <option value="{{$statu}}" >{{$statu}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="owner">Owner</label>
                    <select class="form-control" id="owner" name="owner_id">
                        <option></option>
                        <?php
                        $fowners = \App\Owner::all();
                        ?>
                        @foreach ($fowners as $owner)
                            <option value="{{$owner->id}}">{{$owner->Name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--col-lg-2--}}
            <p class="clearfix"></p>
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
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Plate Type</label>
                    <select class="form-control" name="platetype">
                        <option></option>
                        @foreach($platetypes as $type)
                            <option value="{{$type}}" >{{$type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label>Year</label>
                    <input class="form-control" name="yearFrom" pattern="^\d{4}$">
                    <label> - </label>
                    <input class="form-control" name="yearTo" pattern="^\d{4}$">
                </div>
            </div>
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
            <table class="table table-hover" id="myTable">
                <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model Name</th>
                    <th>Type</th>
                    <th>Plate Type</th>
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
                            <td>{{$car->Type}}</td>
                            <td>{{$car->PlateType}}</td>
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
                                <a href="/index.php/cars/{{$car->id}}/edit">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{$cars->render()}}
        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'htable'))
            <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">

            <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>

    </div>
@stop
