<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use DataTables;
class ProductsController extends Controller
{
    public function home(Request $request)
    {
        $pro=new Products();
        if ($request->ajax()) {
            $pro = Products::select(['id','name','price','brand','Qte']);
            //dd($pro->get());
            return Datatables::of($pro)
                ->editColumn('id', '{{$id}}')
                ->make(true);
        }
        return view('products.index');
    }
    public function insert(Request $request)
    {
        $pro=new Products();
        $pro::create($request->except('_token'));
    }
    public function edit(Request $request)
    {
        $pro=new Products();
        $pro::where('id', $request->id)->update(array(
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'brand'=>$request->input('brand'),
            'description'=>$request->input('description'),
            'Qte'=>$request->input('Qte')
        ));
    }
    public function remove(Request $request)
    {
        $pro=new Products();
        $pro::where('id', $request->id)->delete();
    }
    public function get($id)
    {
        $pro=new Products();
        $pro=$pro::find($id);
        return response()->json($pro);
    }
}
