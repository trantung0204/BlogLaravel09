<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends \Illuminate\Database\Eloquent\Model 
{
    use \Conner\Tagging\Taggable;
}
