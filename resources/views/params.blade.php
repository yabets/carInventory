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
                    method: "GET",
                    url: '/index.php/paramupdate/',
                    data: {brand: brand, name: name},
                    success: function(data){ console.log(data);},
                    error: function(e){
                        console.log(e);
                    }
                });
            });
            $('#brandBtn').click(function(){
                var brand = $('#brandName').val();
                if(brand === ''){
                    return false;
                }
                console.log(brand);
                $.ajax({
                    method: "GET",
                    url: '/index.php/parambrand/',
                    data:{brand:brand},
                    success: function(data){console.log(data);},
                    error: function(e){console.log(e);}
                });
                location.reload();
            });
        });
    </script>

    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        <div class="form-group">
            <label>Brand</label>
            <select class="form-control" id="target" name="brand">
                <option></option>
                <?php $brands = explode(",", $param->Brand);?>
                @foreach($brands as $brand)
                    <option value="{{$brand}}" >{{$brand}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>New Brand</label>
            <input type="text" name="brandName" id="brandName">
            <input type="button" id="brandBtn" value="Add" class="btn btn-danger">
        </div>
        <div class="form-group">
            {{Form::label('Name')}}
            <input class="form-control" type="text" name="modelname" id="modelName">
            <input type="button" class="btn btn-primary" id="update" value="Update">
        </div>
        <hr />
    {{ Form::model($param, array('route' => 'param.update', 'method' => 'PUT')) }}
    <form action="/index.php/param" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
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
        <button type="submit" class="btn btn-primary">Update</button>
    <a href="/index.php/param/" ><button class = 'btn btn-success'>Cancel</button></a>
    </form>
@stop