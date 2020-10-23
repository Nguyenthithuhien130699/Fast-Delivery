<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function uploadFile($file)
    {

        $fileName = time() . $file->getClientOriginalName();
        $destinationPath = public_path('images');
        if ($file->isValid()) {

            $file->move($destinationPath, $fileName);
            return $fileName;
        }
        return null;
    }
}
