@extends('layouts.dashboard')
@section('page_heading','Create Owner')
@section('section')

    <form role="form" action="/index.php/owners" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" name="phone" placeholder="phone number">
                </div>
                <div class="form-group">
                    <label>Alternative phone</label>
                    <input class="form-control" name="altPhone" placeholder="phone">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="radio" name="Owner" value="1" checked>owner
                    <input type="radio" name="Owner" value="0">agent
                <div class="form-group">
                    <label>Remark</label>
                    <textarea class="form-control" rows="3" name="remark"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <hr>
@stop
