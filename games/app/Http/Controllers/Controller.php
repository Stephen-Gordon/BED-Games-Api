<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;



 /**
 * @OA\Info(
 *      version="2.0.0",
 *      title="Game API",
 *      description="Stephen Game API",
 *      @OA\Contact(
 *          email="stephengordon48@gmail.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * 
 * @OA\Get(
 *   path="/",
 *   description="Home Page",
 *   @OA\Response(
 *     response="default",
 *     description="Welcomee page")
 *   )
 *   
 * )
 * 
 */





class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}