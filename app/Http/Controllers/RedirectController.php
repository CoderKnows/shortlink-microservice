<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedirectRequest;
use App\Models\Redirect as RedirectModel;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    /**
     * Перенаправление
     *
     * @param RedirectModel $redirect
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(RedirectModel $redirect)
    {
        // проверить условия срабатывания
        // активность, даты, пароль

        // перенаправление
        $url = $redirect->url;

        return Redirect::to($url);
    }

    public function create(RedirectRequest $request)
    {

    }
}
