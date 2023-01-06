<?php

namespace App\Observers;
use App\Models\Test;
class TestObserver
{
    public function created(Test $test)
    {
        $test->language()->attach(collect(request('language')));

    }
 /**
     * Handle the Coupon "updated" event.
     *
     * @param  \App\Models\Test  $test
     * @return void
     */
    // public function updated(Test $test)
    // {
    //     //
    //     dd($test);
    // }

    public function updated(Test $test,$id)
    {
        $test = Test::where('id',$id)->first();
                        dd($id);
        // $test->Test::where('id', $test->id)->first();
        // // dd($test->id);
        $test->language()->sync(collect(request('language')));

        // if ($test->wasChanged('language')) {
        //  $test->language()->sync(collect(request('language')));
        // } 

    }


    public function deleted(Test $test)
    {
        $test->language()->detach(collect(request('language')));

    }
}
