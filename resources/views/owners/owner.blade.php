@extends('layouts.dashboard')
@section('page_heading','Owners')
@section('search_page','/owners/search')

@section('section')

    <div class="col-sm-12">
        @section ('htable_panel_body')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Alt Phone</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($owners as $owner)
                        <tr>
                            <td>{{$owner->Name}}</td>
                            <td>{{$owner->Phone}}</td>
                            <td>{{$owner->AltPhone}}</td>
                            <td>
                                @if ($owner->Owner === 1)
                                    Owner
                                @else
                                    Agent
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-success">View</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'htable'))
    </div>
            
@stop
