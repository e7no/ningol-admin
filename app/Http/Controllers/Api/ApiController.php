<?php

namespace App\Http\Controllers\Api;

use App\Admin\Models\DemoCat;
use App\Admin\Models\DemoDetail;
use App\Admin\Models\DemoList;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index($id)
    {
        return DemoList::where('cat_id', $id)->get();
    }

    public function category()
    {
        return DemoCat::get(['cat_id', 'cat_name']);
    }

    public function detail($id)
    {
        return DemoDetail::where('demo_id', $id)->get();
    }
}
