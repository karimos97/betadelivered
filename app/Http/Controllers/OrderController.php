<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Products;
use App\OrderDetails;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function home(Request $request, Builder $builder)
    {
        $order= new order();
        $order=$order::all();

        if ($request->ajax()) {
            $order = order::select(['id', 'full_name', 'phone', 'adress', 'city', 'country']);
            return Datatables::of($order)
                ->addColumn('action', function ($order) {
                    return '<div class="row">
                    <div class="col-sm-2">
                    <button id='.$order->id.'" data-toggle="modal" data-target="#editModal" class="btn btn-xs btn-warning targe"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                  </div>
                  <div class="col-sm-2">
                  <button id='.$order->id.'" data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-dark targe"><i class="glyphicon glyphicon-search"></i> Details</button>
                  </div>
                  <div class="col-sm-2">
                  <button id='.$order->id.'" data-toggle="modal" data-target="#deleteModal" class="btn btn-xs btn-danger targe"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                  </div>

                    </div>';
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->removeColumn('id')
                ->make(true);
        }
        $product=new Products();
        $product=$product->list();

        return view('orders.index', ['product'=>$product]);
    }
    public function insert(Request $request)
    {
        $order= new order();

        $data=$order::create(array(
            'full_name'=>$request->input('full_name'),
            'phone'=>$request->input('phone'),
            'adress'=>$request->input('adress'),
            'city'=>$request->input('city'),
            'country'=>$request->input('country')
        ));


        $ord=new OrderDetails();
        $product=new Products();
        // get selectd products
        $productslist=$request->input('products');
        //check if qte exists
        if ($request->input('qte')) {
            foreach ($productslist as $req) {
                // get product infos
                $product=$product::find($req);

                $ord->insert($req, $request->input('qte'), $product->price, $data->id);
            }
        }
        return redirect('/');
    }

    public function edit($id, Request $request)
    {
        $order= new order();
        $data=$order::where('id', $id)->update(array(
            'full_name'=>$request->input('full_name'),
            'phone'=>$request->input('phone'),
            'adress'=>$request->input('adress'),
            'city'=>$request->input('city'),
            'country'=>$request->input('country')
        ));

        $ord=new OrderDetails();
        $product=new Products();
        // get selected products
        $productslist=$request->input('products');
        //check if qte exists
        if ($request->input('qte')) {
            foreach ($productslist as $req) {
                // get product infos
                $product=$product::find($req);
                //dd($data);
                $ord->updates($id, $req, $request->input('qte'), $product->price);
            }
            return redirect('/');
        }
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

    public function details($id)
    {
        $data =DB::table('orders')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'products.id', 'order_details.product_id')
        ->select('products.*', 'order_details.product_qte', 'order_details.product_price')->where('orders.id', $id)
        ->get();


        return response()->json($data);
    }
}
