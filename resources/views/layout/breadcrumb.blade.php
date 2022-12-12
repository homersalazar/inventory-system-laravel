<style>
    .bread{
        background-color: #f5f5f5;
        height: 80%;
        border-radius: 5px;
    }
</style>
<div class="row mt-3">
    <div class="col-12">
        <nav class="bread" aria-label="breadcrumb">
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $bread }}</li>
            </ol>
        </nav>
    </div>
</div>
