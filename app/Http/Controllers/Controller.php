<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

class Controller extends BaseController
{
    /**
     * @OA\OpenApi(
     *     @OA\Info(
     *         version="1.0",
     *         title="Liste des apis JobPortail",
     *         description="Demo JobPortail List Api",
     *     ),
     *     @OA\Server(
     *      url="localhost:8000",
     *      description="Api des emplois"
     *     )
     * )
     */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
