<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use App\Models\Link;
use App\Models\LinkStatistic;
use App\Helpers\TokenGenerator;
use Carbon\Carbon;

/**
 * Class LinkController
 * @package App\Http\Controllers\API
 */

class LinkAPIController extends AppBaseController {
  protected $url;

  public function __construct(UrlGenerator $url) {
    $this->url = $url;
  }

  public function create(Request $request) {
    if ($request->target) {
      $link = new Link;
      $link->original = $request->target;
      $link->expiration_date = $request->expiration_date;
      $link->password = $request->password;
      $link->valid = true;
      $link->masked = TokenGenerator::getToken(5);
      $link->save();
      $response['target'] = $link->original;
      $response['link'] = $this->url->to('/') . "/l/" . $link->masked;
      $response['valid'] = $link->valid;
      if ($link->expiration_date) {
        $response['expiration_date'] = $link->expiration_date;
      }
      return ($response);
    }
    return "empty url";
  }

  public function redirect($url, Request $request) {
    $link = Link::where('masked', $url)->get()->last();
    if ($link->valid && $link->expiration_date >= (Carbon::now())->toDateTimeString()) {
      $statistic = new LinkStatistic;
      $statistic->user_ip = $request->ip();
      $statistic->link_id = $link->id;
      $statistic->save();      
      return $link->original;
    }
    abort(404);
  }
  public function invalidate($url) {
    if ($url) {
      $link = Link::where('masked', $url)->get()->last();
      $link->valid = false;
      $link->save();
      return "Link invalidated";
    }
    return "empty url";
  }


}
