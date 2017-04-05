@extends('layouts.dashboard')
@section('page_heading','Requested Cars')
@section('search_page','/index.php/requestedcars/search')

@section('filters')
    <?php
        $params = \App\Param::first();
        $brands = explode(",", $params->Brand);
//        $names = explode(",", $params->Name);
        $types = explode(",", $params->Type);
        $colors = explode(",", $params->Color);
        $status = explode(",", $params->Status);
        $transmissions = explode(",", $params->Transmission);
    ?>
    <script>
        $(document).ready(function(){
            $('#brand').change(function(){
                selBrand = $('#brand :selected').val();
                url = "/index.php/param/" + selBrand;
                $.get(url, function(data){
                    var res = data.split(",");
                    html = "<option></option>";
                    for(var key in res) {
                        html += "<option value=" + res[key]  + ">" +res[key] + "</option>"
                    }
                    $("#name").find('option').remove().end().append(html);
                });
            });
        });
    </script>
    <form class="form-inline" role="form" action="/index.php/requestedcars/filter" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="jumbotron form-inline">
            <div class="col-lg-3">
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
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="name">Name</label>
                    <select class="form-control" id="name" name="name">
                        <option></option>
                    </select>
                </div>
            </div>
            {{--col-lg-2--}}
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="year">Year</label>
                    <select class="form-control" id="year" name="year">
                        <option></option>
                        <option value="1980">1980</option>
                        <option value="1981">1981</option>
                        <option value="1982">1982</option>
                        <option value="1983">1983</option>
                        <option value="1984">1984</option>
                        <option value="1985">1985</option>
                        <option value="1986">1986</option>
                        <option value="1987">1987</option>
                        <option value="1988">1988</option>
                        <option value="1989">1989</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
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
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="transmission">Transmission</label>
                    <select class="form-control" id="transmission" name="transmission">
                        <option></option>
                        @foreach($transmissions as $transmission)
                            <option value="{{$transmission}}">{{$transmission}}</option>
                        @endforeach
                    </select>
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
                        <option value="found">Found</option>
                        <option value="not found">Not Found</option>
                    </select>
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
                    <th>Price From</th>
                    <th>Price To</th>
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
                            <td>{{$car->PriceFrom}}</td>
                            <td>{{$car->PriceTo}}</td>
                            <td>{{$car->Color}}</td>
                            <td>{{$car->Transmission}}</td>
                            <td>{{$car->Meri}}</td>
                            <td>
                                <a href="/index.php/callrecords/{{$car->call_id}}">
                                    <button type="button" class="btn btn-info">Call Record</button>
                                </a>
                            </td>
                            <td>
                                <a href="/index.php/requestedcars/{{$car->id}}">
                                    <button type="button" class="btn btn-success">View</button>
                                </a>
                            </td>
                            <td>
                                <a href="/index.php/requestedcars/{{$car->id}}/edit">
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
    </div>


            
@stop
