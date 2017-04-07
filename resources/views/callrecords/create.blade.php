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
//            $("#datepicker").datepicker();
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

            if($('#f2').is(':checked')) {
                $(".foundcar2").css('pointer-events', 'visible');
                $(".foundcar2").css('opacity', '1');
                $(".nofound2").css({'pointer-events':'none','opacity':'0.4'});
            }else{
                $(".foundcar2").css({'pointer-events':'none','opacity':'0.4'});
                $(".nofound2").css('pointer-events', 'visible');
                $(".nofound2").css('opacity', '1');
            }
            $("#f2").click(function () {
               $(".foundcar2").css('pointer-events', 'visible');
               $(".foundcar2").css('opacity', '1');
               $(".nofound2").css({'pointer-events':'none','opacity':'0.4'});
                $("#count").val(2);
            });
            $("#nf2").click(function () {
                $(".foundcar2").css({'pointer-events':'none','opacity':'0.4'});
                $(".nofound2").css('pointer-events', 'visible');
                $(".nofound2").css('opacity', '1');
                $("#count").val(2);
            });
//            $("#datepicker2").datepicker();
            $('#brand2').change(function(){
                selBrand = $('#brand2 :selected').val();
                url = "/index.php/param/" + selBrand;
                $.get(url, function(data){
                    var res = data.split(",");
                    html = "<option></option>";
                    for(var key in res) {
                        html += "<option value=" + res[key]  + ">" +res[key] + "</option>"
                    }
                    $("#name2").find('option').remove().end().append(html);
                });
            });

            if($('#f3').is(':checked')) {
                $(".foundcar3").css('pointer-events', 'visible');
                $(".foundcar3").css('opacity', '1');
                $(".nofound3").css({'pointer-events':'none','opacity':'0.4'});
            }else{
                $(".foundcar3").css({'pointer-events':'none','opacity':'0.4'});
                $(".nofound3").css('pointer-events', 'visible');
                $(".nofound3").css('opacity', '1');
            }
            $("#f3").click(function () {
               $(".foundcar3").css('pointer-events', 'visible');
               $(".foundcar3").css('opacity', '1');
               $(".nofound3").css({'pointer-events':'none','opacity':'0.4'});
                $("#count").val(3);
            });
            $("#nf3").click(function () {
                $(".foundcar3").css({'pointer-events':'none','opacity':'0.4'});
                $(".nofound3").css('pointer-events', 'visible');
                $(".nofound3").css('opacity', '1');
                $("#count").val(3);
            });
