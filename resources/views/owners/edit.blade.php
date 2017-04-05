@extends('layouts.dashboard')
@section('page_heading','Edit Owner')
@section('search_page','/index.php/owners/search')

@section('section')

    {{--<form role="form" action="/index.php/owners" method="post">--}}

        {{ Form::model($owner, array('route' => array('owners.update', $owner->id), 'method' => 'PUT')) }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{$owner->Name}}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="tel" pattern="^\d{10}$" name="phone" value="{{$owner->Phone}}">
                </div>
                <div class="form-group">
                    <label>Alternative phone</label>
                    <input class="form-control" type="tel" pattern="^\d{10}$" name="altPhone" value="{{$owner->AltPhone}}">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="radio" name="Owner" value="1" @if($owner->Owner == 1) checked @endif>owner
                    <input type="radio" name="Owner" value="0" @if($owner->Owner == 0) checked @endif>agent
                </div>
                <div class="form-group">
                    <label>Remark</label>
                    <textarea class="form-control" rows="3" name="remark">{{$owner->Remark}}</textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <hr>
@stop
