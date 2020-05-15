<?php

namespace App\Observers;

use App\order;

class OrdersObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\order  $order
     * @return void
     */
    public function created(order $order)
    {
        if (auth()->check());
        {
            $order->created_by=auth()->id();
            $order->save();
        }
    }

    /**
     * Handle the order "updated" event.
     *
     * @param  \App\order  $order
     * @return void
     */
    public function updated(order $order)
    {
        //
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\order  $order
     * @return void
     */
    public function deleted(order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\order  $order
     * @return void
     */
    public function restored(order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\order  $order
     * @return void
     */
    public function forceDeleted(order $order)
    {
        //
    }
}
