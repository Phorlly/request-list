<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequestList;

class StatusController extends Controller
{
    public function index($id)
    {
        try {
            $records = RequestList::whereHas('leave', function ($query) {
                $query->where('is_leave', 1);
            })
                ->where('user_id', $id)
                ->with('user.departments', 'leave')
                ->orderBy('id', 'desc')->get();

            if (!$records) {
                return $this->notFound();
            }

            return response($records);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    public function mission($id)
    {
        try {

            $records = RequestList::whereHas('leave', function ($query) {
                $query->where('is_leave', 0);
            })
                ->where('user_id', $id)
                ->with('user.departments', 'leave')
                ->orderBy('id', 'desc')->get();

            if (!$records) {
                return $this->notFound();
            }

            return response($records);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    public function pending()
    {
        try {
            $records = RequestList::with('user', 'department')
                ->where('status', 1)->orderBy('id', 'desc')->get();
            if (!$records) {
                return $this->notFound();
            }

            return response($records);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    public function approved()
    {
        try {
            $records = RequestList::with('user', 'department')
                ->where('status', 2)->orderBy('id', 'desc')->get();
            if (!$records) {
                return $this->notFound();
            }

            return response($records);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }

    public function rejected()
    {
        try {
            $records = RequestList::with('user', 'department')
                ->where('status', 0)->orderBy('id', 'desc')->get();
            if (!$records) {
                return $this->notFound();
            }

            return response($records);
        } catch (\Exception $err) {
            return $this->hasError($err->getMessage(), 500);
        }
    }
}
