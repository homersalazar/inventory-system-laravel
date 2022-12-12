@php $bread = "Item"; @endphp
@extends('layout.app')
@section('content')
    @include('modals.modal')
    @include('layout.breadcrumb')
    <div class="row mb-3">
        <div class="col-9">
            <h4 class="ms-4">{{ ucwords($row->details) }} (GHECC-{{ $row->skus }})</h4>
        </div>
        <div class="col-1">
            <a type="button"  href="{{ route('edit_parts', $row->skus) }}" style="width: 80px" class="btn btn-outline-info btn-sm btn-block shadow">Edit Stock</a></button>
        </div>
        <div class="col-1">
            <a type="button"  href="{{ route('add.edit', $row->skus) }}" style="width: 80px" class="btn btn-outline-success btn-sm btn-block shadow">Stock In</a></button>
        </div>
        <div class="col-1">
        <a type="button"  href="{{ route('remove_edit', $row->skus) }}" style="width: 80px" class="btn btn-outline-danger btn-sm btn-block shadow">Stock Out</a></button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="panel">
                        <div class="row">
                            <div class="col-2 text-right">
                                <label class="font-weight-bold">Current Stock</label>
                            </div>
                            <div class="col-2">
                                {{ $total }} {{ $row->unit }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2  text-right">
                                <button type="button" class="btn btn-outline-warning btn-sm mt-2" onclick="trans_modal()">Transfer Inventory</button>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 text-right">
                                <label class="font-weight-bold">Total Cost(₱)</label>
                            </div>
                            <div class="col-2">
                                0.00
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2  text-right">
                                <label class="font-weight-bold">SKU</label>
                            </div>
                            <div class="col-2">
                                ghecc{{ $row->skus }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2  text-right">
                                <label class="font-weight-bold">Part #</label>
                            </div>
                            <div class="col-2">
                               {{ $row->partno }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2  text-right">
                                <label class="font-weight-bold">Brand</label>
                            </div>
                            <div class="col-2">
                                {{ $row->brand }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2  text-right">
                                <label class="font-weight-bold">Last Stock Out</label>
                            </div>
                            <div class="col-2">
                                date
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="tran-tab" data-bs-toggle="tab" data-bs-target="#tran" type="button" role="tab" aria-controls="home" aria-selected="true">Transaction</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">In Stock Chart</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="Quantity-tab" data-bs-toggle="tab" data-bs-target="#Quantity" type="button" role="tab" aria-controls="Quantity" aria-selected="false">Quantity Sold Chart</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tran" role="tabpanel" aria-labelledby="tran-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="transaction_table" class="table table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">DR #</th>
                                        <th scope="col">PO/ MPR #</th>
                                        <th scope="col">Unit Cost(₱)</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Cost(₱)</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sql as $rows)
                                        @php
                                        $unit_cost = $rows->unit_cost;
                                        $qty = $rows->quantity;
                                        $total = (int)$unit_cost * (int)$qty;

                                        $action = "";
                                        $reason = $rows->types;
                                        $quantities ="";
                                        if($reason == 0){
                                            $action = "Stock - New";
                                            $quantities = $qty;
                                        }elseif($reason == 1){
                                            $action = "Stock - Out";
                                            $quantities = -$qty;
                                        }elseif($reason == 2){
                                            $action = "Transfer - Out";
                                            $quantities = -$qty;
                                        }elseif($reason == 3){
                                            $action = "Transfer - In";
                                            $quantities = $qty;
                                        }
                                        @endphp
                                        <tr>
                                            <td>{{ $action }}</td>
                                            <td>{{ $rows->date_in }}</td>
                                            <td>{{ ucwords($rows->name) }}</td>
                                            <td>{{ $rows->branch }}</td>
                                            <td>{{ $rows->drno }}</td>
                                            <td>{{ $rows->mpr }}</td>
                                            <td>{{ number_format($rows->unit_cost,2) }}</td>
                                            <td>{{ $quantities }}</td>
                                            <td>{{ number_format($total,2) }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle fa fa-cog" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                      <li><a class="dropdown-item editbtn" value="{{ $rows->id }}" onclick="transfer()">Edit</a></li>
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
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="Quantity" role="tabpanel" aria-labelledby="Quantity-tab">...</div>
              </div>
        </div>
    </div>
    <script>
        function transfer(){
            $('#transfer').modal('show');
            $(document).on('click','.editbtn',function(e){
                e.preventDefault();
                var part_id = $(this).val();
                console.log(part_id);
                // $.ajax({
                //     type:"GET",
                //     url:"edit_transfer"+partsData.id,
                //     success:function(response){
                //         $('#part_id').val(response.partsData.id);
                //         $('#qty').val(response.partsData.quantity);
                //         $('#bookAuthor').val(response.partsData.book_author);
                //         $('#bookStatus').val(response.partsData.book_status);
                //         $('#bookId').val(book_id);
                //     }
                // });
            });
        }
    </script>
@endsection

