<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ProductController
{
    public function list(){
        return view('admin.products.list');
    }
}
