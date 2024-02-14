<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\RunningForm;
use Illuminate\Http\Request;

class RunningFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Form $form)
    {

        $instances = RunningForm::where("form_id", $form->id)->get();
        return [
            "data" => [
                "form_instances" => $instances
            ]
        ];

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Form $form)
    {

        $request->validate([
            "name" => "string|required"
        ]);


        $newIstance = new RunningForm();

        $newIstance->name = $request->name;
        $newIstance->form_id = $form->id;
        $newIstance->save();

        return [
            "data" => [
                "form_instance" => $newIstance
            ]
        ];


    }

    /**
     * Display the specified resource.
     */
    public function show(RunningForm $runningForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RunningForm $runningForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RunningForm $runningForm)
    {
        //
    }
}
