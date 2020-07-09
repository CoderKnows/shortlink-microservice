<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use App\Models\RedirectStatistics;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Промежуточное ПО для сбора аналитики переходов по ссылкам
 * @package App\Http\Middleware
 */
class AnalyticsCollect
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            Validator::make($request->headers->all(), [
                'referer' => ['nullable', 'url']
            ])->validate();
        } catch (ValidationException $e) {
            return redirect()->route('home')->withErrors(['Oooos, sorry!']);
        }

        $stat = new RedirectStatistics();
        // IP пользователя
        $stat->ip = $request->ip();
        // с какого ресурса перешел по ссылке
        $stat->referrer = $request->headers->get('referer');
        // по какому коду - many2one к redirects по code
        /** @var Redirect $redirect */
        $redirect = $request->route()->parameter('redirect');
        $stat->redirect()->associate($redirect);
        $stat->save();

        return $next($request);
    }
}
