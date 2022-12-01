<?php

namespace App\Http\Controllers;
use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Response; 

use Illuminate\Http\Request;

class GameController extends Controller

//200 response = success

//404 = page not found
//401 = Unauthenticated
//403 = forbidden


{

    /**
     * Display a listing of the resource.
     *
 * @OA\Get(
 *     path="/api/games",
 *     description="Displays all the games",
 *     tags={"Games"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Games in JSON format"
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
        //return new GameCollection(Game::all());
        return new GameCollection(Game::with('store')
        ->with('platforms')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/games",
     *      operationId="store",
     *      tags={"Games"},
     *      summary="Create a new Game",
     *      description="Stores the game in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title", "description", "publisher", "platform", "category", "price"},
     *            @OA\Property(property="title", type="string", format="string", example="Sample Title"),
     *            @OA\Property(property="description", type="string", format="string", example="Example description"),
     *            @OA\Property(property="publisher", type="string", format="string", example="EA"),
     *            @OA\Property(property="platform", type="string", format="string", example="PC"),
     *            @OA\Property(property="category", type="string", format="string", example="Sports"),
     *             @OA\Property(property="price", type="integer", format="integer", example="1")
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
     * @return \Illuminate\Http\GameResource
     */


    public function store(Request $request)
    {
        
        $game = Game::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            'store_id' => $request->store_id
        ]);

        $game->platforms()->attach($request->platforms);

        return new GameResource($game);
    }

    
    

    /**
     * Display the specified resource.
     * @OA\Get(
    *     path="/api/games/{id}",
    *     description="Gets a game by ID",
    *     tags={"Games"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Game id",
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
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\GameResource
     */



    public function show(Game $game)
    {
        return new GameResource($game);
    }




     /**
     *Update the specified resource in storage
     *
     * @OA\Put(
     *      path="/api/games/{id}",
     *      operationId="put",
     *      tags={"Games"},
     *      summary="Create a new Game",
     *      description="Stores the game in the DB",
     *      @OA\Parameter(
        *          name="id",
        *          description="Game id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"id","title", "description", "category", "price"},
     *            @OA\Property(property="title", type="string", format="string", example="Sample Title"),
     *            @OA\Property(property="description", type="string", format="string", example="Example description"),
     *            @OA\Property(property="category", type="string", format="string", example="Sports"),
     *             @OA\Property(property="price", type="integer", format="integer", example="1")
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
     * @return \Illuminate\Http\GameResource
     */



    public function update(Request $request, Game $game)
    {
        $game->update($request->only([
            'title', 
            'description', 
            'category', 
            'price',
            'store_id'
        ]));
        
        return new GameResource($game);
    }

    
    

    /**
     *
     *
     * @OA\Delete(
     *    path="/api/games/{id}",
     *    operationId="destroy",
     *    tags={"Games"},
     *    summary="Delete a Game",
     *    description="Delete a Game By ID",
     *    @OA\Parameter(name="id", in="path", description="Id of a Game", required=true,
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
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */



     public function destroy(Game $game)
    {
        $game->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    } 
}
