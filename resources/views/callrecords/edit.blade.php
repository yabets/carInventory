@extends('layouts.dashboard')
@section('page_heading','Edit Call Record')
@section('search_page','/index.php/callrecords/search')

@section('section')
    <?php
        $params = App\Param::first();
        $brands = explode(",", $params->Brand);
        //        $names = explode(",", $params->Name);
        $types = explode(",", $params->Type);
        $colors = explode(",", $params->Color);
        $status = explode(",", $params->Status);
        $transmissions = explode(",", $params->Transmission);
    ?>
    <script>
        $(document).ready(function(){
            $('#brand').change(function(){
                selBrand = $('#brand :selected').val();
                url = "/index.php/param/" + selBrand;
                $.get(url, function(data){
                    var res = data.split(",");
                    html = "<option></option>";
                    for(var key in res) {
                        html += "<option value=" + res[key]  + ">" +res[key] + "</option>"
                    }
                    $("#name").find('option').remove().end().append(html);
                });
            });
            $('#brandNew').change(function(){
                selBrand = $('#brand :selected').val();
                url = "/index.php/param/" + selBrand;
                $.get(url, function(data){
                    var res = data.split(",");
                    html = "<option></option>";
                    for(var key in res) {
                        html += "<option value=" + res[key]  + ">" +res[key] + "</option>"
                    }
                    $("#nameNew").find('option').remove().end().append(html);
                });
            });
        });
    </script>

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
    @if($call->found == 1)
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
                <input type="radio" name="seen" value="1" @if($call->seen == 1) checked @endif> Yes
                <input type="radio" name="senn" value="0" @if($call->seen == 0) checked @endif> No
            </div>
            <div class="form-group col-md-3 foundcar">
                <label>Sold</label>
                <input type="radio" name="sold" value="1" @if($call->sold == 1) checked @endif> Yes
                <input type="radio" name="sold" value="0" @if($call->sold == 0) checked @endif> No
            </div>
        </div>
    @endif
        <hr />
    @if($call->found == 0)
        @foreach($call->requestedCars as $car)
            <input hidden name="requestedId" value="{{$car->id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Brand</label>
                    <select class="form-control" id="brand" name="brand">
                        <option value="{{$car->Brand}}" selected="selected">{{$car->Brand}}</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand}}" >{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <select class="form-control" id="name" name="name">
                        <option value="{{$car->Name}}" selected="selected">{{$car->Name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <select class="form-control" id="year" name="year">
                        <option value="{{$car->Year}}" selected="selected">{{$car->Year}}</option>
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
                <div class="form-group">
                    <label>Color</label>
                    <select class="form-control" id="color" name="color">
                        <option value="{{$car->Color}}" selected="selected">{{$car->Color}}</option>
                        @foreach($colors as $color)
                            <option value="{{$color}}" >{{$color}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Price From</label>
                    {{Form::number('pricefrom', $car->PriceFrom, array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    <label>Price To</label>
                    {{Form::number('priceto', $car->PriceTo, array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Transmission</label>
                    <input type="radio" name="transmission" value="{{$car->Transmission}}" checked>{{$car->Transmission}}
                    @foreach($transmissions as $transmission)
                        <input type="radio" name="transmission" value="{{$transmission}}">{{$transmission}}
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Plate</label>
                    {{Form::text('priceto', $car->PriceTo, array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    <label>Meri</label>
                    <input type="radio" name="meri" value="yalezore" @if($car->Meri == "yalezore") checked @endif>yalezore
                    <input type="radio" name="meri" value="yezore" @if($car->Meri == "yezore") checked @endif>yezore
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="radio" value="{{$car->Status}}" selected="selected" checked>{{$car->Status}}
                    @foreach($status as $statu)
                        <input type="radio" name="status" value="{{$statu}}" >{{$statu}}
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Remark</label>
                    <textarea class="form-control" rows="3" name="remark"></textarea>
                </div>
            </div>
        </div>
        @endforeach
        @if ($call->requestedCars->isEmpty())
            <input hidden name="requestedNew" value="1">
            <div class="row nofound">
                <h2 class="col-md-3">Requested Car</h2>
            </div>
            <div class="row nofound">
                <div class="form-group col-md-2">
                    {{ Form::label('brand', 'Brand') }}
                    <select class="form-control" id="brandNew" name="brandNew">
                        <option></option>
                        @foreach($brands as $brand)
                            <option value="{{$brand}}" >{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="name">Name</label>
                    <select class="form-control" id="nameNew" name="nameNew">
                        <option></option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="year">Year</label>
                    <select class="form-control" id="year" name="yearNew">
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
                    <select class="form-control" id="color" name="colorNew">
                        @foreach($colors as $color)
                            <option value="{{$color}}" >{{$color}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="transmission">Transmission</label>
                    @foreach($transmissions as $transmission)
                        <input type="radio" name="transmissionNew" value="{{$transmission}}">{{$transmission}}
                    @endforeach
                </div>
            </div>
            <div class="row nofound">
                <div class="form-group col-md-4">
                    <label>Price</label>
                    <input  name="priceFromNew" placeholder="100000">
                    <label> - </label>
                    <input  name="priceToNew" placeholder="400000">
                </div>
                <div class="form-group col-md-3">
                    <label>Plate</label>
                    <input name="plate" placeholder="plateNew">
                </div>
                <input name="status" hidden value="not found" >
                <div class="form-group col-md-2">
                    <label>Meri</label>
                    <input type="radio" name="meriNew" value="yalezore" checked> yalezore
                    <input type="radio" name="meriNew" value="yezore"> yezore
                </div>
            </div>
        @endif
    @endif
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <hr />
@stop
