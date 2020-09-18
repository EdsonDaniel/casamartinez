<?php

namespace App\Observers;

use App\PresentacionesProducto;

class PresentacionObserver
{
    /**
     * Handle the presentaciones producto "created" event.
     *
     * @param  \App\PresentacionesProducto  $presentacionesProducto
     * @return void
     */
    public function created(PresentacionesProducto $presentacionesProducto)
    {
        if($presentacionesProducto->stock <= 0){
            $presentacionesProducto->estado = 0;
            $presentacionesProducto->stock = 0;
            $presentacionesProducto->save();
        }
    }

    /**
     * Handle the presentaciones producto "updated" event.
     *
     * @param  \App\PresentacionesProducto  $presentacionesProducto
     * @return void
     */
    public function updated(PresentacionesProducto $presentacionesProducto)
    {
        if($presentacionesProducto->stock <= 0){
            $presentacionesProducto->estado = 0;
            $presentacionesProducto->stock = 0;
            $presentacionesProducto->save();
        }
    }

    /**
     * Handle the presentaciones producto "deleted" event.
     *
     * @param  \App\PresentacionesProducto  $presentacionesProducto
     * @return void
     */
    public function deleted(PresentacionesProducto $presentacionesProducto)
    {
        //
    }

    /**
     * Handle the presentaciones producto "restored" event.
     *
     * @param  \App\PresentacionesProducto  $presentacionesProducto
     * @return void
     */
    public function restored(PresentacionesProducto $presentacionesProducto)
    {
        //
    }

    /**
     * Handle the presentaciones producto "force deleted" event.
     *
     * @param  \App\PresentacionesProducto  $presentacionesProducto
     * @return void
     */
    public function forceDeleted(PresentacionesProducto $presentacionesProducto)
    {
        //
    }
}
