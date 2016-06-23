<?php

namespace Chang\Construct\Models;

use Model;

class Builder extends Model {

    protected $table = 'cd_cards';
    
    /*
    public $belongsToMany = [
        'groups' => ['Chang\Construct\Models\Sets', 'table' => 'cd_sets']
    ];*/
    
       public $attachOne = [
        'avatar' => ['System\Models\File']
    ];
    
}
