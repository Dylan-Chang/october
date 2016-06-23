<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace chang\construct;
use App;
use Event;
use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;

class Plugin extends PluginBase {

    public $elevated = true;

    public function pluginDetails() {
        return [
            'name' => 'construct Plugin',
            'description' => 'Provides some really cool blog features.',
            'author' => 'ACME Corporation',
            'icon' => 'icon-leaf'
        ];
    }

    public function registerComponents() {
        return [
      //      'chang\construct\Components\Builder' => 'builder',
        //    'chang\construct\Components\Character' => 'charater',
        ];
    }

    public function registerNavigation() {
        return [
            'construct' => [
                'label' => 'construct',
                'url' => Backend::url('chang/construct/builder'),
                'icon' => 'icon-user',
                'permissions' => ['chang.construct.*'],
                'order' => 500,
            ]
        ];
    }

}
