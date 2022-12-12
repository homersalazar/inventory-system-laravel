@extends('layout.app')

@section('content')
    <div class="container ms-5">
        <form action="{{ route('brand.update', $edit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mt-4">
                <div class="col-10 mt-3">
                    <h4><b>New Manufacturer</b></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="col-2 mt-2">
                        <label for="">Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="brand" id="brand"  class="form-control form-control-sm" required autocomplete="off" value="{{ $edit->brand }}" autofocus>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 p-3">
                    <button class="btn btn-primary btn-sm" id="submit" name="submit" type="submit">Save</button>
                    |
                    <a  href="{{ route('brand.index') }}" role="button" style="text-decoration: underline;"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
