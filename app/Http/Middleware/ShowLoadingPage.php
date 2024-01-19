<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShowLoadingPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */

// app/Http/Middleware/ShowLoadingPage.php

public function handle($request, Closure $next)
{
    // Lakukan logika pengendalian kapan menampilkan halaman loading
    if ($this->shouldShowLoadingPage($request)) {
        return response()->view('loading');
    }

    return $next($request);
}

// app/Http/Middleware/ShowLoadingPage.php

public function shouldShowLoadingPage($request)
{
    // Misalnya, tampilkan halaman loading jika query string 'show_loading' adalah 'true'
    return $request->query('show_loading') === 'false';
}


}
