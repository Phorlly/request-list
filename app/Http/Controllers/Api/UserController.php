<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $records = User::orderBy('created_at', 'desc')->get();
            if (!$records) {
                return $this->notFound();
            }

            return response($records);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'noted' => $request->noted,
                'role' => $request->role,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);

            return $this->created();
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $record = User::findOrFail($id);
            if (!$record) {
                return $this->notFound();
            }

            return response($record);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $record = User::findOrFail($id);
            if (!$record) {
                return $this->notFound();
            }

            $password = '';
            if (!$request->password) {
                $password = $record->password;
            } else {
                $password = Hash::make($request->password);
            }

            $record->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'noted' => $request->noted,
                'role' => $request->role,
                'address' => $request->address,
                'password' => $password,
            ]);

            return $this->updated();
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $record = User::findOrFail($id);
            if (!$record) {
                return $this->notFound();
            }

            $record->delete();

            return $this->deleted();
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }
}
