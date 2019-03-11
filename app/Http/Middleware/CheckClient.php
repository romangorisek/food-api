<?php

namespace App\Http\Middleware;

use Closure;
use App\Client;

class CheckClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->checkToken($request);

        return $next($request);
    }

    public function checkToken($request)
    {
        // $client = Client::getByIp($request->ip());
        // if (!$client) {
        //     throw new \Exception("Client not registered");
        // }
        // $header_api_key = $_SERVER['HTTP_API_KEY'] ?? null;

        // if ($client->token !== $header_api_key)
        //     throw new \Exception("Client not registered");
    }
}
