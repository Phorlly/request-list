<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class UserDepartmentController extends Controller
{

    // Create operation
    public function index()
    {
        try {
            // Retrieve all users
            $users = User::all();

            // Retrieve all departments
            $departments = Department::all();

            // Initialize an empty array to store the pivot records
            $pivotRecords = [];

            // Iterate over each user
            foreach ($users as $user) {
                // Retrieve departments associated with the user
                $userDepartments = $user->departments()->whereIn('department_id', $departments->pluck('id'))->get();

                // Add the user's departments to the pivot records
                $pivotRecords[] = [
                    'user' => $user,
                    'departments' => $userDepartments,
                ];
            }

            return response($pivotRecords);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    // Create operation
    public function assignUserToDepartments(Request $request)
    {
        try {
            $user = User::findOrFail($request->user_id);
            if (!$user) {
                return $this->notFound();
            }
            $user->departments()->sync($request->department_ids);

            return response(['message' => 'User assigned to departments']);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    // Read operation
    public function getUserDepartments($id)
    {
        try {
            $user = User::with('departments')->findOrFail($id);
            if (!$user) {
                return $this->notFound();
            }

            return response($user);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    // Delete operation
    public function removeUserFromDepartments(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            if (!$user) {
                return $this->notFound();
            }
            $user->departments()->detach($request->department_ids);

            return response(['message' => 'User removed from departments']);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }
}
