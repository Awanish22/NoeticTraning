<?php

namespace App\Observers;
use App\Models\Resource;
class ResourceObserver
{
    public function created(Resource $resource)
    {
        $resource->language()->attach(collect(request('language')));

    }
 /**
     * Handle the Coupon "updated" event.
     *
     * @param  \App\Models\Resource  $resource
     * @return void
     */
    public function updated(Resource $resource)
    {
        //
        dd($resource);
    }

    // public function updated(Resource $resource,$id)
    // {
    //             $resource->Resource::where('id',$id)->first();
    //             dd($id);
    //     // $resource->Resource::where('id', $resource->id)->first();
    //     // // dd($resource->id);
    //     $resource->language()->sync(collect(request('language')));

    //     // if ($resource->wasChanged('language')) {
    //     //  $resource->language()->sync(collect(request('language')));
    //     // } 

    // }


    public function deleted(Resource $resource)
    {
        $resource->language()->detach(collect(request('language')));

    }
}
