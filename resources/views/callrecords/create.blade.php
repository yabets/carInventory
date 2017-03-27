@extends('layouts.dashboard')
@section('page_heading','Create Call Record')
@section('section')

    <form role="form" action="/index.php/callrecords" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Name</label>
                <input class="form-control" name="name" placeholder="name">
            </div>
            <div class="form-group col-md-4">
                <label>Phone</label>
                <input class="form-control" type="tel" pattern="^\d{10}$" name="phone" placeholder="phone number">
            </div>
            <div class="form-group col-md-4">
                <label>Alternative phone</label>
                <input class="form-control" type="tel" pattern="^\d{10}$" 1name="altPhone" placeholder="phone">
            </div>
            <div class="form-group col-md-4">
                <label>Star</label>
                <input type="radio" name="star" value="1" checked>1
                <input type="radio" name="star" value="2">2
                <input type="radio" name="star" value="3">3
                <input type="radio" name="star" value="4">4
                <input type="radio" name="star" value="5">5
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Found</label>
                <input type="radio" name="found" value="1" checked> Yes
                <input type="radio" name="found" value="0"> No
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Car</label>
                <select class="form-control" name="car_id">
                    @foreach($cars as $car)
                        <option value="{{$car->id}}" >{{$car->id}} -
                            {{$car->Brand}} - {{$car->Name}} - {{$car->Year}} -
                            {{$car->Color}} - {{$car->Price}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label>Want to See</label>
                <input type="radio" name="wantSee" value="1" checked> Yes
                <input type="radio" name="wantSee" value="0"> No
            </div>
            <div class="form-group col-md-3">
                <label>schedule</label>
                <input type="datetime" name="schedule" value="1" checked>
            </div>
            <div class="form-group col-md-3">
                <label>Checked</label>
                <input type="radio" name="checked" value="1" checked> Yes
                <input type="radio" name="checked" value="0"> No
            </div>
            <div class="form-group col-md-3">
                <label>Sold</label>
                <input type="radio" name="sold" value="1" checked> Yes
                <input type="radio" name="sold" value="0"> No
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-9git add. ">
                <lable>Remark</lable>
                <input type="textreas" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@stop
