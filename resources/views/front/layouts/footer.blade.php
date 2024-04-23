<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">

                        <a href="{{ url('/') }}" class="logo m-auto">
                            <h4>
                                <span style="color:#007bff;">LARA </span>
                                <span style="color:#ff0000;">SHOP</span>
                            </h4>
                        </a>
                        {{-- <img src="{{ url('public/assets-front/images/logo-footer.png') }}" class="footer-logo" alt="Footer Logo" width="105" height="25"> --}}
                        <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                        <div class="social-icons">
                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4>

                        <ul class="widget-list">
                            <li><a href="{{ url('about')}}">About Us</a></li>
                            <li><a href="{{ url('contact') }}">Contact us</a></li>
                            <li><a href="#signin-modal" data-toggle="modal">Log in</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>

                        <ul class="widget-list">
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back guarantee!</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>

                        <ul class="widget-list">
                            <li><a href="#signin-modal" data-toggle="modal">Sign In</a></li>
                            <li><a href="{{ url('cart') }}">View Cart</a></li>
                            <li><a href="{{ url('Wishlist') }}">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2020-{{ date('Y') }} LaraShop Store. All Rights Reserved.</p>
            <figure class="footer-payments">
                <img src="{{ url('public/assets-front/images/payments.png') }}" alt="Payment methods" width="272" height="20">
            </figure>
        </div>
    </div>
</footer>
