<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chang\Construct\Components;

class ConcreteSubject implements Subject{
    
    public $observer;
    
    public function __construct() {
        $this->observer = array();
    }


    public function notifyObserver() {
        
    }

    public function registerObserver($o) {
        $this->observer = $o;
    }

    public function removeObserver($o) {
        
    }

}
