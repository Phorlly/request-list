<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $records = Leave::orderBy('id', 'desc')->get();
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
            Leave::create($request->all());

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
            $record = Leave::findOrFail($id);
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
            $record = Leave::findOrFail($id);
            if (!$record) {
                return $this->notFound();
            }
            $record->update($request->all());

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
            $record = Leave::findOrFail($id);
            if (!$records) {
                return $this->notFound();
            }
            $record->delete();

            return $this->deleted();
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }
}
