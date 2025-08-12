<?php

namespace App\Http\Controllers\FormController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormA;

class FormAController extends Controller
{
    // GET: Fetch all Form A entries
    public function index()
    {
        $data = FormA::all();
        return response()->json($data);
    }

    // GET: Show a single form entry by ID
    public function show($id)
    {
        $form = FormA::findOrFail($id);
        return response()->json($form);
    }

    // POST: Save new Form A data
    public function store(Request $request)
    {
        $request->validate([
            'field1' => 'required|string|max:255',
            'field2' => 'nullable|string|max:255',
            'field3' => 'nullable|integer'
        ]);

        $form = FormA::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Form A saved successfully',
            'data' => $form
        ]);
    }

    // PUT/PATCH: Update Form A entry
    public function update(Request $request, $id)
    {
        $form = FormA::findOrFail($id);
        $form->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Form A updated successfully',
            'data' => $form
        ]);
    }
}
