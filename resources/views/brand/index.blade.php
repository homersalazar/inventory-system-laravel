@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <div class="row mt-3">
            <div class="col-10">
                <h4><b>Manage Manufacturer</b></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-2 mt-2">
                <a class="btn btn-primary btn-sm" href="{{ route('brand.create') }}" role="button">New Manufacturer</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td width="50%" class="text-center">{{ $row->brand }}</td>
                                <td width="50%">
                                    <div class="dropdown">
                                        <button class="btn fa fa-cog dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{ route('brand.edit', $row->id) }}">Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ route('brand_deact', $row->id) }}">Deactivate</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-10 ms-2">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-primary btn-sm" href="{{ route('brand.create') }}" role="button">New Manufacturer</a>
                |
                <a  href="#" role="button" id="show" style="text-decoration: underline;" onclick="myFunction()"> Show Inactive Manufacturers ({{ $sql }})</a>
                <a  href="#" role="button" id="hidden" style="text-decoration: underline; display: none;" onclick="myFunction()"> Hide Inactive Users</a>
            </div>
        </div>
        <div id="myDIV" style="display : none;" >
            <div class="row">
                <div class="col-12 mt-2 mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queries as $query)
                                <tr>
                                    <td width="50%" class="text-center">{{ $query->brand }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn fa fa-cog dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="{{ route('brand.edit', $query->id) }}">Edit</a></li>
                                                <li><a class="dropdown-item" href="{{ route('brand.show', $query->id) }}">Reactivate</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var z = document.getElementById("show");
            var y = document.getElementById("hidden");
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
@endsection
