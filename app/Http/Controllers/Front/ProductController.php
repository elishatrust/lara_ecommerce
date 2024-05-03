<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getCategory($slug, $subslug = '')
    {
        $getCategory = Category::getSingleSlug($slug);
        $getSubCategory = SubCategory::getSingleSlug($subslug);
        $data['filterColor'] = Color::getActiveColor();
        $data['filterBrand'] = Brand::getActiveBrand();

        if(!empty($getCategory) && !empty($getSubCategory))
        {
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->description;
            $data['meta_keyword'] = $getSubCategory->meta_keyword;

            $data['showProduct'] = Product::showProduct($getCategory->id, $getSubCategory->id);
            $data['filterSubCategory'] = SubCategory::selectSubCategory($getCategory->id);

            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;
            return view('front.product.list', $data);
        }
        elseif(!empty($getCategory))
        {
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->description;
            $data['meta_keyword'] = $getCategory->meta_keyword;

            $data['showProduct'] = Product::showProduct($getCategory->id);
            $data['filterSubCategory'] = SubCategory::selectSubCategory($getCategory->id);

            $data['getCategory'] = $getCategory;
            return view('front.product.list', $data);
        }
        else{
            abort(404);
        }
    }

    public function filterProduct(Request $request)
    {
        $showProduct = Product::showProduct();

        dd($showProduct);
    }

}
