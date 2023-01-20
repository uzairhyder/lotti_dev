<?php
$favicon = App\Models\BackendModels\Logo::where("type", "Logo")->first();
?>
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
            <a href="<?php echo e(route('admin-home')); ?>"><img class="img-fluid for-light" src="<?php echo e(url('public/logos/'.$favicon->image)); ?>"
                    alt="" width="100px" height="100px" style="background: lightgray"><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="<?php echo e(route('admin-home')); ?>"><img class="img-fluid"
                    src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="<?php echo e(route('admin-home')); ?>"><img class="img-fluid"
                                src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">

                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title"
                            href="<?php echo e(route('home')); ?>" target="_blank"><span class="lan-3
                            "><i class="fa fa-globe fa-lg" aria-hidden="true"></i> Go To Website</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == 'admin-home'? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'admin-home' ? 'active' : ''); ?>"
                            href="<?php echo e(route('admin-home')); ?>"><span class="lan-3
                            "><i class="fa fa-home fa-lg" aria-hidden="true"></i> Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title  <?php echo e(Route::currentRouteName() == 'logo.index'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'logo.edit'  ? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'page-content.index'  ? 'active': ''); ?>  <?php echo e(Route::currentRouteName() == 'page-content.edit'  ? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'banner.index'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'banner.edit'  ? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'privacy-policy.index'  ? 'active': ''); ?>  <?php echo e(Route::currentRouteName() == 'privacy-policy.edit'  ? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'terms-conditions.index'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'terms-conditions.edit'  ? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'page.index'  ? 'active': ''); ?>  <?php echo e(Route::currentRouteName() == 'page.edit'  ? 'active': ''); ?>"
                            href="#">
                            <span class="lan-3 "><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Layout Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == 'admin/cms' ? 'down' : 'right'); ?>

                                    "></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:<?php echo e(request()->route()->getPrefix() == 'admin/cms' ? 'block;' : 'none;'); ?>

                            ">
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'logo.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'logo.edit' ? 'active' : ''); ?>"
                                        href="<?php echo e(route('logo.index')); ?>">Add Logo</a>
                                    </li>
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'page-content.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'page-content.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('page-content.index')); ?>">Page Content</a>
                            </li>

                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'banner.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'banner.edit' ? 'active' : ''); ?>"
                                href="<?php echo e(route('banner.index')); ?>">Banner Management</a>
                            </li>
                              
                            
                            
                            
                                
                            
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'brand.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'brand.edit' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'brand.create' ? 'active' : ''); ?>"
                            href="<?php echo e(route('brand.index')); ?>"><span
                                class="lan-3"><i class="fa fa-bold fa-lg" aria-hidden="true"></i>
                                Brand Management </span>

                        </a>

                    </li>

                    





                    

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title <?php echo e(Route::currentRouteName() == 'parent-category.index'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'parent-category.create'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'parent-category.edit'  ? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'main-category.index'  ? 'active': ''); ?>  <?php echo e(Route::currentRouteName() == 'main-category.create'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'main-category.edit'  ? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'sub-category.index'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'sub-category.create'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'sub-category.edit'  ? 'active': ''); ?>"

                            href="#">
                            <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Category  Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == 'admin/category' ? 'down' : 'right'); ?>"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:<?php echo e(request()->route()->getPrefix() == 'admin/category' ? 'block;' : 'none;'); ?>">
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'parent-category.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'parent-category.create' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'parent-category.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('parent-category.index')); ?>">Parent Category</a>
                            </li>
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'main-category.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'main-category.create' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'main-category.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('main-category.index')); ?>">Main Category</a>
                            </li>
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'sub-category.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'sub-category.create' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'sub-category.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('sub-category.index')); ?>">Sub Category</a>
                            </li>
                        </ul>
                    </li>

                    
                      

                      <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'product.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'product.edit' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'product.create' ? 'active' : ''); ?>"
                            href="<?php echo e(route('product.index')); ?>"><span
                                class="lan-3"><i class="fa fa-product-hunt fa-lg" aria-hidden="true"></i> Product Management </span>

                        </a>

                    </li>
                    

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'variants.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'variants.edit' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'variants.create' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'attribute-value' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'attribute-value.edit' ? 'active' : ''); ?>" href="<?php echo e(route('variants.index')); ?>"><span
                                class="lan-3"><i class="fa fa-rss fa-lg" aria-hidden="true"></i> Attribute Management </span>

                        </a>

                    </li>
                    

                      

                    <!--  <li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                    <!--    <?php echo e(Route::currentRouteName() == 'blog-index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'blog-edit' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'blog-create' ? 'active' : ''); ?>"-->
                    <!--        href="<?php echo e(route('blog-index')); ?>"><span-->
                    <!--            class="lan-3"><i class="fa fa-rss fa-lg" aria-hidden="true"></i> Blog Management </span>-->

                    <!--    </a>-->

                    <!--</li>-->

                    

                    
                    <!--<li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a-->
                    <!--        class="sidebar-link sidebar-title  <?php echo e(Route::currentRouteName() == 'gallery.index' ? 'active' : ''); ?>-->
                    <!--        <?php echo e(Route::currentRouteName() == 'edit-gallery' ? 'active' : ''); ?>-->
                    <!--         <?php echo e(Route::currentRouteName() == 'create-gallery' ? 'active' : ''); ?>"-->
                    <!--        href="<?php echo e(route('gallery.index')); ?>"><span class="lan-3"><span-->
                    <!--                class="lan-3"><i class="fa fa-picture-o fa-lg"aria-hidden="false"></i> Gallery Management</a> </span>-->
                    <!--</li>-->
                    

                     
                    <!-- <li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                    <!--        <?php echo e(Route::currentRouteName() == 'testimonial-index' ? 'active' : ''); ?>-->
                    <!--         <?php echo e(Route::currentRouteName() == 'edit-testimonial' ? 'active' : ''); ?>-->
                    <!--         <?php echo e(Route::currentRouteName() == 'testimonial-create' ? 'active' : ''); ?>"-->
                    <!--        href="<?php echo e(route('testimonial-index')); ?>"><span-->
                    <!--            class="lan-3"><i class="fa fa-quote-right fa-lg" aria-hidden="true"></i> Testimonial Management  </a> </span>-->

                    <!--</li>-->
                    

                    
                    <!--<li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                    <!--    <?php echo e(Route::currentRouteName() == 'faqs.index' ? 'active' : ''); ?>-->
                    <!--    <?php echo e(Route::currentRouteName() == 'faqs.create' ? 'active' : ''); ?>-->
                    <!--    <?php echo e(Route::currentRouteName() == 'faqs.edit' ? 'active' : ''); ?>"-->
                    <!--        href="<?php echo e(route('faqs.index')); ?>">-->
                    <!--         <span-->
                    <!--            class="lan-3"><i class="fa fa-question fa-lg" aria-hidden="false"></i> Faq Management </span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    

                    
                    <!--<li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                    <!--    <?php echo e(Route::currentRouteName() == 'portfolio.index' ? 'active' : ''); ?>-->
                    <!--    <?php echo e(Route::currentRouteName() == 'portfolio.edit' ? 'active' : ''); ?>-->
                    <!--    <?php echo e(Route::currentRouteName() == 'portfolio.create' ? 'active' : ''); ?>"-->
                    <!--        href="<?php echo e(route('portfolio.index')); ?>"><span class="lan-3"><i class="fa fa-picture-o fa-lg"aria-hidden="false"></i> Portfolio Management </span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    

                     
                     
                    

                        
                        <!--<li class="sidebar-list">-->
                        <!--    <label class="badge badge-success"></label><a class="sidebar-link sidebar-title-->
                        <!--    <?php echo e(Route::currentRouteName() == 'location.index' ? 'active' : ''); ?>-->
                        <!--    <?php echo e(Route::currentRouteName() == 'location.create' ? 'active' : ''); ?>-->
                        <!--    <?php echo e(Route::currentRouteName() == 'location.edit' ? 'active' : ''); ?>"-->
                        <!--    href="<?php echo e(route('location.index')); ?>">-->
                        <!--    <span class="lan-3"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> Location Management </span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        

                    

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title  <?php echo e(Route::currentRouteName() == 'orderManagement.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'orderManagement.show' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'invoice.index' ? 'active' : ''); ?>

                            <?php echo e(Route::currentRouteName() == 'cancellation-policy.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'cancellation-policy.create' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'cancellation-policy.edit' ? 'active' : ''); ?>

                            <?php echo e(Route::currentRouteName() == 'cancellation-reasons.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'cancellation-reasons.create' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'cancellation-reasons.edit' ? 'active' : ''); ?>"

                            href="#">
                            <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Order Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == 'admin/orders' ? 'down' : 'right'); ?>"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:<?php echo e(request()->route()->getPrefix() == 'admin/orders' ? 'block;' : 'none;'); ?>">
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'orderManagement.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'orderManagement.show' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'invoice.index' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('orderManagement.index')); ?>">All Orders</a>
                            </li>
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'cancellation-policy.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'cancellation-policy.create' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'cancellation-policy.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('cancellation-policy.index')); ?>">Cancellation Policy</a>
                            </li>
                             
                            
                        </ul>
                    </li>

                    

                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'coupon.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'coupon.create' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'coupon.edit' ? 'active' : ''); ?>"
                            href="<?php echo e(route('coupon.index')); ?>"><span
                                class="lan-3"><i class="fa fa-truck fa-lg" aria-hidden="true"></i> Coupon Management </span>
                        </a>

                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'shipping.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'shipping.create' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'shipping.edit' ? 'active' : ''); ?>"
                            href="<?php echo e(route('shipping.index')); ?>"><span
                                class="lan-3"><i class="fa fa-truck fa-lg" aria-hidden="true"></i> Shipping Management </span>

                        </a>

                    </li>


                     

                     

                    


                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'user-index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'user-create' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'user-edit' ? 'active' : ''); ?>"
                        href="<?php echo e(route('user-index')); ?>"> <span class="lan-3"><i class="fa fa-users fa-lg" aria-hidden="false"></i> User Management </span>
                        </a>
                    </li>
                    


                     
                     <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'reviews' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'reviews-detail' ? 'active' : ''); ?>"
                        href="<?php echo e(route('reviews')); ?>"><span class="lan-3"><i class="fa fa-comments fa-lg" aria-hidden="true"></i>Comments Management </span>
                        </a>
                    </li>
                    

                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'contact-index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'view-inquiry' ? 'active' : ''); ?>"
                        href="<?php echo e(route('contact-index')); ?>">
                        <span class="lan-3"><i class="fa fa-phone fa-lg" aria-hidden="true"></i> Inquiry Management </span>
                        </a>
                    </li>
                    

                    
                    
                    
                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'subscription' ? 'active' : ''); ?>"
                        href="<?php echo e(route('subscription')); ?>">
                        <span class="lan-3"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                            Subscriptions  </span>
                        </a>
                    </li>
                    

                    <!--soical links-->






                    <!--<li class="sidebar-list">-->
                    <!--    <label class="badge badge-success"></label><a-->
                    <!--        class="sidebar-link sidebar-title <?php echo e(Route::currentRouteName() == 'configuration.index'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'configuration.edit'  ? 'active': ''); ?>-->
                    <!--        <?php echo e(Route::currentRouteName() == 'social.index'  ? 'active': ''); ?> <?php echo e(Route::currentRouteName() == 'social.edit'  ? 'active': ''); ?>"-->

                    <!--        href="#">-->
                    <!--        <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Configurations Management</span>-->
                    <!--        <div class="according-menu"><i-->
                    <!--                class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == 'admin/configuration' ? 'down' : 'right'); ?>"></i>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--    <ul class="sidebar-submenu"-->
                    <!--        style="display:<?php echo e(request()->route()->getPrefix() == 'admin/configuration' ? 'block;' : 'none;'); ?>">-->
                    <!--        <li>-->
                    <!--            <a class="lan-4 <?php echo e(Route::currentRouteName() == 'configuration.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'configuration.edit' ? 'active' : ''); ?>"-->
                    <!--                href="<?php echo e(route('configuration.index')); ?>">Configurations</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a class="lan-4 <?php echo e(Route::currentRouteName() == 'social.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'social.edit' ? 'active' : ''); ?>"-->
                    <!--                href="<?php echo e(route('social.index')); ?>">Social Links</a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                        
                   <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'social.index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'social.create' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'social.edit' ? 'active' : ''); ?>"
                        href="<?php echo e(route('social.index')); ?>"><span class="lan-3"><i class="fa fa-share-square-o fa-lg" aria-hidden="false"></i> Social Links</span>
                        </a>
                    </li>
                    



                   <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'configuration.index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'configuration.create' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'configuration.edit' ? 'active' : ''); ?>"
                        href="<?php echo e(route('configuration.index')); ?>">
                        <span class="lan-3"><i class="fa fa-cog fa-lg" aria-hidden="false"></i> Configurations  </span>
                        </a>
                    </li>

                    




                    
                    

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>