@php
$favicon = App\Models\BackendModels\Logo::where("type", "Logo")->first();
@endphp
<style>
    .fa-lg {
    width: 20px;
    height: 20px;
    font-size: 16px;
    margin-right: 6px;
}

</style>
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('admin-home') }}"><img class="img-fluid for-light" src="{{url('public/logos/'.$favicon->image)}}"
                    alt="" width="100px" height="100px" style="background: lightgray"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('admin-home') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ route('admin-home') }}"><img class="img-fluid"
                                src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">

                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title"
                            href="{{ route('home') }}" target="_blank"><span class="lan-3
                            "><i class="fa fa-globe fa-lg" aria-hidden="true"></i> Go To Website</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin-home'? 'active': '' }}
                            {{ Route::currentRouteName() == 'admin-home' ? 'active' : '' }}"
                            href="{{ route('admin-home') }}"><span class="lan-3
                            "><i class="fa fa-home fa-lg" aria-hidden="true"></i> Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title  {{ Route::currentRouteName() == 'logo.index'  ? 'active': '' }} {{ Route::currentRouteName() == 'logo.edit'  ? 'active': '' }}
                            {{ Route::currentRouteName() == 'page-content.index'  ? 'active': '' }}  {{ Route::currentRouteName() == 'page-content.edit'  ? 'active': '' }}
                            {{ Route::currentRouteName() == 'banner.index'  ? 'active': '' }} {{ Route::currentRouteName() == 'banner.edit'  ? 'active': '' }}
                            {{ Route::currentRouteName() == 'privacy-policy.index'  ? 'active': '' }}  {{ Route::currentRouteName() == 'privacy-policy.edit'  ? 'active': '' }}
                            {{ Route::currentRouteName() == 'terms-conditions.index'  ? 'active': '' }} {{ Route::currentRouteName() == 'terms-conditions.edit'  ? 'active': '' }}
                            {{ Route::currentRouteName() == 'page.index'  ? 'active': '' }}  {{ Route::currentRouteName() == 'page.edit'  ? 'active': '' }}"
                            href="#">
                            <span class="lan-3 "><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Layout Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == 'admin/cms' ? 'down' : 'right' }}
                                    "></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->getPrefix() == 'admin/cms' ? 'block;' : 'none;' }}
                            ">
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'logo.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'logo.edit' ? 'active' : '' }}"
                                        href="{{ route('logo.index') }}">Add Logo</a>
                                    </li>
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'page-content.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'page-content.edit' ? 'active' : '' }}"
                                    href="{{ route('page-content.index') }}">Page Content</a>
                            </li>

                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'banner.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'banner.edit' ? 'active' : '' }}"
                                href="{{ route('banner.index') }}">Banner Management</a>
                            </li>
                              {{-- update work --}}
                            {{-- <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'offers.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'offers.edit' ? 'active' : '' }}"
                                href="{{ route('offers.index') }}">Offers Management</a>
                            </li> --}}
                            {{-- <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'privacy-policy.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'privacy-policy.edit' ? 'active' : '' }}"
                                href="{{ route('privacy-policy.index') }}">Privacy Policy</a>
                            </li> --}}
                            {{-- <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'terms-conditions.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'terms-conditions.edit' ? 'active' : '' }}"
                                href="{{ route('terms-conditions.index') }}">Terms & Conditions</a>
                            </li> --}}
                                {{-- update work --}}
                            {{-- <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'page.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'page.edit' ? 'active' : '' }}"
                                href="{{ route('page.index') }}">Website Pages </a>
                            </li> --}}
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'brand.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'brand.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'brand.create' ? 'active' : '' }}"
                            href="{{ route('brand.index') }}"><span
                                class="lan-3"><i class="fa fa-bold fa-lg" aria-hidden="true"></i>
                                Brand Management </span>

                        </a>

                    </li>

                    {{-- end --}}





                    {{-- Category Management --}}

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ Route::currentRouteName() == 'parent-category.index'  ? 'active': '' }} {{ Route::currentRouteName() == 'parent-category.create'  ? 'active': '' }} {{ Route::currentRouteName() == 'parent-category.edit'  ? 'active': '' }}
                            {{ Route::currentRouteName() == 'main-category.index'  ? 'active': '' }}  {{ Route::currentRouteName() == 'main-category.create'  ? 'active': '' }} {{ Route::currentRouteName() == 'main-category.edit'  ? 'active': '' }}
                            {{ Route::currentRouteName() == 'sub-category.index'  ? 'active': '' }} {{ Route::currentRouteName() == 'sub-category.create'  ? 'active': '' }} {{ Route::currentRouteName() == 'sub-category.edit'  ? 'active': '' }}"

                            href="#">
                            <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Category  Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == 'admin/category' ? 'down' : 'right' }}"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->getPrefix() == 'admin/category' ? 'block;' : 'none;' }}">
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'parent-category.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'parent-category.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'parent-category.edit' ? 'active' : '' }}"
                                    href="{{route('parent-category.index')}}">Parent Category</a>
                            </li>
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'main-category.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'main-category.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'main-category.edit' ? 'active' : '' }}"
                                    href="{{route('main-category.index')}}">Main Category</a>
                            </li>
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'sub-category.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'sub-category.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'sub-category.edit' ? 'active' : '' }}"
                                    href="{{route('sub-category.index')}}">Sub Category</a>
                            </li>
                        </ul>
                    </li>

                    {{-- end --}}
                      {{-- Product Management --}}

                      <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'product.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}"
                            href="{{ route('product.index') }}"><span
                                class="lan-3"><i class="fa fa-product-hunt fa-lg" aria-hidden="true"></i> Product Management </span>

                        </a>

                    </li>
                    {{-- Attribute Management update work 13--}}

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'variants.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'variants.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'variants.create' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'attribute-value' ? 'active' : '' }} {{ Route::currentRouteName() == 'attribute-value.edit' ? 'active' : '' }}" href="{{ route('variants.index') }}"><span
                                class="lan-3"><i class="fa fa-rss fa-lg" aria-hidden="true"></i> Attribute Management </span>

                        </a>

                    </li>
                    {{-- end Attribute Managemen --}}

                      {{-- Blog Management --}}

                    <!--  <li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                    <!--    {{ Route::currentRouteName() == 'blog-index' ? 'active' : '' }} {{ Route::currentRouteName() == 'blog-edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'blog-create' ? 'active' : '' }}"-->
                    <!--        href="{{ route('blog-index') }}"><span-->
                    <!--            class="lan-3"><i class="fa fa-rss fa-lg" aria-hidden="true"></i> Blog Management </span>-->

                    <!--    </a>-->

                    <!--</li>-->

                    {{-- end --}}

                    {{-- Gallery Management --}}
                    <!--<li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a-->
                    <!--        class="sidebar-link sidebar-title  {{ Route::currentRouteName() == 'gallery.index' ? 'active' : '' }}-->
                    <!--        {{ Route::currentRouteName() == 'edit-gallery' ? 'active' : '' }}-->
                    <!--         {{ Route::currentRouteName() == 'create-gallery' ? 'active' : '' }}"-->
                    <!--        href="{{ route('gallery.index') }}"><span class="lan-3"><span-->
                    <!--                class="lan-3"><i class="fa fa-picture-o fa-lg"aria-hidden="false"></i> Gallery Management</a> </span>-->
                    <!--</li>-->
                    {{-- end --}}

                     {{-- Testimonial Management --}}
                    <!-- <li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                    <!--        {{ Route::currentRouteName() == 'testimonial-index' ? 'active' : '' }}-->
                    <!--         {{ Route::currentRouteName() == 'edit-testimonial' ? 'active' : '' }}-->
                    <!--         {{ Route::currentRouteName() == 'testimonial-create' ? 'active' : '' }}"-->
                    <!--        href="{{ route('testimonial-index') }}"><span-->
                    <!--            class="lan-3"><i class="fa fa-quote-right fa-lg" aria-hidden="true"></i> Testimonial Management  </a> </span>-->

                    <!--</li>-->
                    {{-- end --}}

                    {{-- Faq Management --}}
                    <!--<li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                    <!--    {{ Route::currentRouteName() == 'faqs.index' ? 'active' : '' }}-->
                    <!--    {{ Route::currentRouteName() == 'faqs.create' ? 'active' : '' }}-->
                    <!--    {{ Route::currentRouteName() == 'faqs.edit' ? 'active' : '' }}"-->
                    <!--        href="{{ route('faqs.index') }}">-->
                    <!--         <span-->
                    <!--            class="lan-3"><i class="fa fa-question fa-lg" aria-hidden="false"></i> Faq Management </span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    {{-- end --}}

                    {{-- Portfolio  Management --}}
                    <!--<li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                    <!--    {{ Route::currentRouteName() == 'portfolio.index' ? 'active' : '' }}-->
                    <!--    {{ Route::currentRouteName() == 'portfolio.edit' ? 'active' : '' }}-->
                    <!--    {{ Route::currentRouteName() == 'portfolio.create' ? 'active' : '' }}"-->
                    <!--        href="{{ route('portfolio.index') }}"><span class="lan-3"><i class="fa fa-picture-o fa-lg"aria-hidden="false"></i> Portfolio Management </span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    {{-- end --}}

                     {{-- Package  Management --}}
                     {{-- <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'package.index' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'package.create' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'package.edit' ? 'active' : '' }}"
                        href="{{ route('package.index') }}"><span class="lan-3"><i class="fa fa-picture-o fa-lg"aria-hidden="false"></i> Package Management </span>
                        </a>
                    </li> --}}
                    {{-- end --}}

                        {{-- Location  Management --}}
                        <!--<li class="sidebar-list">-->
                        <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                        <!--    {{ Route::currentRouteName() == 'location.index' ? 'active' : '' }}-->
                        <!--    {{ Route::currentRouteName() == 'location.create' ? 'active' : '' }}-->
                        <!--    {{ Route::currentRouteName() == 'location.edit' ? 'active' : '' }}"-->
                        <!--    href="{{ route('location.index') }}">-->
                        <!--    <span class="lan-3"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> Location Management </span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        {{-- end --}}

                    {{-- Order Management --}}

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title  {{ Route::currentRouteName() == 'orderManagement.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'orderManagement.show' ? 'active' : '' }} {{ Route::currentRouteName() == 'invoice.index' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'cancellation-policy.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-policy.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-policy.edit' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'cancellation-reasons.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-reasons.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-reasons.edit' ? 'active' : '' }}"

                            href="#">
                            <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Order Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == 'admin/orders' ? 'down' : 'right' }}"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->getPrefix() == 'admin/orders' ? 'block;' : 'none;' }}">
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'orderManagement.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'orderManagement.show' ? 'active' : '' }} {{ Route::currentRouteName() == 'invoice.index' ? 'active' : '' }}"
                                    href="{{route('orderManagement.index')}}">All Orders</a>
                            </li>
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'cancellation-policy.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-policy.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-policy.edit' ? 'active' : '' }}"
                                    href="{{route('cancellation-policy.index')}}">Cancellation Policy</a>
                            </li>
                             {{-- <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'refund-policy.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'refund-policy.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'refund-policy.edit' ? 'active' : '' }}"
                                    href="{{route('refund-policy.index')}}">Refund Policy</a>
                            </li> --}}
                            {{-- <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'cancellation-reasons.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-reasons.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-reasons.edit' ? 'active' : '' }}"
                                    href="{{route('cancellation-reasons.index')}}">Cancellation Reasons</a>
                            </li> --}}
                        </ul>
                    </li>

                    {{-- End Order Management --}}

                    {{-- Coupon Management --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'coupon.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'coupon.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'coupon.edit' ? 'active' : '' }}"
                            href="{{ route('coupon.index') }}"><span
                                class="lan-3"><i class="fa fa-truck fa-lg" aria-hidden="true"></i> Coupon Management </span>
                        </a>

                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'shipping.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'shipping.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'shipping.edit' ? 'active' : '' }}"
                            href="{{ route('shipping.index') }}"><span
                                class="lan-3"><i class="fa fa-truck fa-lg" aria-hidden="true"></i> Shipping Management </span>

                        </a>

                    </li>


                     {{-- Shipping Methods update work 15 --}}

                     {{-- <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'shipping-method.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'shipping-method.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'shipping-method.edit' ? 'active' : '' }}"
                            href="{{ route('shipping-method.index') }}"><span
                                class="lan-3"><i class="fa fa-truck fa-lg" aria-hidden="true"></i> Shipping Methods </span>

                        </a>

                    </li> --}}

                    {{-- End Shipping Methods update work 15 --}}


                    {{-- User  Management --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'user-index' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'user-create' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'user-edit' ? 'active' : '' }}"
                        href="{{ route('user-index') }}"> <span class="lan-3"><i class="fa fa-users fa-lg" aria-hidden="false"></i> User Management </span>
                        </a>
                    </li>
                    {{-- end --}}


                     {{-- Review Management --}}
                     <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'reviews' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'reviews-detail' ? 'active' : '' }}"
                        href="{{ route('reviews') }}"><span class="lan-3"><i class="fa fa-comments fa-lg" aria-hidden="true"></i>Comments Management </span>
                        </a>
                    </li>
                    {{-- End Review Management --}}

                    {{-- Inquiry  Management --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'contact-index' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'view-inquiry' ? 'active' : '' }}"
                        href="{{ route('contact-index') }}">
                        <span class="lan-3"><i class="fa fa-phone fa-lg" aria-hidden="true"></i> Inquiry Management </span>
                        </a>
                    </li>
                    {{-- end --}}

                    {{-- Colour  Management --}}
                    {{-- <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title "><span class="lan-3"><i class="fa fa-paint-brush fa-lg" aria-hidden="false"></i> Colour Management </span>
                        </a>
                    </li> --}}
                    {{-- end --}}
                    {{-- Subscription  Management --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'subscription' ? 'active' : '' }}"
                        href="{{ route('subscription') }}">
                        <span class="lan-3"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                            Subscriptions  </span>
                        </a>
                    </li>
                    {{-- end --}}

                    <!--soical links-->






                    <!--<li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a-->
                    <!--        class="sidebar-link sidebar-title {{ Route::currentRouteName() == 'configuration.index'  ? 'active': '' }} {{ Route::currentRouteName() == 'configuration.edit'  ? 'active': '' }}-->
                    <!--        {{ Route::currentRouteName() == 'social.index'  ? 'active': '' }} {{ Route::currentRouteName() == 'social.edit'  ? 'active': '' }}"-->

                    <!--        href="#">-->
                    <!--        <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Configurations Management</span>-->
                    <!--        <div class="according-menu"><i-->
                    <!--                class="fa fa-angle-{{ request()->route()->getPrefix() == 'admin/configuration' ? 'down' : 'right' }}"></i>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--    <ul class="sidebar-submenu"-->
                    <!--        style="display:{{ request()->route()->getPrefix() == 'admin/configuration' ? 'block;' : 'none;' }}">-->
                    <!--        <li>-->
                    <!--            <a class="lan-4 {{ Route::currentRouteName() == 'configuration.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'configuration.edit' ? 'active' : '' }}"-->
                    <!--                href="{{route('configuration.index')}}">Configurations</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a class="lan-4 {{ Route::currentRouteName() == 'social.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'social.edit' ? 'active' : '' }}"-->
                    <!--                href="{{route('social.index')}}">Social Links</a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                        {{-- Social Links --}}
                   <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'social.index' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'social.create' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'social.edit' ? 'active' : '' }}"
                        href="{{ route('social.index') }}"><span class="lan-3"><i class="fa fa-share-square-o fa-lg" aria-hidden="false"></i> Social Links</span>
                        </a>
                    </li>
                    {{-- end --}}


{{-- configuration  Management --}}
                   <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'configuration.index' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'configuration.create' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'configuration.edit' ? 'active' : '' }}"
                        href="{{ route('configuration.index') }}">
                        <span class="lan-3"><i class="fa fa-cog fa-lg" aria-hidden="false"></i> Configurations  </span>
                        </a>
                    </li>

                    {{-- end --}}




                    {{-- <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title"
                        {{ request()->route()->getPrefix() == '/service'? 'active': '' }}
                        href="{{ route('service.index') }}"><i
                                data-feather="image"></i><span class="lan-3">Servicess</span>
                        </a>
                    </li> --}}
                    {{-- end --}}

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
