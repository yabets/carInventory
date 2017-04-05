@extends('layouts.dashboard')
@section('page_heading','Buyers')
@section('search_page','/index.php/buyers/search')

@section('section')

    <div class="col-sm-12">
        @section ('htable_panel_body')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Alt Phone</th>
                    <th>Star</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($buyers as $buyer)
                        <tr>
                            <td>{{$buyer->Name}}</td>
                            <td>{{$buyer->Phone}}</td>
                            <td>{{$buyer->AltPhone}}</td>
                            <td>{{$buyer->Star}}</td>
                            <td>
                               <a href="/index.php/buyers/{{$buyer->id}}">
                                   <button type="button" class="btn btn-success">View</button>
                               </a>
                            </td>
                            <td>
                                <a href="/index.php/buyers/{{$buyer->id}}/edit">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{$buyers->render()}}
        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'htable'))
    </div>
            
@stop
