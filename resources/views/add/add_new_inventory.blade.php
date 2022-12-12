@php $bread = "Add to Existing"; @endphp
@extends('layout.app')
@section('content')
@include('layout.breadcrumb')
    @extends('modals.modal')
    <div class="card mb-5">
        <h5 class="card-header"><a class="btn btn-link fa fa-backward shadow-none" href="{{ route('add.index') }}" role="button"></a>Add New</h5>
        <div class="card-header">
            <div class="card-body">
                <form method="post" action="{{ route('add.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-2 text-end">
                            <label for="">Sku</label>
                        </div>
                        <div class="col-3">
                            <input type="text" name="" id="" class="form-control form-control-sm" readonly placeholder="(Auto generated)">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Part Name</label>
                        </div>
                        <div class="col-3">
                            <input type="text" name="part_name" id="part_name" value="{{ old('part_name')  }}" class="form-control form-control-sm" required autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Part Number</label>
                        </div>
                        <div class="col-3">
                            <input type="text" name="part_no" id="part_no" class="form-control form-control-sm" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Summary</label>
                        </div>
                        <div class="col-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="summary" id="summary" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Remarks</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Area</label>
                        </div>
                        <div class="col-3">
                            <select name="rack" id="rack" class="form-control form-control-sm">
                                <option Selected disabled>Select Area</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->rack }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1 pe-0 me-0">
                            <button type="button" class="btn btn-outline-success btn-sm buttons fa fa-plus shadow" onclick="myArea()"></button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Manufacturer</label>
                        </div>
                        <div class="col-3">
                            <select name="brand" id="brand" class="form-control form-control-sm">
                                <option Selected disabled>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1 pl-0 ml-0">
                            <button type="button" class="btn btn-outline-success btn-sm buttons fa fa-plus shadow" onclick="myBrand()"></button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Unit</label>
                        </div>
                        <div class="col-3">
                            <select name="unit" id="unit" class="form-control form-control-sm">
                                <option Selected disabled>Select Unit</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1 pl-0 ml-0">
                            <button type="button" class="btn btn-outline-success btn-sm buttons fa fa-plus shadow" onclick="myUnit()"></button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label>Minimum Stock Count</label>
                        </div>
                        <div class="col-3">
                            <select name="ocs" id="ocs" class="form-control form-control-sm" onchange = "ShowHide()">
                                <option value="0">Use Company Setting</option>
                                <option value="1">Override Company Setting</option>
                                <option value="2">Disabled</option>
                            </select>
                        </div>
                        <div class="col-1 ml-1 p-0">
                            <input type="text" style="display: none" name="over" id="over" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="row mt-4 mb-2">
                        <div class="col-4 text-end">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm shadow">Save And Add Another</button>
                            <button type="reset" name="submit" id="submit" class="btn btn-secondary btn-sm shadow">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function ShowHide() {
            var x = document.getElementById("ocs");
            var y = document.getElementById("over");
            y.style.display = x.value == "1" ? "block" : "none";
        }
        $(function() {
            $("input[name='transaction']").click(function() {
                if ($("#New_Stock").is(":checked")) {
                    $("#showDiv").show();
                    $("#showDiv1").hide();
                }else if($("#Usable_Return").is(":checked")) {
                    $("#showDiv").hide();
                    $("#showDiv1").show();
                }else{
                    $("#showDiv").hide();
                    $("#showDiv1").show();
                }
            });
        })

        function myArea(){
            $('#myArea').modal('show');
            $('#myArea').on('shown.bs.modal', function () {
                $('#rack').focus();
            })
            $('#saveBtn').click(function (e) {
                $.ajax({
                    url:"{{ route('rack.store') }}",
                    type: "POST",
                    data:$('#areaForm').serialize(),
                    dataType: 'json',
                    success:function(data){
                        $('#myArea').modal('hide');
                        location.reload();
                    }
                });
            });
        }

        function myBrand(){
            $('#myBrand').modal('show');
            $('#myBrand').on('shown.bs.modal', function () {
                $('#brand').focus();
            })
            $('#saved').click(function (e) {
                $.ajax({
                    url:"{{ route('brand.store') }}",
                    type: "POST",
                    data:$('#brandForm').serialize(),
                    dataType: 'json',
                    success:function(data){
                        $('#myBrand').modal('hide');
                        location.reload();
                    }
                });
            });
        }

        function myUnit(){
            $('#myUnit').modal('show');
            $('#myUnit').on('shown.bs.modal', function () {
                $('#unit').focus();
            })
            $('#save_unit').click(function (e) {
                $.ajax({
                    url:"{{ route('unit.store') }}",
                    type: "POST",
                    data:$('#unitForm').serialize(),
                    dataType: 'json',
                    success:function(data){
                        $('#myUnit').modal('hide');
                        location.reload();
                    }
                });
            });
        }
    </script>
@endsection
