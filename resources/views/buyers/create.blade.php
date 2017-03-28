@extends('layouts.dashboard')
@section('page_heading','Create Buyer')
@section('search_page','/index.php/buyers/search')

@section('section')

    <form role="form" action="/index.php/buyers" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="tel" pattern="^\d{10}$" name="phone" placeholder="phone number">
                </div>
                <div class="form-group">
                    <label>Alternative phone</label>
                    <input class="form-control" type="tel" pattern="^\d{10}$" 1name="altPhone" placeholder="phone">
                </div>
                <div class="form-group">
                    <label>Star</label>
                    <input type="radio" name="star" value="1" checked>1
                    <input type="radio" name="star" value="2">2
                    <input type="radio" name="star" value="3">3
                    <input type="radio" name="star" value="4">4
                    <input type="radio" name="star" value="5">5
                </div>
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
