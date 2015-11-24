<?php

namespace App;
use Jenssegers\Mongodb\Model as Eloquent;
use Carbon\Carbon;
class Users extends Eloquent{
    protected $fillable=['password','email'];
    
}
