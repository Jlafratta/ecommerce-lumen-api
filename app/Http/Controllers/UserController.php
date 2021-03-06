<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); #COMENTADO XQ RESTRINJO EN LA RUTA
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function loggedUser()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    /**
     * Get one User.
     *
     * @return Response
     */
    public function get($id) {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function getAll() {
        return response()->json(['users' =>  User::all()], 200);
    }
}
