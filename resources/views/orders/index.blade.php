@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <button type="button" class="btn btn-info add-new"  data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Order</button>
        <button type="button" class="btn btn-info btn-refresh"><i class="fa fa-plus"></i> Refresh</button>
    </div>
</div>
<div class="row">
            <table class="table" id="dataTableBuilder">
                <thead>
                    <tr>
                        <th title="Full Name">Full Name</th>
                        <th title="Phone">Phone</th>
                        <th title="Adress">Adress</th>
                        <th title="City">City</th>
                        <th title="Country">Country</th>
                        <th title="Actions">Actions</th>
                     </tr>
                 </thead>
                </table>
            </div>
                @include('orders.insert')
                @include('orders.edit')
                @include('orders.delete')
                @include('orders.details')

@endsection

@section('script')
<script src="{{ secure_asset('js/myscript.js') }}"></script>

@endsection
