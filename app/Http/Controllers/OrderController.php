<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use DataTables;
use Yajra\DataTables\Html\Builder;

class OrderController extends Controller
{
    public function home(Request $request,Builder $builder)
    {
        $order= new order();
        $order=$order::all();

        if ($request->ajax()) {
            $order = order::select(['id', 'full_name', 'phone', 'adress', 'city', 'country']);
            return Datatables::of($order)
                ->addColumn('action', function ($order) {
                    return '<div class="row">
                    <div class="col-sm-4">
                    <button id='.$order->id.'" data-toggle="modal" data-target="#editModal" class="btn btn-xs btn-warning targe"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                  </div>
                  <div class="col-sm-4">
                  <button id='.$order->id.'" data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-dark targe"><i class="glyphicon glyphicon-search"></i> Details</button>
                  </div>
                  <div class="col-sm-4">
                  <button id='.$order->id.'" data-toggle="modal" data-target="#deleteModal" class="btn btn-xs btn-danger targe"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                  </div>

                    </div>';
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->removeColumn('id')
                ->make(true);
        }

        return view('orders.index');

    }
    public function insert(Request $request)
    {
        $order= new order();
        $order::create($request->except('_token'));
        return redirect('/');
    }

    public function edit($id, Request $request)
    {
        $order= new order();
        $order::where('id', $id)->update($request->except('_token', '_method'));
        return redirect('/');
    }

    public function remove($id)
    {
        $order= new order();
        $order::where('id', $id)->delete();
        return redirect('/');
    }

    public function get($id)
    {
        $order= new order();
        $order=$order::find($id);
        return response()->json($order);
    }
}
