<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                @php
                    $category = App\Models\Category::getActiveCategory();
                @endphp
                @foreach ($category as $cat)
                    @if (!empty($cat->getActiveSubCategory->count()))
                        <li>
                            <a href="{{ url($cat->slug) }}" class="sf-with-ul">{{ $cat->name }}</a>
                            <ul>
                                @php
                                    $sub_category = App\Models\SubCategory::selectSubCategory($cat->id);
                                @endphp
                                @foreach ($sub_category as $sub_cat)
                                <li><a href="{{ url($cat->slug.'/'.$sub_cat->slug)}}">{{ $sub_cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
                <li>
                    <a href="{{ url('blog') }}">Blog</a>
                </li>
            </ul>
        </nav>

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div>
    </div>
</div>
