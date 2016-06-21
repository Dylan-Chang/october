<?php

namespace RainLab\User\Controllers;

use Redirect;
use BackendAuth;
use BackendMenu;
use Backend\Classes\Controller;
use Backend\Widgets\ReportContainer;
use DB;
use Storage;

/**
 * Dashboard controller
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 *
 */
class Builder extends Controller {

    public function index() {
        $rs = DB::select('select * from cd_cards limit 1');
        //  var_dump($rs);
        //    exit;
        // $sets = DB::select('select * from cd_cards');
          var_dump($rs);
  
        exit;
    }

    //构建
    public function cards() {
        //     $rs = DB::select('select * from cards group by set');
        $sets = DB::select('select * from cd_cards');
        //   $rs = file_put_contents('cards.josn', json_encode($sets));
        $rs = Storage::disk('local')->put('cards.josn', json_encode($sets));
        var_dump($rs);
        exit;
    }

    //构建
    public function sets() {
        //     $rs = DB::select('select * from cards group by set');
        $sets = DB::select('select * from cd_sets');
        //  var_dump($rs);
        $rs = file_put_contents('sets.josn', json_encode($sets));
        var_dump($rs);
        exit;
    }

    public function builder() {
        //     $rs = DB::select('select * from cards group by set');
        $sets = DB::select('select * from cd_sets');
        return view("cards.deck-builder", ['sets' => $sets]);
    }

}
