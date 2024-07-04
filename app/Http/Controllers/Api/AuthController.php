<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
use OpenApi\Annotations as OA;


class AuthController extends Controller
{
    /**
     **Get list users
     * * @OA\Get (
     * *     path="/api/users",
     * *      tags={"Users"},
     * *     summary="Get liste users",
     * *     description="Get liste users",
     * *     @OA\Response(
     * *         response = 200,
     * *         description = "Liste des userrs",
     * *         @OA\JsonContent(
     * *              @OA\Property(
     * *                  type="array",
     * *                  property="users",
     * *                  @OA\Items(
     * *                      type="object",
     * *                      @OA\Property(
     * *                          property="id",
     * *                          type="integer",
     * *                          example="1"
     * *                      ),
     * *                      @OA\Property(
     * *                          property="name",
     * *                          type="string",
     * *                          example="example name"
     * *                      ),
     * *                      @OA\Property(
     * *                          property="email",
     * *                          type="string",
     * *                          example="example email"
     * *                      ),
     * *                      @OA\Property(
     * *                          property="updated_at",
     * *                          type="string",
     * *                          example="2021-12-11T09:25:53.000000Z"
     * *                      ),
     * *                      @OA\Property(
     * *                          property="created_at",
     * *                          type="string",
     * *                          example="2021-12-11T09:25:53.000000Z"
     * *                      )
     * *                  )
     * *              )
     * *          )
     * *      )
     * *  )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users,200);
    }

    /**
     * Se connecter
     *
     * @OA\Post(
     *      path="/api/login",
     *      tags={"Users"},
     *      summary="Se connecter avec un email et un mot de passe",
     *      description="Permet à un utilisateur de se connecter",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                       type="object",
     *                       @OA\Property(
     *                           property="email",
     *                           type="string",
     *                           description="L'email de l'utilisateur"
     *                       ),
     *                       @OA\Property(
     *                           property="password",
     *                           type="string",
     *                           description="Le mot de passe de l'utilisateur"
     *                       ),
     *                  ),
     *                  example={
     *                      "email":"example@example.com",
     *                      "password":"password"
     *                 }
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *           response=200,
     *           description="Connexion réussie",
     *           @OA\JsonContent(
     *                @OA\Property(property="message", type="string", example="Logged in successfully.")
     *            )
     *      ),
     *      @OA\Response(
     *           response=400,
     *           description="Données invalides",
     *           @OA\JsonContent(
     *               @OA\Property(property="message", type="string", example="The given data was invalid."),
     *               @OA\Property(
     *                   property="errors",
     *                   type="object",
     *                   @OA\Property(
     *                       property="email",
     *                       type="array",
     *                       @OA\Items(type="string", example="The provided credentials are incorrect.")
     *                   )
     *               )
     *           )
     *      )
     * )
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $request->session()->regenerate();

        return response()->json(['message' => 'Logged in successfully.']);
    }

    /**
     *  Se déconnecter
     * @OA\Delete (
     *      path="/api/logout",
     *      tags={"Users"},
     *
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="utilisateur déconnecter avec succés")
     *          )
     *      )
     *  )
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully.']);
    }
}
