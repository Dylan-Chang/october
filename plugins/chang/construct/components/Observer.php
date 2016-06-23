<?php

namespace Chang\Construct\Components;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
interface Observer{
    public function update($temp,$humidity,$pressure);
}

