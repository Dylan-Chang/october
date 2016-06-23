<?php

namespace Chang\Construct\Components;

/*
 *
 */

interface Subject {

    public function registerObserver($o);

    public function removeObserver($o);

    public function notifyObserver();
}
