<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return [
            "data" => [
                "forms" => Form::all()
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newForm = new Form();
        $newForm->save();
        return [
            "data" => [
                "form" => $newForm
            ]
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        //
    }
}
