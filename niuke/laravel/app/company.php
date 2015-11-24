<?php

namespace App;
use Jenssegers\Mongodb\Model as Eloquent;
use Carbon\Carbon;
class Company extends Eloquent{
    protected $collection="company";
}
