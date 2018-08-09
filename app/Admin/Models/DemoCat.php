<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemoCat extends Model
{
    use SoftDeletes;
    protected $table = 'demo_cat';
    protected $primaryKey = 'cat_id';

    public function demolist()
    {
        return $this->belongsTo(DemoList::Class);
    }

}
