<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;
use App\Http\Resources\PlatformCollection;
use App\Http\Resources\PlatformResource;
use App\Models\Platform;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    
    //INDEX


    /**
     * Display a listing of the resource.
     *
 * @OA\Get(
 *     path="/api/platforms",
 *     description="Displays all the platforms",
 *     tags={"Platforms"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Platforms in JSON format"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
 * )
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return new PlatformCollection(Platform::paginate(1));
    }




    //POST



    /**
     * Platform a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/platforms",
     *      operationId="post_platform",
     *      tags={"Platforms"},
     *      summary="Create a new platform",
     *      security={{"bearerAuth":{}}}, 
     *      description="Stores the platform in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "address"},
     *            @OA\Property(property="name", type="string", format="string", example="Dublin Game Shop"),
     *            @OA\Property(property="address", type="string", format="string", example="123 fake street, Dublin, Ireland")
     *          )
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\PlatformResource
     */


    //validates the data in Requests
    
    public function store(StorePlatformRequest $request)
    {
        $platform = Platform::create([
            'name' => $request->name,
            'platform_developer' => $request->platform_developer,
            'description' => $request->description
        ]);
        return new PlatformResource($platform);
    }


    

    //SHOW     BY     ID




    /**
     * Display the specified resource.
     * @OA\Get(
    *     path="/api/platforms/{id}",
    *     description="Gets a platform by ID",
    *     tags={"Platforms"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Platform id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful operation"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
 * )
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\PlatformResource
     */


    public function show(Platform $platform)
    {
        return new PlatformResource($platform);
    }

    /**
     *Update the specified resource in storage
     *
     * @OA\Put(
     *      path="/api/platforms/{id}",
     *      operationId="platforms_put",
     *      tags={"Platforms"},
     *      summary="Create a new Game",
     *      security={{"bearerAuth":{}}}, 
     *      description="Updates the platform in the DB",
     *      @OA\Parameter(
        *          name="id",
        *          description="Platform id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"id","name", "platform_developer", "description"},
     *            @OA\Property(property="name", type="string", format="string", example="Ea Sports"),
     *             @OA\Property(property="platform_developer", type="string", format="string", example="Mobile"),
     *            @OA\Property(property="description", type="string", format="string", example="EA Sports is an American bsed gaming developer")
     *
     *          )
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\PlatformResource
     */
    public function update(UpdatePlatformRequest $request, Platform $platform)
    {
        $platform->update($request->all());
    }




        //DELETE



    /**
     *
     *
     * @OA\Delete(
     *    path="/api/platforms/{id}",
     *    operationId="platforms_destroy",
     *    tags={"Platforms"},
     *    summary="Delete a Platform",
     *    description="Delete a Platform By ID",
     *    security={{"bearerAuth":{}}}, 
     *    @OA\Parameter(name="id", in="path", description="Id of a Platform", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Success",
     *         @OA\JsonContent(
     *         @OA\Property(property="status_code", type="integer", example="204"),
     *         @OA\Property(property="data",type="object")
     *          ),
     *       )
     *      )
     *  )
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platform $platform)
    {
        $platform->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
