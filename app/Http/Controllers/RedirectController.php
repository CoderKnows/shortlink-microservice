<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \App\Models\Redirect as RedirectModel;

class RedirectController extends Controller
{
    public function redirect(RedirectModel $redirect)
    {
        $url = $redirect->url;

        return Redirect::to($url);
    }
}
