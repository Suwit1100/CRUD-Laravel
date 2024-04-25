<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class CRUDfoodController extends Controller
{
    public function view_manage()
    {
        Paginator::useBootstrap();
        $foods = DB::table('food')->paginate(4);
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

    public function delete(Request $request, $id)
    {
        // dd($id);
        $food = Food::where('id', $id)
            ->first();
        // dd($food);

        $location_path = 'assets/imgfood/';

        if (file_exists($location_path . $food->img_food)) {
            // dd(11111111);
            if ($food->img_food != '') {
                unlink($location_path . $food->img_food);
            }
        }
        $food->delete();

        return redirect()->back()->with('success_delete', 'ลบข้อมูลสำเร็จ');
    }
}
