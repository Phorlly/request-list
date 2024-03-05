<?php

namespace App\Http\Controllers\Traits;

trait ResponseTrait
{
    public function created()
    {
        return response(['message' => "Successfully has been created!"], 200);
    }

    public function updated()
    {
        return response(['message' => "Successfully has been updated!"], 200);
    }

    public function deleted()
    {
        return response(['message' => "Successfully has been deleted!"], 200);
    }

    public function notFound()
    {
        return response(['message' => "Sorry, no data found!"], 404);
    }

    public function hasError($message, $status)
    {
        return response(['message' => $message], $status);
    }
}
