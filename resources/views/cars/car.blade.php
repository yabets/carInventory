@extends('layouts.dashboard')
@section('page_heading','Cars')
@section('section')

    <div class="col-sm-12">
        @section ('htable_panel_body')
            @include('widgets.table', array('class'=>'table-hover'))
        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'htable'))
    </div>
            
@stop
