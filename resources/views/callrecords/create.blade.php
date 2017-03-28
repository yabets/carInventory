@extends('layouts.dashboard')
@section('page_heading','Create Call Record')
@section('search_page','/index.php/callrecords/search')

@section('section')
    <script>
        $(document).ready(function () {
            if($('#f').is(':checked')) {
                $(".foundcar").css('pointer-events', 'visible');
                $(".foundcar").css('opacity', '1');
                $(".nofound").css({'pointer-events':'none','opacity':'0.4'});
            }else{
                $(".foundcar").css({'pointer-events':'none','opacity':'0.4'});
                $(".nofound").css('pointer-events', 'visible');
                $(".nofound").css('opacity', '1');
            }
            $("#f").click(function () {
               $(".foundcar").css('pointer-events', 'visible');
               $(".foundcar").css('opacity', '1');
               $(".nofound").css({'pointer-events':'none','opacity':'0.4'});
            });
            $("#nf").click(function () {
                $(".foundcar").css({'pointer-events':'none','opacity':'0.4'});
                $(".nofound").css('pointer-events', 'visible');
                $(".nofound").css('opacity', '1');
            });
        });
    </script>

    <form role="form" action="/index.php/callrecords" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <h2 class="col-md-3">Buyer</h2>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Buyer Name</label>
                <input class="form-control" name="bname" placeholder="name">
            </div>
            <div class="form-group col-md-4">
                <label>Phone</label>
                <input class="form-control" type="tel" pattern="^\d{10}$" name="phone" placeholder="phone number">
            </div>
            <div class="form-group col-md-4">
                <label>Alternative phone</label>
                <input class="form-control" type="tel" pattern="^\d{10}$" name="altPhone" placeholder="phone">
            </div>
            <div class="form-group col-md-4">
                <label>Star</label>
                <input type="radio" name="star" value="1" checked> 1
                <input type="radio" name="star" value="2"> 2
                <input type="radio" name="star" value="3"> 3
                <input type="radio" name="star" value="4"> 4
                <input type="radio" name="star" value="5"> 5
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Found</label>
                <input type="radio" id="f" name="found" value="1" checked> Yes
                <input type="radio" id="nf" name="found" value="0"> No
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
                <input type="radio" name="wantSee" value="1" checked> Yes
                <input type="radio" name="wantSee" value="0"> No
            </div>
            <div class="form-group col-md-3 foundcar">
                <label>schedule</label>
                <input type="datetime" name="schedule" value="1" checked>
            </div>
            <div class="form-group col-md-3 foundcar">
                <label>Checked</label>
                <input type="radio" name="checked" value="1" checked> Yes
                <input type="radio" name="checked" value="0"> No
            </div>
            <div class="form-group col-md-3 foundcar">
                <label>Sold</label>
                <input type="radio" name="sold" value="1" checked> Yes
                <input type="radio" name="sold" value="0"> No
            </div>
        </div>
        <hr />
        <?php
            $brands = explode(",", $params->Brand);
            $names = explode(",", $params->Name);
            $types = explode(",", $params->Type);
            $colors = explode(",", $params->Color);
            $status = explode(",", $params->Status);
            $transmissions = explode(",", $params->Transmission);
        ?>
        <div class="row nofound">
            <h2 class="col-md-3">Requested Car</h2>
            </div>
        <div class="row nofound">
            <div class="form-group col-md-2">
                {{ Form::label('brand', 'Brand') }}
                <select class="form-control" id="brand" name="brand">
                    @foreach($brands as $brand)
                        <option value="{{$brand}}" >{{$brand}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="name">Name</label>
                <select class="form-control" id="name" name="name">
                    @foreach($names as $name)
                        <option value="{{$name}}" >{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="year">Year</label>
                <select class="form-control" id="year" name="year">
                    <option value="1980">1980</option>
                    <option value="1981">1981</option>
                    <option value="1982">1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="color">Color</label>
                <select class="form-control" id="color" name="color">
                    @foreach($colors as $color)
                        <option value="{{$color}}" >{{$color}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="transmission">Transmission</label>
                @foreach($transmissions as $transmission)
                    <input type="radio" name="transmission" value="{{$transmission}}">{{$transmission}}
                @endforeach
            </div>
        </div>
        <div class="row nofound">
            <div class="form-group col-md-4">
                <label>Price</label>
                <input  name="priceFrom" placeholder="100000">
                <label> - </label>
                <input  name="priceTo" placeholder="400000">
            </div>
            <div class="form-group col-md-3">
                <label>Plate</label>
                <input name="plate" placeholder="plate">
            </div>
            <div class="form-group col-md-3">
                <label>Status</label>
                @foreach($status as $statu)
                    <input type="radio" name="status" value="{{$statu}}" >{{$statu}}
                @endforeach
            </div>
            <div class="form-group col-md-2">
                <label>Meri</label>
                <input type="radio" name="meri" value="yalezore" checked> yalezore
                <input type="radio" name="meri" value="yezore"> yezore
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <hr />
@stop
