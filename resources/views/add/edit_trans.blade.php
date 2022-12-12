@php $bread = "Edit transaction"; @endphp
@extends('layout.app')
@section('content')
    @include('layout.breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="">Transaction Date</label>
                            </div>
                            <div class="col-7">
                                <input type="date" name="datein" id="datein" class="form-control form-control-sm" value="<?php echo date("Y-m-d") ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-end">
                                <label for="">Quantity</label>
                            </div>
                            <div class="col-7">
                                <input type="number" name="qty" id="qty" class="form-control form-control-sm" autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-end">
                                <label for="">Unit Cost</label>
                            </div>
                            <div class="col-7">
                                <input type="number" name="unit_cost" id="unit_cost" class="form-control form-control-sm" autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-end">
                                <label for="">DR #</label>
                            </div>
                            <div class="col-7">
                                <input type="text" id="drno" name="drno" class="form-control form-control-sm" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-end">
                                <label for="">PO/MPR #</label>
                            </div>
                            <div class="col-7">
                                <input type="text" id="po" name="po" class="form-control form-control-sm" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-end">
                                <label for="">Remarks</label>
                            </div>
                            <div class="col-7">
                                <input type="text" id="remarks" name="remarks" class="form-control form-control-sm" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-end">
                                <button type="submit" name="save_unit" id="save_unit"  class="btn btn-primary btn-sm">Add Unit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
