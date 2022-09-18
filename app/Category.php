<?php

namespace App;

use App;
use App\Traits\Lang;
use App\Traits\IsDefault;
use App\Traits\Active;
use App\Traits\Sorted;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use Lang;
	use IsDefault;
	use Active;
	use Sorted;
	
    protected $table = 'category';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
   

}
