@php $bread = "Add to Existing"; @endphp
@extends('layout.app')
@section('content')
@include('layout.breadcrumb')
    <div class="card">
        <div class="card-header">
            <div class="row mt-3">
                <div class="col-2 text-end">
                    <label for="">Find</label>
                </div>
                <div class="col-3">
                    <input type="text" name="part_list" id="part_list" class="form-control form-control-sm" placeholder="Search for Item name or sku" autocomplete="off" autofocus>
                </div>
                <div class="col-2">
                    or<a class="btn btn-link shadow-none" href="{{ route('add.create') }}" role="button"> Add New</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="itemLists"></div>
                </div>
            </div>
        </div>
        {{ csrf_field() }}
    </div>
    <script>
        $(document).mouseup(function(e){
            var container = $("#itemLists");
            if (!container.is(e.target) && container.has(e.target).length === 0){
                container.hide();
                $("#part_list").val('');
            }
        });

        $(document).ready(function(){
            $('#part_list').keyup(function(){
                var query = $(this).val();
                if(query != ''){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('autocomplete') }}",
                        method:"POST",
                        data:{query:query , _token:_token},
                        success:function(data){
                            $('#itemLists').fadeIn();
                            $('#itemLists').html(data);
                        }
                    });
                }
            });
        });
    </script>
@endsection

