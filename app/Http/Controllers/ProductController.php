<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\File ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::all();
        return view('admin.products.index',compact('product'));
    }

    public function add()
    {
        $category= Category::all();
        return view('admin.products.add',compact('category'));
    }
    
    public function insert(Request $request)
    {
     
        $product = new Product;
        
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/product/',$filename);
            $product->image=$filename;
        }
        $product->cate_id=$request->cate_id;
        $product->name=$request->name;
        $product->slug=$request->slug;

        $product->small_description=$request->small_description;
        $product->description=$request->description;
        $product->original_price=$request->original_price;
        $product->selling_price=$request->selling_price;
        $product->tax=$request->tax;
        $product->qty=$request->qty;
        $product->status=$request->status==true?"1":"0";
        $product->trending=$request->trending==true?"1":"0";
        $product->meta_title=$request->meta_title;
        $product->meta_keywords=$request->meta_keywords;
        $product->meta_description=$request->meta_description;
        $product->save();
        return redirect('/products')->with('success',"Product Added Successfully");
        
    }
    public function edit(Request $request,$id)
    {
           $product = Product::find($id);
       return view('admin.products.edit',compact('product'));
    }


    public  function update(Request  $request,$id)
    {
        $product =  Product::find($id);
        
        if($request->hasFile('image'))
        {
            $path = 'uploads/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/product/',$filename);
            $product->image=$filename;
        }
        $product->cate_id=$request->cate_id;
        $product->name=$request->name;
        $product->slug=$request->slug;

        $product->small_description=$request->small_description;
        $product->description=$request->description;
        $product->original_price=$request->original_price;
        $product->selling_price=$request->selling_price;
        $product->tax=$request->tax;
        $product->qty=$request->qty;
        $product->status=$request->status==true?"1":"0";
        $product->trending=$request->trending==true?"1":"0";
        $product->meta_title=$request->meta_title;
        $product->meta_keywords=$request->meta_keywords;
        $product->meta_description=$request->meta_description;
        $product->update();
        return redirect('/products')->with('update',"Product Updated Successfully");
        

    }
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect('/products')->with('delete','Product Deleted Successfully');
    }

    
}
