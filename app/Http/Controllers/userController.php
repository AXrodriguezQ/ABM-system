<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    // We create the main function to show all users.
    public function index() {
        try {
            $users = User::all();

            //We validate that if the user list is empty then it responds correctly.
            if ($users->isEmpty()) {

                return response()->json([
                    'message' => 'No users were found',
                    'status' => 200
                ], 200);

            }

            // If everything is ok, show the users with their response.
            return response()->json($users, 200);

        // We handle the error.
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching users',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // We create a function to create a user.
    public function store(Request $request) {
        try {
            // We validate the information that we receive in the request is valid as we require it.
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:20', 
                'lastname' => 'required|max:20', 
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|digits:10', 
                'password' => 'required|min:6',
                'created_by' => 'required',
            ]);
        
            // We handle errors in case a validation goes wrong.
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error processing request data.',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
        
            // After validating the information we proceed to save the information.
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                // Hash the password for security and keep user information safe.
                'password' => Hash::make($request->password),
                'is_restricted' => 'Valido',
                'created_by' => $request->created_by,
            ]);
        
            // If for some reason the creation process goes wrong we handle the error.
            if (!$user) {
                
                return response()->json([
                    'message' => 'Error creating user',
                    'status' => 500
                ], 500);

            }
        
            // If everything goes well we show the created user.
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user,
                'status' => 201
            ], 201);

        // We handle the error.
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating a new user',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // We created a function to display a user by their id.
    public function show($id) {
        try {
            $user = User::find($id);

            // We validate if the user exists.
            if (!$user) {

                return response()->json([
                    'message' => 'User not found',
                    'status' => 404
                ], 404);

            }

            // If everything is ok, show the user with their response.
            return response()->json($user, 200);

        // We handle the error.
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving the user',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // We create endpoint to restrict a user.
    public function restrict($id) {
        try {
            $user = User::find($id);

            // We validate if the user exists.
            if (!$user) {

                return response()->json([
                    'message' => 'User not found',
                    'status' => 404
                ], 404);

            }

            // If everything is ok we change the value and restrict it.
            if ( $user->is_restricted == 'Valido' ) {
                $user->is_restricted = 'Invalido';
            } else {
                $user->is_restricted = 'Restringido';
            }

            $user->save();

            // Send the response
            return response()->json([
                'message' => 'User restricted successfully',
                'status' => 200
            ], 200);
            
        // We handle the error.
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred restricted user',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // We create the function to delete a user.
    public function destroy($id) {
        try {
            $user = User::find($id);

            // We validate if the user exists.
            if (!$user) {

                return response()->json([
                    'message' => 'User not found',
                    'status' => 404
                ], 404);

            }

            // Delete the user.
            $user->delete();

            // If everything is ok, show the user with their response.
            return response()->json([
                'message' => 'User deleted successfully',
                'status' => 200,
            ], 200);

        // We handle the error.
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving the user',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // We create the function to update a user.
    public function update($id, Request $request) {
        try {
            $user = User::find($id);

            // We validate if the user exists.
            if (!$user) {

                return response()->json([
                    'message' => 'User not found',
                    'status' => 404
                ], 404);

            }

            // We validate the information that we receive in the request is valid as we require it.
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:20', 
                'lastname' => 'required|max:20', 
                'email' => 'required|email',
                'phone' => 'required|digits:10', 
                'password' => 'required|min:6',
                'is_restricted' => 'in:Restringido,Valido',
            ]);

            // We handle errors in case a validation goes wrong.
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error processing request data.',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }

            // We updated the data to edit it.
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->is_restricted = $request->is_restricted;

            $user->save();

            // We send the answer.
            return response()->json([
                'message' => 'User uploaded successfully',
                'User' => $user,
                'status' => 200,
            ], 200);

        // We handle the error.
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while uploading the user',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // We create the function to update a user.
    public function updatePartial($id, Request $request) {
        try {
            $user = User::find($id);

            // We validate if the user exists.
            if (!$user) {

                return response()->json([
                    'message' => 'User not found',
                    'status' => 404
                ], 404);

            }

            // We validate the information that we receive in the request is valid as we require it.
            $validator = Validator::make($request->all(), [
                'name' => 'max:20', 
                'lastname' => 'max:20', 
                'email' => 'email',
                'phone' => 'digits:10', 
                'password' => 'min:6',
                'is_restricted' => 'in:Restringido,Valido',
            ]);

            // We handle errors in case a validation goes wrong.
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error processing request data.',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }

            // We update the information as changes are required.
            if ($request->has('name')) {
                $user->name = $request->name;
            }

            if ($request->has('lastname')) {
                $user->lastname = $request->lastname;
            }
            
            if ($request->has('email')) {
                $user->email = $request->email;
            }
            
            if ($request->has('phone')) {
                $user->phone = $request->phone;
            }
            
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }

            if ($request->has('is_restricted')) {
                $user->is_restricted = $request->is_restricted;
            }

            $user->save();

            // We send the answer.
            return response()->json([
                'message' => 'User uploaded successfully',
                'User' => $user,
                'status' => 200,
            ], 200);            

        // We handle the error.
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while uploading the user',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // We create the function to change a password
    public function uploadPassword($id, Request $request) {
        try {
            $user = User::find($id);

            // We validate if the user exists.
            if (!$user) {

                return response()->json([
                    'message' => 'User not found',
                    'status' => 404
                ], 404);

            }

            // We validate the user's password with the one entered.
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json(['error' => 'Current password invalid'], 401);
            }
            
            // We validate the password
            $request->validate([
                'new_password' => 'required|string|min:6|',
            ]);

            // We change the password
            $user->password = Hash::make($request->new_password);
            $user->save();
            
            // If everything is ok we return a valid response.
            return response()->json([
                'message' => 'Password is valid!',
                'correct' => true,
                'status' => 200
            ], 200);

        // We handle the error.
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while change the password',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

}
