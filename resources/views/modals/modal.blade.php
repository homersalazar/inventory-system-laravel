{{-- area modal --}}
    <div class="modal fade" id="myArea" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="areaForm" name="areaForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8 ms-5">
                                <input type="text" name="rack" id="rack" class="form-control form-control-sm" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="saveBtn" id="saveBtn"  class="btn btn-primary btn-sm">Add Area</button>
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- brand modal --}}
    <div class="modal fade" id="myBrand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="brandForm" name="brandForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8 ms-5">
                                <input type="text" name="brand" id="brand" class="form-control form-control-sm" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="saved" id="saved"  class="btn btn-primary btn-sm">Add Brand</button>
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- unit modal --}}
    <div class="modal fade" id="myUnit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="unitForm" name="unitForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8 ms-5">
                                <input type="text" name="unit" id="unit" class="form-control form-control-sm" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="save_unit" id="save_unit"  class="btn btn-primary btn-sm">Add Unit</button>
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!--Transfer Modal -->
    <div class="modal fade" id="transfer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" name="editForm">
                    @csrf
                        <div class="modal-body">
                            {{-- <div class="row">
                                <div class="col-12">
                                    <label class="me-2 font-weight-bold" id="memo"> </label>
                                </div>
                            </div> --}}
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
                                    <input type="number" name="qty" id="qty" value="" class="form-control form-control-sm" autocomplete="off" autofocus>
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
                        </div>
                    <div class="modal-footer">
                        <input type="text" name="part_id" id="part_id"  class="form-control form-control-sm" autocomplete="off">
                        <button type="submit" name="save_unit" id="save_unit"  class="btn btn-primary btn-sm">Add Unit</button>
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
