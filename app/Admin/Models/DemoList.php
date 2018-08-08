<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemoList extends Model
{
    use SoftDeletes;

    protected $table = 'demo_list';
}
