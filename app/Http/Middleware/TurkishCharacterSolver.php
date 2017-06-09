<?php

namespace App\Http\Middleware;
use Closure;

class TurkishCharacterSolver {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->setContent(str_replace([
            '&ccedil;', '&uuml;', '&ouml;', '&Uuml;', '&Ouml;', '&Ccedil;',
        ], [
            'ç', 'ü', 'ö', 'Ü', 'Ö', 'Ç'
        ], $response->getContent()));

        return $response;
    }
}
?>