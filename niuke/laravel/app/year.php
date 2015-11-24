<?php

namespace App;
use Jenssegers\Mongodb\Model as Eloquent;
use Carbon\Carbon;
class Year extends Eloquent{
    protected $collection="year";
}
