@extends('layout.app')

@section('content')
    <style>
        .bttn{
            width: 150px;
        }
    </style>
    <div class="row ">
        <div class="col-12 text-center mt-4 btn1">
            <a class="btn btn-success fa fa-plus shadow bttn" href="{{ route('add.index') }}" role="button"> Add</a>
            <a class="btn btn-danger fa fa-minus shadow bttn" href="{{ route('remove_index') }}" role="button"> Remove</a>
            <a class="btn btn-info fa fa-search shadow bttn" href="#" role="button"> Serial #</a>
            <a class="btn btn-lgiht fa fa-info shadow bttn" href="#" role="button"> Report</a>
        </div>
    </div>
@endsection
