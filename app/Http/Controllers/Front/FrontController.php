<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meta_title = 'LaraShop | E-commerce';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.index', $data );

        }else{
            abort(404);
        }
    }
    public function blog()
    {
        $meta_title = 'LaraShop | E-commerce | Blog';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.blog', $data );

        }else{
            abort(404);
        }
    }

    public function contact()
    {
        $meta_title = 'LaraShop | E-commerce | Contact Us';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.contact', $data );

        }else{
            abort(404);
        }
    }

    public function about()
    {
        $meta_title = 'LaraShop | E-commerce | About Us';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.about', $data );

        }else{
            abort(404);
        }
    }

    public function privacy_policy()
    {
        $meta_title = 'LaraShop | E-commerce | Privacy Policy';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.privacy-policy', $data );

        }else{
            abort(404);
        }
    }

    public function terms_conditions()
    {
        $meta_title = 'LaraShop | E-commerce | Terms And Conditions';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.terms-and-conditions', $data );

        }else{
            abort(404);
        }
    }

    public function track_order()
    {
        $meta_title = 'LaraShop | E-commerce | Track Order';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.track-order', $data );

        }else{
            abort(404);
        }
    }

    public function payment_method()
    {
        $meta_title = 'LaraShop | E-commerce | Payment Methods';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.payment-method', $data );

        }else{
            abort(404);
        }
    }

    public function money_back_guarantee()
    {
        $meta_title = 'LaraShop | E-commerce | Money Back Guarantee';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.money-back-guarantee', $data );

        }else{
            abort(404);
        }
    }

    public function returns()
    {
        $meta_title = 'LaraShop | E-commerce | Returns';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.returns', $data );

        }else{
            abort(404);
        }
    }

    public function cart()
    {
        $meta_title = 'LaraShop | E-commerce | Cart';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.cart', $data );

        }else{
            abort(404);
        }
    }

    public function wishlist()
    {
        $meta_title = 'LaraShop | E-commerce | Wishlist';

        if(!empty($meta_title))
        {
            $data['meta_title'] = $meta_title;
            return view('front.pages.wishlist', $data );

        }else{
            abort(404);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
