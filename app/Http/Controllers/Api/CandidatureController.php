<?php

namespace App\Http\Controllers\Api;

use App\Models\Emploi;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidatureResource;
use Illuminate\Support\Facades\Auth;


class CandidatureController extends Controller
{
    /**
    *Get liste candidatures
     * @OA\Get (
     *     path="/api/candidatures",
     *      tags={"Candidature"},
     *     summary="Get liste candidatures",
     *     description="Get liste candidatures",
     *     @OA\Response(
     *         response = 200,
     *         description = "Liste des candidatures",
     *         @OA\JsonContent(
     *              @OA\Property(
     *                  type="array",
     *                  property="candidatures",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(
     *                          property="id",
     *                          type="integer",
     *                          example="1"
     *                      ),
     *                      @OA\Property(
     *                          property="cv",
     *                          type="string",
     *                          example="example cv"
     *                      ),
     *                      @OA\Property(
     *                          property="candidat",
     *                          type="string",
     *                          example="example description"
     *                      ),
     *                      @OA\Property(
     *                           property="emploi",
     *                           type="string",
     *                           example="example lieu"
     *                       ),
     *                      @OA\Property(
     *                          property="updated_at",
     *                          type="string",
     *                          example="2021-12-11T09:25:53.000000Z"
     *                      ),
     *                      @OA\Property(
     *                          property="created_at",
     *                          type="string",
     *                          example="2021-12-11T09:25:53.000000Z"
     *                      )
     *                  )
     *              )
     *          )
     *      )
     *  )
     *
     * */
    public function index()
    {
        $emplois = Emploi::where('employeur',Auth::id())->get();
        $employeur = $emplois->pluck('employeur');

        $var = $emplois->pluck('employeur');
        $candidatures = [];
        #dd($var);
        for($i=0;$i<$employeur->count();$i++)
        {
            $var = $emplois->pluck('employeur');
            $candidatures[] = Candidature::find($var[$i]);
        }
        #dd(Candidature::all());
        return CandidatureResource::collection(
            $candidatures
        );
    }
}
