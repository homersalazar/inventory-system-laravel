@php $bread = "Edit item"; @endphp
@extends('layout.app')
@section('content')
    @include('layout.breadcrumb')
    <div class="card mb-5">
        <div class="card-header">
            <div class="card-body">
                <form method="post" action="{{ route('add.update', $row->sku) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Part Name</label>
                        </div>
                        <div class="col-3">
                            <input type="text" name="part_name" id="part_name" value="{{ old('part_name') ?? ucwords($row->details) }}" class="form-control form-control-sm" required autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Part Number</label>
                        </div>
                        <div class="col-3">
                            <input type="text" name="part_no" id="part_no" value="{{ old('part_no') ?? ucwords($row->partno) }}" class="form-control form-control-sm" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Summary</label>
                        </div>
                        <div class="col-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="summary" value="{{ old('summary') ?? ucwords($row->partno) }}" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
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
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" {{ $area->rack  == $row->rack ? 'selected' : '' }}>{{ $area->rack }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Manufacturer</label>
                        </div>
                        <div class="col-3">
                            <select name="brand" id="brand" class="form-control form-control-sm">
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->brand  == $row->brand ? 'selected' : '' }}>{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Unit</label>
                        </div>
                        <div class="col-3">
                            <select name="unit" id="unit" class="form-control form-control-sm">
                                @foreach($units as $unit)
                                <option value="{{ $unit->id }}" {{ $unit->unit  == $row->unit ? 'selected' : '' }}>{{ $unit->unit }}</option>
                                @endforeach
                            </select>
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
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm shadow">Submit</button>
                            <button type="submit" name="deact" id="deact" class="btn btn-warning btn-sm shadow">Deactivate Item</button>
                            <button type="submit" name="del" id="del" class="btn btn-danger btn-sm shadow">Delete Item</button>
                            <button type="button" class="btn btn-danger btn-sm shadow">Cancel</button>
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

    </script>
@endsection
