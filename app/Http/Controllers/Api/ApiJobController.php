<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\JobsResource;
use App\Models\Emploi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmploiFormRequest;
use App\Http\Requests\SearchFormRequest;
use App\Http\Resources\EmploisResource;
use App\Models\User;
use OpenApi\Annotations as OA;
/**
 * @OA\OpenApi(
 *      @OA\Info(
 *          version="1.0",
 *          title="Liste des apis Emplois",
 *          description="Demo Emplois List Api",
 *      )
 *  )
 *
 * */
class ApiJobController extends Controller
{
    /**
     *Get liste emplois
     * @OA\Get (
     *     path="/api/emplois",
     *      tags={"Emploi"},
     *     summary="Get liste emplois",
     *     description="Get liste emplois",
     *     @OA\Response(
     *         response = 200,
     *         description = "Liste des emplois",
     *         @OA\JsonContent(
     *              @OA\Property(
     *                  type="array",
     *                  property="emplois",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(
     *                          property="id",
     *                          type="integer",
     *                          example="1"
     *                      ),
     *                      @OA\Property(
     *                          property="titre",
     *                          type="string",
     *                          example="example titre"
     *                      ),
     *                      @OA\Property(
     *                          property="description",
     *                          type="string",
     *                          example="example description"
     *                      ),
     *                      @OA\Property(
     *                           property="lieu",
     *                           type="string",
     *                           example="example lieu"
     *                       ),
     *                      @OA\Property(
     *                           property="employeur",
     *                           type="integer",
     *                           example="1"
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emplois = Emploi::all();
        return  JobsResource::collection(
            $emplois
        );
        return EmploisResource::collection(
            $emplois
        );
    }



    /**
     * Créer un emploi
     * @OA\Post (
     *      path="/api/emplois",
     *      tags={"Emploi"},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                       type="object",
     *                       @OA\Property(
     *                           property="titre",
     *                           type="string",
     *                       ),
     *                       @OA\Property(
     *                           property="description",
     *                           type="string",
     *                       ),
     *                       @OA\Property(
     *                            property="lieu",
     *                            type="string",
     *                        ),
     *                       @OA\Property(
     *                            property="employeur",
     *                            type="integer",
     *                        ),
     *                  ),
     *                  example={
     *                      "titre":"example titre",
     *                      "description":"example description",
     *                      "lieu":"example lieu",
     *                      "employeur":"1"
     *                 }
     *              )
     *          )
     *       ),
     *     @OA\Response(
     *           response=201,
     *           description="success",
     *           @OA\JsonContent(
     *               @OA\Property(property="id", type="integer", example=1),
     *               @OA\Property(property="titre", type="string", example="titre"),
     *               @OA\Property(property="description", type="string", example="description"),
     *               @OA\Property(property="lieu", type="string", example="lieu"),
     *               @OA\Property(property="employeur", type="integer", example="1"),
     *               @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *               @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *           )
     *       ),
     *       @OA\Response(
     *           response=400,
     *           description="invalid",
     *           @OA\JsonContent(
     *               @OA\Property(property="msg", type="string", example="fail"),
     *           )
     *       )
     *  )
     * Store a newly created resource in storage.
     *
     * @param  EmploiFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmploiFormRequest $request)
    {

        #dd(User::all()->toJson());
        $emploi = Emploi::create($request->validated());
        return response()->json($emploi,201);
    }

    /**
     * Get Detail emploi
     * @OA\Get (
     *      path="/api/emplois/{id}",
     *      tags={"Emploi"},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *               @OA\Property(property="id", type="integer", example=1),
     *                @OA\Property(property="titre", type="string", example="titre"),
     *                @OA\Property(property="description", type="string", example="description"),
     *                @OA\Property(property="lieu", type="string", example="lieu"),
     *                @OA\Property(property="employeur", type="integer", example="1"),
     *                @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *                @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      )
     *  )
     * Display the specified resource.
     *
     * @param  Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function show(Emploi $emploi)
    {
        return response()->json($emploi,200);
    }


    /**
     *  Modifier un emploi
     * @OA\PUT (
     *       path="/api/emplois/{id}",
     *       tags={"Emploi"},
     *       @OA\Parameter(
     *            in="path",
     *            name="id",
     *            required=true,
     *            @OA\Schema(type="string")
     *        ),
     *       @OA\RequestBody(
     *           @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(
     *                   @OA\Property(
     *                        type="object",
     *                        @OA\Property(
     *                            property="titre",
     *                            type="string",
     *                        ),
     *                        @OA\Property(
     *                            property="description",
     *                            type="string",
     *                        ),
     *                        @OA\Property(
     *                             property="lieu",
     *                             type="string",
     *                         ),
     *                        @OA\Property(
     *                             property="employeur",
     *                             type="integer",
     *                         ),
     *                   ),
     *                   example={
     *                       "titre":"example titre",
     *                       "description":"example description",
     *                       "lieu":"example lieu",
     *                       "employeur":"1"
     *                  }
     *               )
     *           )
     *        ),
     *      @OA\Response(
     *            response=201,
     *            description="success",
     *            @OA\JsonContent(
     *                @OA\Property(property="id", type="integer", example=1),
     *                @OA\Property(property="titre", type="string", example="titre"),
     *                @OA\Property(property="description", type="string", example="description"),
     *                @OA\Property(property="lieu", type="string", example="lieu"),
     *                @OA\Property(property="employeur", type="integer", example="1"),
     *                @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *                @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *            )
     *        ),
     *        @OA\Response(
     *            response=400,
     *            description="invalid",
     *            @OA\JsonContent(
     *                @OA\Property(property="msg", type="string", example="fail"),
     *            )
     *        )
     *   )
     * @param  \Illuminate\Http\Request  $request
     * @param  Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function update(EmploiFormRequest $request, Emploi $emploi)
    {
        $emploi->update($request->validated());
        return response()->json($emploi,201);
    }

    /**
     *  Delete Emploi
     * @OA\Delete (
     *      path="/api/emplois/{id}",
     *      tags={"Emploi"},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="delete emploi success")
     *          )
     *      )
     *  )
     *
     * @param  Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emploi $emploi)
    {
        $emploi->delete();
        response()->json();
    }
}
