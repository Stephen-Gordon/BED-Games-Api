<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Resources\StoreCollection;
use App\Http\Resources\StoreResource;
use App\Models\Store;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    
    //INDEX


    /**
     * Display a listing of the resource.
     *
 * @OA\Get(
 *     path="/api/stores",
 *     description="Displays all the stores",
 *     tags={"Stores"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Stores in JSON format"
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
        return new StoreCollection(Store::paginate(1));
    }




    //POST



    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/stores",
     *      operationId="post",
     *      tags={"Stores"},
     *      summary="Create a new Store",
     *      description="Stores the Game Store in the DB",
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
     * @return \Illuminate\Http\StoreResource
     */

    
    public function store(StoreStoreRequest $request)
    {
        $store = Store::create([
            'name' => $request->name,
            'address' => $request->address
        ]);
        return new StoreResource($store);
    }



    //SHOW     BY     ID




    /**
     * Display the specified resource.
     * @OA\Get(
    *     path="/api/stores/{id}",
    *     description="Gets a store by ID",
    *     tags={"Stores"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Store id",
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
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\StoreResource
     */


    public function show(Store $store)
    {
        return new StoreResource($store);
    }

    /**
     *Update the specified resource in storage
     *
     * @OA\Put(
     *      path="/api/stores/{id}",
     *      operationId="stores_put",
     *      tags={"Stores"},
     *      summary="Create a new Game",
     *      description="Stores the updated Game Store in the DB",
     *      @OA\Parameter(
        *          name="id",
        *          description="Store id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"id","name", "address"},
     *            @OA\Property(property="name", type="string", format="string", example="Dublin Game Shop"),
     *            @OA\Property(property="address", type="string", format="string", example="123 fake street, Dublin, Ireland")
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
     * @return \Illuminate\Http\StoreResource
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->all());
    }




        //DELETE



    /**
     *
     *
     * @OA\Delete(
     *    path="/api/stores/{id}",
     *    operationId="store_destroy",
     *    tags={"Stores"},
     *    summary="Delete a Store",
     *    description="Delete a Store By ID",
     *    @OA\Parameter(name="id", in="path", description="Id of a Store", required=true,
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
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