//            $("#datepicker3").datepicker();
            $('#brand3').change(function(){
                selBrand = $('#brand3 :selected').val();
                url = "/index.php/param/" + selBrand;
                $.get(url, function(data){
                    var res = data.split(",");
                    html = "<option></option>";
                    for(var key in res) {
                        html += "<option value=" + res[key]  + ">" +res[key] + "</option>"
                    }
                    $("#name3").find('option').remove().end().append(html);
                });
            });

        });
    </script>

    <form role="form" action="/index.php/callrecords" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_cars" id="count" value="1">
        <div class="row">
            <h2 class="col-md-3">Buyer</h2>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Buyer Name</label>
                <input class="form-control" name="bname" placeholder="name" required>
            </div>
            <div class="form-group col-md-4">
                <label>Phone</label>
                <input class="form-control" type="tel" pattern="^\d{10}$" name="phone" placeholder="phone number" required>
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
        <div class="row">
            <div class="form-group col-md-12">
                <label>Remark</label>
                <textarea class="form-control" rows="2" name="remark"></textarea>
            </div>
        </div>

        {{--

            the first car

        --}}
        <hr/>
        <h1 data-toggle="collapse" data-target="#1">Car 1</h1>
        <hr/>
        <div id="1" class="collapse">
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
                    <input type="date" name="schedule" id="datepicker">
                </div>
                <div class="form-group col-md-3 foundcar">
                    <label>Checked</label>
                    <input type="radio" name="checked" value="1"> Yes
                    <input type="radio" name="checked" value="0" checked> No
                </div>
                <div class="form-group col-md-3 foundcar">
                    <label>Seen</label>
                    <input type="radio" name="seen" value="1"> Yes
                    <input type="radio" name="seen" value="0" checked> No
                </div>
                <div class="form-group col-md-3 foundcar">
                    <label>Sold</label>
                    <input type="radio" name="sold" value="1"> Yes
                    <input type="radio" name="sold" value="0" checked> No
                </div>
            </div>
            <hr />
            <?php
                $brands = explode(",", $params->Brand);
                $names = explode(",", $params->Name);
                $types = explode(",", $params->Type);
                $colors = explode(",", $params->Color);
                $transmissions = explode(",", $params->Transmission);
            ?>
            <div class="row nofound">
                <h2 class="col-md-3">Requested Car</h2>
                </div>
            <div class="row nofound">
                <div class="form-group col-md-2">
                    {{ Form::label('brand', 'Brand') }}
                    <select class="form-control" id="brand" name="brand">
                        <option></option>
                        @foreach($brands as $brand)
                            <option value="{{$brand}}" >{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="name">Name</label>
                    <select class="form-control" id="name" name="name">
                        <option></option>
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
                <input name="status" hidden value="not found" >
                <div class="form-group col-md-2">
                    <label>Meri</label>
                    <input type="radio" name="meri" value="yalezore" checked> yalezore
                    <input type="radio" name="meri" value="yezore"> yezore
                </div>
            </div>
        </div>

        {{--

            the second car

        --}}
        <hr/>
        <h1 data-toggle="collapse" data-target="#2">Car 2</h1>
        <hr/>
        <div id="2" class="collapse">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Found</label>
                    <input type="radio" id="f2" name="found2" value="1"> Yes
                    <input type="radio" id="nf2" name="found2" value="0"> No
                </div>
            </div>
            <div class="row foundcar2">
                <div class="form-group col-md-11">
                    <label>Car</label>
                    <select class="form-control " name="car_id2">
                        @foreach($cars as $car)
                            <option value="{{$car->id}}" >{{$car->id}} -
                                {{$car->Brand}} - {{$car->Name}} - {{$car->Year}} -
                                {{$car->Color}} - {{$car->Price}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row foundcar2">
                <div class="form-group col-md-3">
                    <label>Want to See</label>
                    <input type="radio" name="wantSee2" value="1" checked> Yes
                    <input type="radio" name="wantSee2" value="0"> No
                </div>
                <div class="form-group col-md-3">
                    <label>schedule</label>
                    <input type="date" name="schedule2" id="datepicker2">
                </div>
                <div class="form-group col-md-3">
                    <label>Checked</label>
                    <input type="radio" name="checked2" value="1"> Yes
                    <input type="radio" name="checked2" value="0" checked> No
                </div>
                <div class="form-group col-md-3">
                    <label>Seen</label>
                    <input type="radio" name="seen2" value="1"> Yes
                    <input type="radio" name="seen2" value="0" checked> No
                </div>
                <div class="form-group col-md-3">
                    <label>Sold</label>
                    <input type="radio" name="sold2" value="1"> Yes
                    <input type="radio" name="sold2" value="0" checked> No
                </div>
            </div>

            <hr />
            <?php
                $brands = explode(",", $params->Brand);
                $names = explode(",", $params->Name);
                $types = explode(",", $params->Type);
                $colors = explode(",", $params->Color);
                $transmissions = explode(",", $params->Transmission);
            ?>
            <div class="row nofound2">
                <h2 class="col-md-3">Requested Car</h2>
                </div>
            <div class="row nofound2">
                <div class="form-group col-md-2">
                    {{ Form::label('brand', 'Brand') }}
                    <select class="form-control" id="brand2" name="brand2">
                        <option></option>
                        @foreach($brands as $brand)
                            <option value="{{$brand}}" >{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Name</label>
                    <select class="form-control" id="name2" name="name2">
                        <option></option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Year</label>
                    <select class="form-control" id="year2" name="year2">
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
                    <label>Color</label>
                    <select class="form-control" id="color2" name="color2">
                        @foreach($colors as $color)
                            <option value="{{$color}}" >{{$color}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Transmission</label>
                    @foreach($transmissions as $transmission)
                        <input type="radio" name="transmission2" value="{{$transmission}}">{{$transmission}}
                    @endforeach
                </div>
            </div>
            <div class="row nofound2">
                <div class="form-group col-md-4">
                    <label>Price</label>
                    <input  name="priceFrom2" placeholder="100000">
                    <label> - </label>
                    <input  name="priceTo2" placeholder="400000">
                </div>
                <div class="form-group col-md-3">
                    <label>Plate</label>
                    <input name="plate2" placeholder="plate">
                </div>
                <input name="status2" hidden value="not found" >
                <div class="form-group col-md-2">
                    <label>Meri</label>
                    <input type="radio" name="meri2" value="yalezore" checked> yalezore
                    <input type="radio" name="meri2" value="yezore"> yezore
                </div>
            </div>
        </div>


        {{--

            the third car

        --}}
        <hr/>
        <h1 data-toggle="collapse" data-target="#3">Car 3</h1>
        <hr/>
        <div id="3" class="collapse">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Found</label>
                    <input type="radio" id="f3" name="found3" value="1"> Yes
                    <input type="radio" id="nf3" name="found3" value="0"> No
                </div>
            </div>
            <div class="row foundcar3">
                <div class="form-group col-md-11">
                    <label>Car</label>
                    <select class="form-control " name="car_id3">
                        @foreach($cars as $car)
                            <option value="{{$car->id}}" >{{$car->id}} -
                                {{$car->Brand}} - {{$car->Name}} - {{$car->Year}} -
                                {{$car->Color}} - {{$car->Price}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row foundcar3">
                <div class="form-group col-md-3">
                    <label>Want to See</label>
                    <input type="radio" name="wantSee3" value="1" checked> Yes
                    <input type="radio" name="wantSee3" value="0"> No
                </div>
                <div class="form-group col-md-3">
                    <label>schedule</label>
                    <input type="date" name="schedule3" id="datepicker3">
                </div>
                <div class="form-group col-md-3">
                    <label>Checked</label>
                    <input type="radio" name="checked3" value="1"> Yes
                    <input type="radio" name="checked3" value="0" checked> No
                </div>
                <div class="form-group col-md-3">
                    <label>Seen</label>
                    <input type="radio" name="seen3" value="1"> Yes
                    <input type="radio" name="seen3" value="0" checked> No
                </div>
                <div class="form-group col-md-3">
                    <label>Sold</label>
                    <input type="radio" name="sold3" value="1"> Yes
                    <input type="radio" name="sold3" value="0" checked> No
                </div>
            </div>
            <hr />
            <?php
                $brands = explode(",", $params->Brand);
                $names = explode(",", $params->Name);
                $types = explode(",", $params->Type);
                $colors = explode(",", $params->Color);
                $transmissions = explode(",", $params->Transmission);
            ?>
            <div class="row nofound3">
                <h2 class="col-md-3">Requested Car</h2>
                </div>
            <div class="row nofound3">
                <div class="form-group col-md-2">
                    {{ Form::label('brand', 'Brand') }}
                    <select class="form-control" id="brand3" name="brand3">
                        <option></option>
                        @foreach($brands as $brand)
                            <option value="{{$brand}}" >{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Name</label>
                    <select class="form-control" id="name3" name="name3">
                        <option></option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Year</label>
                    <select class="form-control" id="year3" name="year3">
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
                    <label>Color</label>
                    <select class="form-control" id="color3" name="color3">
                        @foreach($colors as $color)
                            <option value="{{$color}}" >{{$color}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Transmission</label>
                    @foreach($transmissions as $transmission)
                        <input type="radio" name="transmission3" value="{{$transmission}}">{{$transmission}}
                    @endforeach
                </div>
            </div>
            <div class="row nofound3">
                <div class="form-group col-md-4">
                    <label>Price</label>
                    <input  name="priceFrom3" placeholder="100000">
                    <label> - </label>
                    <input  name="priceTo3" placeholder="400000">
                </div>
                <div class="form-group col-md-3">
                    <label>Plate</label>
                    <input name="plate3" placeholder="plate">
                </div>
                <input name="status3" hidden value="not found" >
                <div class="form-group col-md-2">
                    <label>Meri</label>
                    <input type="radio" name="meri3" value="yalezore" checked> yalezore
                    <input type="radio" name="meri3" value="yezore"> yezore
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <hr />
@stop
