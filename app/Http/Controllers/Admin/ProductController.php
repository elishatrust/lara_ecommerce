<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function list()
    {
        $data['product'] = Product::getProduct();
        $data['title'] = 'Product List';
        return view('admin.product.list',$data);
    }
    public function add()
    {
        $data['title'] = 'Add New Product';
        return view('admin.product.add', $data);
    }
    public function save(Request $request)
    {
        $product = new Product();
        $product->title = trim($request->title);
        $product->created_by = Auth::user()->id;
        $product->save();

        $slug = Str::slug(trim($request->title), "-");

        $checkSlug = Product::checkSlug($slug);
        if(empty($checkSlug)){
            $product->slug = $slug;
            $product->save();
        }else{
            $new_slug = $slug."-".$product->id;
            $product->slug = $new_slug;
            $product->save();
        }

        return redirect('admin/product/edit/'.Crypt::encrypt($product->id))->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
        $productID = Crypt::decrypt($id);
        $product = Product::getSingle($productID);

        $data['brand'] = Brand::getActiveBrand();
        $data['color'] = Color::getActiveColor();
        $data['category'] = Category::getActiveCategory();

        if(!empty($product))
        {
            $data['title'] = 'Edit Product';
            $data['product'] = $product;
            $data['sub_category'] = SubCategory::selectSubCategory($product->category_id);
            return view('admin.product.edit', $data);
        }else{

            return redirect()->back()->with('error', 'Product not found');
        }
    }

    public function delete($id)
    {
        $productID = Crypt::decrypt($id);
        $product = Product::getById($productID);
        if ($product) {
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        $productID = Crypt::decrypt($id);
        $product = Product::getSingle($productID);
        if(!empty($product))
        {
            $product->title = trim($request->title);
            $product->sku = trim($request->sku);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->brand_id = trim($request->brand_id);
            $product->price = trim($request->price);
            $product->old_price = trim($request->old_price);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->additional_info = trim($request->additional_info);
            $product->shipping_returns = trim($request->shipping_returns);
            $product->status = trim($request->status);
            $product->created_by = Auth::user()->id;
            $product->save();



            ## Delete product if exist
            // $deleteProduct = ProductColor::deleteProduct($productID);
            // if($deleteProduct)
            // {

            // }

            ProductColor::deleteProduct($productID);

            if(!empty($request->color_id))
            {
                foreach ($request->color_id as $color_id)
                {
                    $color = new ProductColor;
                    $color->color_id = $color_id;
                    $color->product_id = $productID;
                    $color->save();
                }
            }

            return redirect()->back()->with('success', 'Product added successfully');

        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }

}

