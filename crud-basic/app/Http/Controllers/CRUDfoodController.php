<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDfoodController extends Controller
{
    public function view_manage()
    {
        $foods = DB::table('food')->paginate(6);
        // dd($foods);
        return view('managefood', compact('foods'));
    }

    public function add_food(Request $request)
    {
        $request_img = $request->file('img');
        $namefood = 'food' . time() . '_' . $request_img->getClientOriginalName();
        $request_img->move(public_path('assets/imgfood'), $namefood);

        DB::table('food')->insert([
            'name_food' => $request['name'],
            'price_food' => $request['price'],
            'img_food' => $namefood,
        ]);

        return redirect()->back()->with('success-add', 'เพิ่มข้อมูลสำเร็จ');
    }

    public function edit_data(Request $request, $id)
    {
        $food = DB::table('food')->where('id', $id)->first();
        return view('editfood', compact('food'));
    }

    public function update_data(Request $request)
    {
        // dd($request->all());
        $checknew_img = $request->has('img');
        if ($checknew_img) {
            // dd('1111');
            $imgfile = $request->file('img');
            $namefood = 'food' . time() . '_' . $imgfile->getClientOriginalName();
            $imgfile->move(public_path('assets/imgfood'), $namefood);

            $old_img = $request->old_img;
            if (file_exists('assets/imgfood/' . $old_img)) {
                if ($old_img != '') {
                    unlink('assets/imgfood/' . $old_img);
                }
            }

            Food::where('id', $request['id'])->update([
                'name_food' => $request['name'],
                'price_food' => $request['price'],
                'img_food' => $namefood,
            ]);
        } else {
            // dd($request->all());
            $old_img = $request->old_img;
            Food::where('id', $request['id'])->update([
                'name_food' => $request['name'],
                'price_food' => $request['price'],
                'img_food' => $request['old_img'],
            ]);
        }

        return redirect()->back()->with('success-update', 'แก้ไขข้อมูลสำเร็จ');
    }
}
