<?php

namespace chang\construct\Controllers;

use Redirect;
use BackendAuth;
use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;
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
    
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig;
    
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Chang.Construct', 'construct', 'builder');
        SettingsManager::setContext('Chang.Construct', 'settings');
    }
    /*
      public function index() {
      $rs = DB::select('select * from cd_cards limit 1');
      //  var_dump($rs);
      //    exit;
      // $sets = DB::select('select * from cd_cards');
      var_dump($rs);

      exit;
      } */

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
    
   



    /**
     * Manually activate a user
     */
    public function update_onActivate($recordId = null)
    {
        $model = $this->formFindModelObject($recordId);

        $model->attemptActivation($model->activation_code);

        Flash::success(Lang::get('rainlab.user::lang.users.activated_success'));

        if ($redirect = $this->makeRedirect('update', $model)) {
            return $redirect;
        }
    }

    /**
     * Force delete a user.
     */
    public function update_onDelete($recordId = null)
    {
        $model = $this->formFindModelObject($recordId);

        $model->forceDelete();

        Flash::success(Lang::get('backend::lang.form.delete_success'));

        if ($redirect = $this->makeRedirect('delete', $model)) {
            return $redirect;
        }
    }

    /**
     * Deleted checked users
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $userId) {
                if (!$user = User::find($userId)) {
                    continue;
                }
                $user->delete();
            }

            Flash::success(Lang::get('rainlab.user::lang.users.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('rainlab.user::lang.users.delete_selected_empty'));
        }

        return $this->listRefresh();
    }

}
