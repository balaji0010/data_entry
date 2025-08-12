<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormUser;

class FormUserController extends Controller
{
    /**
     * Fetch all form users (for Vue table).
     */
    public function index()
    {
        $formUsers = FormUser::all();
        return response()->json($formUsers);
    }

    /**
     * Store a new form user.
     */
public function store(Request $request)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:form_users,email'
    ]);

    $user = FormUser::create([
        'name'  => $request->name,
        'email' => $request->email
        // 'password' => bcrypt($request->password) // uncomment if you want password
    ]);

    return response()->json([
        'success' => true,
        'message' => 'User added successfully!',
        'user'    => $user
    ]);
}

    /**
     * Delete a form user.
     */
    public function destroy($id)
    {
        $formUser = FormUser::find($id);

        if (!$formUser) {
            return response()->json([
                'success' => false,
                'message' => 'User not found!'
            ], 404);
        }

        $formUser->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully!'
        ]);
    }
}
