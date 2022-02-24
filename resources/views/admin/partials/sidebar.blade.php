<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item category {{ request()->is('admin/category*') ? 'active' : '' }}" href="{{ route('admin.category.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Category</span>
            </a>
        </li>
         <li>
            <a class="app-menu__item puja {{ request()->is('admin/puja*') ? 'active' : '' }}" href="{{ route('admin.puja.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Puja</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item puja-service {{ request()->is('admin/puja-service*') ? 'active' : '' }}" href="{{ route('admin.puja-service.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Puja Service</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item banner {{ request()->is('admin/banner*') ? 'active' : '' }}" href="{{ route('admin.banner.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Banner</span>
            </a>
        </li>
         <li>
            <a class="app-menu__item content {{ request()->is('admin/content*') ? 'active' : '' }}" href="{{ route('admin.content.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Content</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item customer {{ request()->is('admin/customer*') ? 'active' : '' }}" href="{{ route('admin.customer.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Customer</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item booking {{ request()->is('admin/booking*') ? 'active' : '' }}" href="{{ route('admin.booking.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Booking Report</span>
            </a>
        </li>

        
        {{--<li>
            <a class="app-menu__item {{ sidebar_open(['admin.users']) }}"
        href="{{ route('admin.users.index') }}"><i class="app-menu__icon fa fa-group"></i>
        <span class="app-menu__label">User Management</span>
        </a>
        </li> --}}
        {{-- <li>
            <a class="app-menu__item" href="{{ route('admin.banner.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Banner</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.blog.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Blog</span>
            </a>
        </li>
        <li class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <a class="app-menu__item" href="javascript:void(0)"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Category</span>

               
            </a>
            <ul class="app-menu collapse pb-0" id="collapseOne" aria-labelledby="headingOne"
                    data-parent="#accordion">
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level One Category</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.level-two-category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level Two Sub-Category</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.level-three-category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level Three Sub-Category</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.level-four-category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level Four Sub-Category</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.level-five-category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level Five Sub-Category</span>
                        </a>
                    </li>
                </ul>
        </li> --}}


        {{-- <li>
            <a class="app-menu__item" href="{{ route('admin.coupon.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Coupon</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.brand.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Brand</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.seller-management.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Seller Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.product.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Product</span>
            </a>
        </li>


        <li>
            <a class="app-menu__item" href="{{ route('admin.customer.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Customer Management</span>
            </a>
        </li> --}}

   
        {{-- <li>
            <a class="app-menu__item" href="{{ route('admin.setting.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Setting</span>
            </a>
        </li> --}}
       

    </ul>
</aside>

<script>
    $urlData = document.getElementsByClassName('app-menu__item');
    $a = window.location.href;
    console.log($a)
    if($a.includes('banner')){
        $urlData.add('active');
    }else{
        console.log('false')
    }
</script>