<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\LinkStatistic; 
use App\Models\Link; 



class LinkStatisticAPIController extends AppBaseController
{
  public function get($url) {
    if ($url) {
      $link = Link::where('masked', $url)->get()->last();
      $statistics = LinkStatistic::where('link_id', $link->id)->get();
      return count($statistics); 
    }
    return "empty url";
}


}