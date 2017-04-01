@extends('layouts.dashboard')
@section('page_heading', 'Parameters')

@section('section')
    <script>
        $(document).ready(function(){
            $('#target').change(function(){
                selBrand = $('#target :selected').val();
                url = "/index.php/param/" + selBrand;
                $.get(url, function(data){
                    $("#modelName").val(data);
                });
            });
            $('#update').click(function () {
                var brand = $('#target :selected').val();
                var name = $('#modelName').val();
                console.log(name);
                $.ajax({
                    method: "POST",
                    url: '/index.php/paramupdate/',
                    data: {brand: brand, name: name},
                    success: function(data){ console.log(data);},
                    error: function(e){
                        console.log(e);
                    }
                });
//                $.post("/index.php/paramupdate/", {brand: brand, name: name}, function(result){
//                    console.log(result);
//                });
            });
        });
    </script>
    <form role="form" action="/index.php/params/" method="post">
{{--    {{ Form::model($car, array('route' => array('cars.update', $car->id), 'method' => 'PUT', 'files' => true)) }}--}}
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    <input type="hidden" name="_method" value="PATCH">
{{--    {{ Form::model($param, array('route' => 'param.update', 'method' => 'PUT')) }}--}}
        <div class="form-group">
            {{Form::label('Brand')}}
            <select class="form-control" id="target" name="platetype">
                <option></option>
                <?php $brands = explode(",", $param->Brand);?>
                @foreach($brands as $brand)
                    <option value="{{$brand}}" >{{$brand}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{Form::label('Name')}}
            <input class="form-control" type="text" name="modelname" id="modelName">
            <input type="button" class="btn btn-primary" id="update" value="Update">
        </div>
        <div class="form-group">
            {{Form::label('Type')}}
            {{Form::text('Type', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('Plate Type')}}
            {{Form::text('PlateType', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('Color')}}
            {{Form::text('Color', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('Transmission')}}
            {{Form::text('Transmission', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('Status')}}
            {{Form::text('Status', null, array('class'=>'form-control'))}}
        </div>
        {{--<button type="submit" class="btn btn-primary">Update</button>--}}
    <a href="/index.php/param/" ><button class = 'btn btn-success'>Cancel</button></a>
    </form>
@stop