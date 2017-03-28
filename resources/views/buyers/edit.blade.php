@extends('layouts.dashboard')
@section('page_heading','Edit Buyer')
@section('search_page','/index.php/buyers/search')

@section('section')

    {{ Form::model($buyer, array('route' => array('buyers.update', $buyer->id), 'method' => 'PUT')) }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{$buyer->Name}}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="tel" pattern="^\d{10}$" name="phone" value="{{$buyer->Phone}}">
                </div>
                <div class="form-group">
                    <label>Alternative phone</label>
                    <input class="form-control" type="tel" pattern="^\d{10}$" name="altPhone" value="{{$buyer->AltPhone}}">
                </div>
                <div class="form-group">
                    <label>Star</label>
                    <input type="radio" name="star" value="1" @if($buyer->Star == 1) checked @endif>1
                    <input type="radio" name="star" value="2" @if($buyer->Star == 2) checked @endif>2
                    <input type="radio" name="star" value="3" @if($buyer->Star == 3) checked @endif>3
                    <input type="radio" name="star" value="4" @if($buyer->Star == 4) checked @endif>4
                    <input type="radio" name="star" value="5" @if($buyer->Star == 5) checked @endif>5
                </div>
                <div class="form-group">
                    <label>Remark</label>
                    <textarea class="form-control" rows="3" name="remark">{{$buyer->Remark}}</textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <hr>
@stop
