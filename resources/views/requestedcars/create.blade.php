@extends('layouts.dashboard')
@section('page_heading','Create New Car Request')
@section('section')
    <form role="form" action="/requestedcars" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Brand</label>
                    <input class="form-control" name="brand" placeholder="brand">
                    <p class="help-block">Example Toyota, Mercedes-Benz, BMW</p>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="name">
                    <p class="help-block">Example Corolla, Hilux, Vitz, Platz, Yaris</p>
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input class="form-control" name="year" placeholder="year">
                    <p class="help-block">Example 1992, 2004, 2015 </p>
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <input class="form-control" name="color" placeholder="color">
                    <p class="help-block">Example black, silver, gray, red</p>
                </div>
                <div class="form-group">
                    <label>Price From</label>
                    <input class="form-control" name="pricefrom" placeholder="100,000">
                    <p class="help-block">Example 100,000 250,000 1,500,000</p>
                </div>
                <div class="form-group">
                    <label>Price To</label>
                    <input class="form-control" name="priceto" placeholder="200,000">
                    <p class="help-block">Example 100,000 250,000 1,500,000</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Transmission</label>
                    <input class="form-control" name="transmission" placeholder="transmission">
                    <p class="help-block">Example manual, automatic </p>
                </div>
                <div class="form-group">
                    <label>Plate</label>
                    <input class="form-control" name="plate" placeholder="plate">
                    <p class="help-block">Example new, old </p>
                </div>
                <div class="form-group">
                    <label>Meri</label>
                    <input class="form-control" name="meri" placeholder="Meri">
                    <p class="help-block">Example yezore, yalezore</p>
                </div>
                <div class="form-group">
                    <label>Mileage</label>
                    <input class="form-control" name="mileage " placeholder="100,000">
                    <p class="help-block">Example 100,000 250,000 959,900</p>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input class="form-control" name="status" value="available">
                    <p class="help-block">Example sold, available, not available </p>
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
