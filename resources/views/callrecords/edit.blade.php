@extends('layouts.dashboard')
@section('page_heading','Edit Call Record')
@section('search_page','/index.php/callrecords/search')

@section('section')

    {{ Form::model($call, array('route' => array('callrecords.update', $call->id), 'method' => 'PUT')) }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <h2 class="col-md-3">Buyer</h2>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Buyer Name</label>
                <input class="form-control" name="bname" value="{{$call->buyer->Name}}" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Phone</label>
                <input class="form-control" type="tel" pattern="^\d{10}$" name="phone" value="{{$call->buyer->Phone}}" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Alternative phone</label>
                <input class="form-control" type="tel" pattern="^\d{10}$" name="altPhone" value="{{$call->buyer->AltPhone}}" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Star</label>
                <input type="radio" name="star" value="1" @if($call->buyer->Star == 1) checked @endif disabled> 1
                <input type="radio" name="star" value="2" @if($call->buyer->Star == 2) checked @endif disabled> 2
                <input type="radio" name="star" value="3" @if($call->buyer->Star == 3) checked @endif disabled> 3
                <input type="radio" name="star" value="4" @if($call->buyer->Star == 4) checked @endif disabled> 4
                <input type="radio" name="star" value="5" @if($call->buyer->Star == 5) checked @endif disabled> 5
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Found</label>
                <input type="radio" id="f" name="found" value="1" @if($call->found == 1) checked @endif> Yes
                <input type="radio" id="nf" name="found" value="0" @if($call->found == 0) checked @endif> No
            </div>
        </div>
        <div class="row foundcar">
            <div class="form-group col-md-11">
                <label>Car</label>
                <select class="form-control " name="car_id">
                    @foreach($cars as $car)
                        <option value="{{$car->id}}" >{{$car->id}} -
                            {{$car->Brand}} - {{$car->Name}} - {{$car->Year}} -
                            {{$car->Color}} - {{$car->Price}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row ">
            <div class="form-group col-md-3 foundcar">
                <label>Want to See</label>
                <input type="radio" name="wantSee" value="1" @if($call->wantSee == 1) checked @endif> Yes
                <input type="radio" name="wantSee" value="0" @if($call->wantSee == 0) checked @endif> No
            </div>

            <div class="form-group col-md-3 foundcar">
                <label>schedule</label>
                <input type="datetime" name="schedule" value="{{$call->schedule}}">
            </div>
            <div class="form-group col-md-3 foundcar">
                <label>Checked</label>
                <input type="radio" name="checked" value="1" @if($call->checked == 1) checked @endif> Yes
                <input type="radio" name="checked" value="0" @if($call->checked == 0) checked @endif> No
            </div>
            <div class="form-group col-md-3 foundcar">
                <label>Seen</label>
                <input type="radio" name="checked" value="1" @if($call->seen == 1) checked @endif> Yes
                <input type="radio" name="checked" value="0" @if($call->seen == 0) checked @endif> No
            </div>
            <div class="form-group col-md-3 foundcar">
                <label>Sold</label>
                <input type="radio" name="sold" value="1" @if($call->sold == 1) checked @endif> Yes
                <input type="radio" name="sold" value="0" @if($call->sold == 0) checked @endif> No
            </div>
        </div>
        <hr />
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <hr />
@stop
