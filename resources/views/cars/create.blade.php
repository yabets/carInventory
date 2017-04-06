@extends('layouts.dashboard')
@section('page_heading','Create Car')
@section('search_page','/index.php/cars/search')

@section('section')
    <?php
        $owners = \App\Owner::all();
        $params = \App\Param::first();
        $brands = explode(",", $params->Brand);
//        $names = explode(",", $params->Name);
        $types = explode(",", $params->Type);
    $platetypes = explode(",", $params->PlateType);
        $colors = explode(",", $params->Color);
        $status = explode(",", $params->Status);
        $transmissions = explode(",", $params->Transmission);
    ?>
    <script>
        $(document).ready(function(){
            $("#platetype").change(function(){
                if($("#platetype option:selected").text() == "new"){
                    console.log($("#platetype option:selected").text());
                    $("#plate").prop("disabled", true);
                }else{
                    $("#plate").prop("disabled", false);
                }
            });
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
        });
    </script>
    <form role="form" action="/index.php/cars" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('brand', 'Brand') }}
                    <select class="form-control" id="brand" name="brand" required>
                        <option></option>
                        @foreach($brands as $brand)
                            <option value="{{$brand}}" >{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <select class="form-control" id="name" name="name" required>
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Type</label>
                    <select class="form-control" id="name" name="type">
                        @foreach($types as $type)
                            <option value="{{$type}}" >{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
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
                <div class="form-group">
                    <label for="color">Color</label>
                    <select class="form-control" id="color" name="color">
                        @foreach($colors as $color)
                            <option value="{{$color}}" >{{$color}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" min="0" name="price" placeholder="100000" required>
                </div>

                <div class="form-group">
                    <label for="meri">Plate Type</label>
                    <select class="form-control" id="platetype" name="platetype">
                        @foreach($platetypes as $type)
                            <option value="{{$type}}" >{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Plate</label>
                    <input class="form-control" id="plate" name="plate" placeholder="plate" disabled>
                    <p class="help-block">Example AA-2-A-12345, OR-3-12345 </p>
                </div>

                <div class="form-group">
                    <label>Remark about the car</label>
                    <textarea class="form-control" rows="3" name="remark"></textarea>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <input class="form-control" type="file" name="image">Car image
                </div>
                <div class="form-group">
                    <label>Meri</label>
                    <input type="radio" name="meri" value="yalezore">yalezore
                    <input type="radio" name="meri" value="yezore">yezore
                </div>
                <div class="form-group">
                    <label for="transmission">Transmission</label>
                    @foreach($transmissions as $transmission)
                        <input type="radio" name="transmission" value="{{$transmission}}">{{$transmission}}
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Mileage</label>
                    <input class="form-control" type="number" min="0" name="mileage" placeholder="100,000">
                    <p class="help-block">Example 100,000 250,000 959,900</p>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    @foreach($status as $statu)
                        <input type="radio" name="status" value="{{$statu}}" >{{$statu}}
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input class="form-control" name="location" placeholder="location">
                    <p class="help-block">Example Kera, Saris, Bole, Piassa, Arat Kilo</p>
                </div>
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Existing Owner</a>
                        </li>
                        <li role="presentation">
                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">New Owner</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <label for="owner">Owner Name</label>
                            <select class="form-control" id="owner" name="owner_id">
                                @foreach ($owners as $owner)
                                    <option value="{{$owner->id}}">{{$owner->id}} - {{$owner->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div role="tabpanel" class="tab-pane " id="profile">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="oname" placeholder="name">
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
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('Post')}}
                    {{Form::radio('published', '0', true, array('class'=>'form-control'))}} unpublished
                    {{Form::radio('published', '1', false, array('class'=>'form-control'))}} published
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <hr>
@stop
