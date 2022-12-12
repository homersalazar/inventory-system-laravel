@php $bread = "Remove from Existing"; @endphp
@extends('layout.app')
@section('content')
    @include('layout.breadcrumb')
    <div class="card mb-5">
        <div class="card-header">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="text-center">{{ $message }}</p>
                    </div>
                @endif
                <form method="post" action="{{ route('remove_quantity') }}" enctype="multipart/form-data">
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
                            <input type="radio" id="New_Stock" name="transaction" class="mt-2" value="New Stock" checked="checked"> Customer Sale<br/>
                            <input type="radio" id="Usable_Return" name="transaction"  class="mt-3" value="Usable Return"> Damaged Stock<br/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-end">
                            <label for="">Quantity</label>
                        </div>
                        <div class="col-3">
                            <input type="number" name="qty" id="qty" class="form-control form-control-sm" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="row mt-2" id="showDiv">
                        <div class="col-2 text-end">
                            <label for="">Unit Cost (&#8369;)</label>
                        </div>
                        <div class="col-3">
                            <input type="number" name="UC" id="UC" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2 text-end">
                            <label for="">Issued To</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="issued_to" name="issued_to" class="form-control form-control-sm" autocomplete="off" placeholder="J.DELA CRUZ">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2 text-end">
                            <label for="">Remarks</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="notes" name="notes" class="form-control form-control-sm" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-4 mb-2">
                        <div class="col-4 ">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm shadow">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
