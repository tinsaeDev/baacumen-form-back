<?php

namespace App\Http\Controllers;

use App\Models\RunningForm;
use App\Models\RunningFormValue;
use Illuminate\Http\Request;

class RunningFormValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RunningForm $instance)
    {


        foreach ($request->all() as $key => $value) {


            $v = $value;
            if (is_array($value)) {
                $v = join(",", $value);
            }

            $newValue = new RunningFormValue();
            $newValue->running_form_id = $instance->id;
            $newValue->form_field_id = $key;
            $newValue->value = $v;
            $newValue->save();
        }


        return [
            "data" => [
                "instance_values" => $instance
            ]
        ];


        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RunningFormValue $runningFormValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RunningFormValue $runningFormValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RunningFormValue $runningFormValue)
    {
        //
    }
}
