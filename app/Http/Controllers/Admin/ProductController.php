<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Str;
use Image;
use File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate();
        return view('admin.product.index',compact('products'));
    }

    public function fromproduct(){
        return view('admin.product.create');
    }

    public function create(Request $request){
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'price' => 'required|max:255',
                'image' => 'mimes:jpeg,jpg,png,gif|file|max:12040',
            ],
            [
                'name.required' => 'กรุณาป้อนข้อมูลชื่อสินค้า',
                'name.max' => 'กรอกข้อมูลได้สูงสุด 255 ตัวอักษร',
                'price.required' => 'กรุณาป้อนข้อมูลราคา',
                'price.max' => 'กรอกข้อมูลได้สูงสุด 255 ตัวอักษร',
                'image.mimes' => 'กรุณาอัพโหลดภาพนามสกุล jpeg,jpg,png,gif เท่านั้น',
                'image.file' => 'อัพโหลดได้เฉพาะไฟล์ภาพ',
                'image.max' => 'อัพโหลดขนาดไม่เกิน 10MB',
            ]
        );
        $product  = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->detail = $request->detail;
        if ($request->hasFile('image')) {
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/admin/images/', $filename);
            Image::make(public_path() . '/admin/images/' . $filename);
            $product->image = $filename;
        } else {
            $product->image = 'NOPIC.jpg';
        }
        $product->save();

        return redirect()->route('index.product')->with('success','บันทึกข้อมูลเรียบร้อย');
    }

    public function edit($id){
        $edit = Product::find($id);
        return view('admin.product.edit',compact('edit'));
    }

    public function update(Request $request,$id){
        $validateData = $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|file|max:12040',
            ],
            [
                'name.required' => 'กรุณาป้อนชื่อสินค้า',
                'price.required' => 'กรุณาป้อนราคาสินค้า',
                'image.mimes' => 'กรุณาอัพโหลดภาพนามสกุล jpeg,jpg,png,gif เท่านั้น',
                'image.file' => 'อัพโหลดได้เฉพาะไฟล์ภาพ',
                'image.max' => 'อัพโหลดขนาดไม่เกิน 10MB',

            ]
        );
        if ($request->hasFile('image')) {
            $product = Product::find($id);
            if ($product->image != 'NOPIC.jpg') {
                File::delete(public_path() . '/admin/images/' . $product->image);
            }
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/admin/images/', $filename);
            Image::make(public_path() . '/admin/images/' . $filename);
            $product->image = $filename;
            $product->name = $request->name;
            $product->detail = $request->detail;
            $product->price = $request->price;
        } else {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->detail = $request->detail;
            $product->price = $request->price;
        }

        $product->save();
        return redirect()->route('index.product')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

    public function delete($id){
        $delete = Product::find($id);
        if ($delete->image != 'NOPIC.jpg') {
            File::delete(public_path().'/admin/images/'.$delete->image);
        }
        $delete->delete();
        return redirect()->route('index.product')->with('del','ลบข้อมูลเรียบร้อย');
    }
}
