@extends('layouts.dashboard')
@section('page_heading', 'Parameters')

@section('section')
    {{ Form::model($param, array('route' => 'param.update', 'method' => 'PUT')) }}
        <div class="form-group">
            {{Form::label('Brand')}}
            {{Form::text('Brand', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('Name')}}
            {{Form::text('Name', null, array('class'=>'form-control'))}}
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
        <button type="submit" class="btn btn-primary">Update</button>
    <a href="/index.php/param/" ><button class = 'btn btn-success'>Cancel</button></a>
    </form>
@stop