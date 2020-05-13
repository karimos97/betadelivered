<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use SoftDeletes;

    protected $fillable =['product_id','product_qte','product_price','order_id'];
    
    public function insert($product_id, $product_qte, $product_price, $order_id)
    {
        $ord=new OrderDetails();
        $ord->product_id=$product_id;
        $ord->product_qte=$product_qte;
        $ord->product_price=$product_price*$product_qte;
        $ord->order_id=$order_id;
        $ord->save();
    }
    /*public function update($id, $product_id, $product_qte, $product_price, $order_id)
    {
        $ord=new OrderDetails();
        $ord=$ord::find($id);
        $ord->product_id=$product_id;
        $ord->product_qte=$product_qte;
        $ord->product_price=$product_price*$product_qte;
        $ord->order_id=$order_id;
        $ord->save();
    }*/
}
