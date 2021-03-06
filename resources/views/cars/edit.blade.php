@extends('layouts.dashboard')
@section('page_heading','Edit Car')
@section('search_page','/index.php/cars/search')

@section('section')
    {{--<form role="form" action="/index.php/cars/{{$car->id}}" method="post">--}}
    {{ Form::model($car, array('route' => array('cars.update', $car->id), 'method' => 'PUT', 'files' => true)) }}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{--<input type="hidden" name="_method" value="PATCH">--}}
    <?php
            $brands = explode(",", $params->Brand);
//            $names = explode(",", $params->Name);
            $types = explode(",", $params->Type);
            $platetypes = explode(",", $params->PlateType);
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
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('brand', 'Brand') }}
                    <select class="form-control" id="brand" name="brand">
                        @foreach($brands as $brand)
                            <option value="{{$brand}}" @if($car->Brand == $brand) selected @endif>{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <select class="form-control" id="name" name="name">
                        <option value="{{$car->Name}}" selected>{{$car->Name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Type</label>
                    <select class="form-control" id="name" name="type">
                        @foreach($types as $type)
                            <option value="{{$type}}" @if($car->Type == $type) selected @endif>{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <select class="form-control" id="year" name="year">
                        <option value="{{$car->Year}}" selected="selected">{{$car->Year}}</option>
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
                <div class="form-group">
                    <label for="color">Color</label>
                    <select class="form-control" id="color" name="color">
                        @foreach($colors as $color)
                            <option value="{{$color}}" @if($car->Color == $color) selected @endif>{{$color}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('price', 'Price')}}
                    {{Form::number('price', $car->Price, array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('plate', 'Plate')}}
                    {{Form::text('plate', $car->Plate, array('class'=>'form-control'))}}
                    <p class="help-block">Example AA-2-A-12345, OR-3-12345 </p>
                </div>
                <div class="form-group">
                    <label for="meri">Plate Type</label>
                    <select class="form-control" name="platetype">
                        @foreach($platetypes as $type)
                            <option value="{{$type}}" @if($car->PlateType == $type) selected @endif>{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('Location')}}
                    {{Form::text('location', $car->Location, array('class'=>'form-control'))}}
                    <p class="help-block">Example Kera, Saris, Bole, Piassa, Arat Kilo</p>
                </div>
                <div class="form-group">
                    {{Form::label('Remark')}}
                    {{Form::textarea('remark', $car->Remark, array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <img width="500px" height="500px" src="/public/uploads/images/{{$car->Image}}"/>
                    <input class="form-control" type="file" name="image">Car Image
                </div>
                <div class="form-group">
                    <label>Meri</label>
                    <input type="radio" name="meri" value="yalezore" @if($car->Meri == "yalezore") checked @endif>yalezore
                    <input type="radio" name="meri" value="yezore" @if($car->Meri == "yezore") checked @endif>yezore
                </div>
                <div class="form-group">
                    <label for="transmission">Transmission</label>
                    @foreach($transmissions as $transmission)
                        <input type="radio" name="transmission" value="{{$transmission}}" @if($car->Transmission == $transmission) checked @endif>{{$transmission}}
                    @endforeach
                </div>
                <div class="form-group">
                    {{Form::label('Mileage')}}
                    {{Form::number('mileage', $car->Mileage, array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    <label>Status</label>
                    @foreach($status as $statu)
                        <input type="radio" name="status" value="{{$statu}}" @if($car->Status == $statu) checked @endif>{{$statu}}
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="owner">Owner Name</label>
                    <select class="form-control" id="owner" name="owner_id">
                        @foreach ($owners as $owner)
                            <option value="{{$owner->id}}" @if($car->owner->id == $owner->id) selected @endif>{{$owner->Name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('Posted')}}
                    @if($car->published ==1)
                        <input type="radio" name="published" value="0"> not published
                        <input type="radio" name="published" value="1" checked> published
                    @else
                        <input type="radio" name="published" value="0" checked> not published
                        <input type="radio" name="published" value="1"> published
                    @endif
                </div>
                <div class="form-group">
                    {{Form::label('Count of post')}}
                    {{Form::number('counter', $car->counter, array('class'=>'form-control'))}}
                </div>
            </div>
        </div>
    {{ Form::submit('Update car', array('class' => 'btn btn-primary')) }}
    <a href="/index.php/cars/" ><button class = 'btn btn-success'>Cancel</button></a>
    {{ Form::close() }}
    <hr>
@stop
