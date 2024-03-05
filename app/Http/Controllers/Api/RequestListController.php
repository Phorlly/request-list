<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequestList;
use Illuminate\Http\Request;

class RequestListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $records = RequestList::whereHas('leave', function ($query) {
                $query->where('is_leave', 1);
            })->with('user.departments', 'leave')->orderBy('id', 'desc')->get();

            return response($records);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function mission()
    {
        try {
            $records = RequestList::whereHas('leave', function ($query) {
                $query->where('is_leave', 0);
            })->with('user.departments', 'leave')->orderBy('id', 'desc')->get();

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
            RequestList::create($request->all());

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
            $record = RequestList::findOrFail($id);
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
            $record = RequestList::findOrFail($id);
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
            $record = RequestList::findOrFail($id);
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
