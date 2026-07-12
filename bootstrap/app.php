<?php

use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Sentry\Laravel\Integration;

use function Sentry\captureException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {

        Integration::handles($exceptions);

        // Mass Assignment
        $exceptions->render(function (MassAssignmentException $massAssignmentException, Request $request){
            Log::error($massAssignmentException->getMessage());
            return redirect()->back()->with('error', $massAssignmentException->getMessage());
        });


        // Handle Query Exception
        $exceptions->render(function (QueryException $queryException, Request $request){
            Log::error($queryException->getMessage());
            return redirect()->back()->with('error', "Query Error");
        });

    })->create();
