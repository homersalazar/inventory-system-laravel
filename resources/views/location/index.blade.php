@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <div class="row mt-3">
            <div class="col-10">
                <h4><b>Manage Locations</b></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-2 mt-2">
                <a class="btn btn-primary btn-sm" href="{{ route('branch.create') }}" role="button">Add New Location</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Street Address</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Zip</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->branch }}</td>
                                <td>{{ $row->street }}</td>
                                <td>{{ $row->city }}</td>
                                <td>{{ $row->states }}</td>
                                <td>{{ $row->zip }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn fa fa-cog dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{ route('branch.edit',$row->id) }}">Edit</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- </div> --}}
        <div class="row mt-2">
            <div class="col-10">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary btn-sm" href="{{ route('branch.create') }}" role="button">Add New Location</a>
                </div>
            </div>
        </div>
    </div>
@endsection
