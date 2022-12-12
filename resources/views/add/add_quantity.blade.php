@php $bread = "Add quantity"; @endphp
@extends('layout.app')
@section('content')
@include('layout.breadcrumb')
    <div class="card mb-2">
        {{-- <h5 class="card-header"><a class="btn btn-link fa fa-backward" href="{{ route('add.index') }}" role="button"></a>Add New</h5> --}}
        <div class="card-header">
            <div class="card-body">
                <form method="post" action="{{ route('add_quantity') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <a class="btn btn-link p-0 shadow-none" href="{{ route('add.show', $row->skus) }}" role="button"><h3>{{ ucwords($row->details) }}</h3></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>(ghecc{{ $row->skus }}) {{ $row->rack }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{ $row->branch }} has {{ $total }} in-stock</h5>
                        </div>
                    </div>
                    <input type="hidden" name="sku" id="sku" class="form-control form-control-sm" readonly value="{{ $row->skus }}">
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Transaction Date</label>
                        </div>
                        <div class="col-3">
                            <input type="date" name="date_in" id="date_in" class="form-control form-control-sm" value="<?php echo date("Y-m-d") ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Transaction</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" id="New_Stock" name="transaction" class="mt-2" value="New Stock" checked="checked"> New Stock<br/>
                            <input type="radio" id="Usable_Return" name="transaction"  class="mt-3" value="Usable Return"> Usable Return<br/>
                            <input type="radio" id="Unusable_Return" name="transaction"  class="mt-3" value="Unusable Return"> Unusable Return<br/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Quantity</label>
                        </div>
                        <div class="col-3">
                            <input type="number" name="quantity" id="quantity" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-3" id="showDiv">
                        <div class="col-2 text-end">
                            <label for="">Unit Cost (&#8369;)</label>
                        </div>
                        <div class="col-3">
                            <input type="number" name="UC" id="UC" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-3" id="showDiv1" style="display: none">
                        <div class="col-2 text-end">
                            <label for="">Unit Refund (&#8369;)</label>
                        </div>
                        <div class="col-3">
                            <input type="number" name="UR" id="UR" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Delivery Receipt #</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="drno" name="drno" class="form-control form-control-sm" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">MPR/PO #</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="mpr" name="mpr" class="form-control form-control-sm" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">End User</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="e_user" name="e_user" class="form-control form-control-sm" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-4 mb-1">
                        <div class="col-4 ">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm shadow">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
