@extends('layouts.dashboard')
@section('page_heading','Create Car')
@section('section')
    <?php
        $owners = \App\Owner::all();
    ?>
    <script>
        $(document).ready(function () {
            var owners = JSON.parse('{!!json_encode($owners->toArray())!!}');
            for (var i = 0; i < owners.length; i++)
            {
                console.log(owners[i]["Name"]);
            }
        });
    </script>
    <form role="form" action="/index.php/cars" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select class="form-control" id="brand" name="brand">
                        <option value="Toyota">Toyota</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="BMW">BMW</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <select class="form-control" id="name" name="name">
                        <option value="Corolla">Corolla</option>
                        <option value="Hilux">Hilux</option>
                        <option value="Vitz">Vitz</option>
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
                        <option value="white">White</option>
                        <option value="silver">Silver</option>
                        <option value="black">Black</option>
                        <option value="grey">Grey</option>
                        <option value="blue">Blue</option>
                        <option value="red">Red</option>
                        <option value="brown">Brown</option>
                        <option value="green">Green</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" min="0" name="price" placeholder="100000">
                </div>

                <div class="form-group">
                    <label>Plate</label>
                    <input class="form-control" name="plate" placeholder="plate">
                    <p class="help-block">Example AA-2-A-12345, OR-3-12345 </p>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input class="form-control" name="location" placeholder="location">
                    <p class="help-block">Example Kera, Saris, Bole, Piassa, Arat Kilo</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Meri</label>
                    <input type="radio" name="meri" value="yalezore" checked>yalezore
                    <input type="radio" name="meri" value="yezore">yezore
                </div>
                <div class="form-group">
                    <label for="transmission">Transmission</label>
                    <input type="radio" name="transmission" value="manual" checked>manual
                    <input type="radio" name="transmission" value="automatic">automatic
                </div>
                <div class="form-group">
                    <label>Mileage</label>
                    <input class="form-control" type="number" min="0" name="mileage " placeholder="100,000">
                    <p class="help-block">Example 100,000 250,000 959,900</p>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="radio" name="status" value="available" checked>available
                    <input type="radio" name="status" value="unavailable">unavailable
                    <input type="radio" name="status" value="sold">sold
                </div>
                <div class="form-group">
                    <label for="owner">Owner</label>
                    <select class="form-control" id="owner" name="owner_id">
                        <option></option>
                        @foreach ($owners as $owner)
                            <option value="{{$owner->id}}">{{$owner->Name}}</option>
                        @endforeach
                        <option value="1">Abebe</option>
                    </select>
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
