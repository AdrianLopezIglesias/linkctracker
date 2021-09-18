<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use App\Models\Link; 
use App\Helpers\TokenGenerator;

/**
 * Class LinkController
 * @package App\Http\Controllers\API
 */

class LinkAPIController extends AppBaseController
{
  protected $url;

  public function __construct(UrlGenerator $url) {
    $this->url = $url;
  }

  public function create(Request $request){
    if($request->target){
      $link = new Link; 
      $link->original = $request->target; 
      $link->expiration_date = $request->expiration_date; 
      $link->password = $request->password; 
      $link->valid = true; 
      $link->masked = $this->url->to('/')."/l/". TokenGenerator::getToken(5);
      $link->save();
      $response['target'] = $link->original; 
      $response['link'] = $link->masked; 
      $response['valid'] = $link->valid; 
      if($link->expiration_date){
        $response['expiration_date'] = $link->expiration_date; 
      }
      return ($response);
    }
    return "empty url" ;
  }





}
