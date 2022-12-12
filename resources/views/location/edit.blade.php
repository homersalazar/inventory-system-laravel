@extends('layout.app')

@section('content')
    <div class="container ms-5">
        <form action="{{ route('branch.update', $edit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row ms-5 mt-2">
                <div class="col-10 mt-4">
                    <h4 class="font-weight-bold">New Location</h4>
                </div>
            </div>
            <div class="row ms-5 mt-2">
                <div class="col-10">
                    <label for="">Name</label>
                </div>
            </div>
            <div class="row ms-5">
                <div class="col-3">
                    <input type="text" name="branch" id="branch" class="form-control form-control-sm" value="{{ $edit->branch }}" autocomplete="off" required autofocus>
                </div>
            </div>
            <div class="row  ms-5 mt-2">
                <div class="col-10">
                    <label for="">Street Address</label>
                </div>
            </div>
            <div class="row ms-5">
                <div class="col-3">
                    <input type="text" name="street" id="street" class="form-control form-control-sm" value="{{ $edit->street }}" autocomplete="off">
                </div>
            </div>
            <div class="row  ms-5 mt-2">
                <div class="col-10">
                    <label for="">City, State</label>
                </div>
            </div>
            <div class="row ms-5">
                <div class="col-3">
                    <input type="text" name="city" id="city" class="form-control form-control-sm" value="{{ $edit->city }}" autocomplete="off">
                </div>
                <div class="col-3">
                    <input type="text" name="states" id="states" class="form-control form-control-sm" value="{{ $edit->states }}" autocomplete="off">
                </div>
            </div>
            <div class="row  ms-5 mt-2">
                <div class="col-10">
                    <label for="">Zip</label>
                </div>
            </div>
            <div class="row ms-5">
                <div class="col-3">
                    <input type="text" name="zip" id="zip" class="form-control form-control-sm" value="{{ $edit->zip }}" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-10 p-4 ms-5">
                    <button class="btn btn-primary btn-sm" type="submit" name="submit" id="submit">Save</button>
                    |
                    <a  href="{{ route('branch.index') }}" role="button" style="text-decoration: underline;"> Cancel</a>
                </div>
            </div>
            <div class="row">
                <div class="col-10 p-4 ms-5">
                    <a class="btn btn-danger btn-sm shadow" href="{{ route('branch.show',$edit->id) }}" role="button">Delete Location</a>
                </div>
            </div>
        </form>
    </div>
@endsection
