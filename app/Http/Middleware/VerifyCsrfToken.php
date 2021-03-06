<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://127.0.0.1:8000',
        'http://127.0.0.1:8000/savepoint',
        'http://127.0.0.1:8000/signin',
        'http://sidestar.local:3000',
        'http://localhost:3000',
        /*'http://sidestar.local:3000/getLanguage',
        'http://sidestar.local', */
        'http://sidestar.local:8001/getLanguage',
    ];
}
