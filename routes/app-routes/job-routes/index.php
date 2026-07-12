<?php

use App\Domain\PrintJobs\Http\Controllers\OtherJobController;
use Illuminate\Support\Facades\Route;


Route::prefix('jobs')
    ->name('jobs.')
    ->group(function () {

        require __DIR__ . "/largeformat-routes.php";
        require __DIR__ . "/embroidery-routes.php";
        require __DIR__ . "/design-routes.php";
        require __DIR__ . "/press-routes.php";
        require __DIR__ . "/misc-routes.php";

        Route::post("others/store/{customer}", [OtherJobController::class, "store"])->name("others.store");
        Route::resource("others", OtherJobController::class)
        ->except("store")
        ->parameters([
            "others"=> "otherJob",
        ]);

    });
