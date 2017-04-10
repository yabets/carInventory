@extends('layouts.dashboard')
@section('page_heading', 'Parameters')

@section('section')
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Brand</td>
                <td>{{$param->Brand}}</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>{{$param->Type}}</td>
            </tr>
            <tr>
                <td>Plate Type</td>
                <td>{{$param->PlateType}}</td>
            </tr>
            <tr>
                <td>Color</td>
                <td>{{$param->Color}}</td>
            </tr>
            <tr>
                <td>Transmission</td>
                <td>{{$param->Transmission}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{$param->Status}}</td>
            </tr>
            <tr>
                <td>
                    <a href="/index.php/paramedit">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                </td>
            </tr>

        </tbody>
    </table>

@stop