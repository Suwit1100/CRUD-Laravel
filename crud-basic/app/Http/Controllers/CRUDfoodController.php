<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class CRUDfoodController extends Controller
{
    public function view_manage()
    {
        return view('managefood');
    }

    public function add_food(Request $request)
    {
        $data_request = $request->all();

        $request_img = $request->file('img');
        $namefood = 'food' . time() . '_' . $request_img->getClientOriginalName();
        $request_img->move(public_path('assets/imgfood'), $namefood);

        new Food([
            'name_food' => $request['name'],
            'price_food' => $request['price'],
            'img_food' => $namefood,
        ]);

        return redirect()->back()->with('success-add', 'เพิ่มข้อมูลสำเร็จ');
    }
}
