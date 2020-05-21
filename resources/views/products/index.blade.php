@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <button type="button" class="btn btn-info add-new"  data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Product</button>
        <button type="button" class="btn btn-info btn-refresh"><i class="fa fa-plus"></i> Refresh</button>
    </div>
</div>
            <table class="table" id="products_list">
                <thead>
                    <tr>
                        <th title="Name">Name</th>
                        <th title="Price">Price</th>
                        <th title="Brand">Brand</th>
                        <th title="Qte">Qte</th>
                        <th title="Actions">Actions</th>
                     </tr>
                 </thead>
                </table>
                @include('products.insert')
                @include('products.edit')
                @include('products.delete')
                @include('products.details')

@endsection
@section('script')
<script src="{{ secure_asset('js/productScripts.js') }}"></script>
@endsection