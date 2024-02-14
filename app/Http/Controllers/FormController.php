<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormField;
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

        $f = Form::where("id", $form->id)->with(["fields"])->first();
        return [
            "data" => [
                "form" => $f
            ]
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {

        // Validate actions
        $request->validate(
            [
                "action" => "required|string|in:SAVE",
                "name" => "string|required",
                "description" => "string|required",
                "fields" => "array|min:0",
                "deleted_fields" => "array|min:0"
            ]
        );


        $action = $request->action;


        switch ($action) {


            case "SAVE": {

                // sAVE fORM

                $form->update($request->all());

                // Create/Updated Form Fields

                foreach ($request->fields as $field) {
                    $formField = null;
                    if (isset($field["id"])) {
                        $formField = FormField::find($field["id"]);
                    }

                    if ($formField) {
                        $formField->update($field);
                    } else {

                        $formField = FormField::make([
                            ...$field,
                            ...$field["validation"]
                        ]);

                        $formField->form_id = $form->id;
                        $formField->save();

                    }

                }


                // Delete Fields


                foreach ($request->deleted_fields as $delId) {
                    $field = FormField::find($delId);
                    $field->delete();
                }

                $f = Form::where("id", $form->id)->with(["fields"])->first();
                return [
                    "data" => [
                        "form" => $f
                    ]
                ];


            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {


        return $form->delete();
    }
}
