<?php

namespace App\Http\Controllers\Admin\Division;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function create()
    {
        return view('backend.division.add_devision');
    }
}
