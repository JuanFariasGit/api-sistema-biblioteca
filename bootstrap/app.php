<?php

use App\Http\Middleware\JWTMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
         $middleware->priority([
        \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Routing\Middleware\ThrottleRequestsWithRedis::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        JWTMiddleware::class,
        \Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                $messageError = config('app.env') == 'local' ? $e->getMessage() : '';

                return response()->json([
                    'message' => "401 | Acesso Não Autenticado! {$messageError}"
                ], 401);
            }
        });
        
        $exceptions->render(function (AccessDeniedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                $messageError = config('app.env') == 'local' ? $e->getMessage() : '';

                return response()->json([
                    'message' => "403 | Acesso Não Autorizado! {$messageError}"
                ], 403);
            }
        });
        
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                $messageError = config('app.env') == 'local' ? $e->getMessage() : '';

                return response()->json([
                    'message' => "404 | Não Encontrado! {$messageError}"
                ], 404);
            }
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                $messageError = config('app.env') == 'local' ? $e->getMessage() : '';

                return response()->json([
                    'message' => "405 | Método Não Encontrado! {$messageError}"
                ], 405);
            }
        });

         $exceptions->render(function (BadMethodCallException|ParseError|ErrorException $e, Request $request) {
            if ($request->is('api/*')) {
                $messageError = config('app.env') == 'local' ? $e->getMessage() : '';

                return response()->json([
                    'message' => "500 | Erro Interno do Servidor! {$messageError}"
                ], 500);
            }
        });
    })->create();
