<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $request
     * @param $instance
     * @return array|bool
     */
    public function uploadRequestImage($request, $instance)
    {
        if ($request->hasFile('image'))
        {
            $imageDetails = [
                'name' => str_slug(date('His') . ' ' . $request->image->getClientOriginalName()),
                'size' => $request->image->getSize(),
                'path' => request()->image->store(config('paths.image.' . class_basename($instance)), 'public')
            ];

            if ($instance->image)
            {
                $instance->image->deleteImage();
                $instance->image->update($imageDetails);
            } else
            {
                $instance->image()->create($imageDetails);
            }
        }

        return false;
    }
}
