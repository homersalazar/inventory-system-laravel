@extends('layout.app')

@section('content')
    <div class="container ps-5 ms-5">
        <form action="{{ route('rack.store') }}" method="POST">
            @csrf
            <div class="row mt-4">
                <div class="col-10 mt-3">
                    <h4><b>New Area</b></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="col-2 mt-2">
                        <label for="">Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="rack" id="rack"  class="form-control form-control-sm" required autocomplete="off" autofocus>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 p-4">
                    <button class="btn btn-primary btn-sm" id="submit" name="submit" type="submit">Save</button>
                    |
                    <a  href="{{ route('rack.index') }}" role="button" style="text-decoration: underline;"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
