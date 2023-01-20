<div class="col-lg-3">
    <div class="NavSideBar">
        <div id="search-itme"></div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="filterOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filterOneTab" aria-expanded="true" aria-controls="filterOneTab">
                        Product Categories
                    </button>
                </h2>


                <div id="filterOneTab" class="accordion-collapse collapse" aria-labelledby="filterOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body scrollBox">

                        <div class="side_menu">
                            <ul>
                                @if (count($sub_categories) > 0)
                                    <li class="filter-cross">
                                        <button id="category-filter" class="close-search display_none"
                                            onclick="filterReset('category-filter')">
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </button>
                                    </li>
                                    @foreach ($sub_categories as $sub_category)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input product_sub_categories" type="radio"
                                                    name="sub_categories[]" value="{{ $sub_category->id }}"
                                                    id="sub-category-{{ $sub_category->id }}">
                                                <label class="form-check-label"
                                                    for="sub-category-{{ $sub_category->id }}">
                                                    {{ ucwords($sub_category->sub_category_name) }}
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="filterTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filterTwoTap" aria-expanded="false" aria-controls="filterTwoTap">
                        Product Status
                    </button>
                </h2>
                <div id="filterTwoTap" class="accordion-collapse collapse " aria-labelledby="filterTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body ">
                        <div class="side_menu">
                            <ul>
                                <li class="filter-cross">
                                    <button id="stock-filter" class="close-search display_none"
                                        onclick="filterReset('stock-filter')">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </button>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input stock_filter" type="radio" value="1"
                                            id="in_stock">
                                        <label class="form-check-label" for="in_stock">
                                            In Stock
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#reports_tab" aria-expanded="false" aria-controls="reports_tab">
                        Filter By Price
                    </button>
                </h2>
                <div id="reports_tab" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="side_menu">
                            <ul>
                                <li class="filter-cross">
                                    <button id="price-filter" class="close-search display_none"
                                        onclick="filterReset('price-filter')">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </button>
                                </li>
                                <li>
                                    <fieldset class="filter-price">
                                        <div class="price-field">
                                            <input type="range" min="100" max="700" value="100"
                                                id="lower">
                                            <input type="range" min="100" max="5000" value="5000"
                                                id="upper">
                                        </div>
                                        <div class="price-wrap">
                                            <button id="applyRangeFilter"><span
                                                    class="price-title">Filter</span></button>
                                            <div class="price-container">
                                                <div class="price-wrap-1">
                                                    Price :
                                                    <label for="one">$</label>
                                                    <input id="one">
                                                </div>
                                                <div class="price-wrap_line">-</div>
                                                <div class="price-wrap-2">
                                                    <label for="two">$</label>
                                                    <input id="two">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#email_txt_tab" aria-expanded="false" aria-controls="email_txt_tab">
                        Average Rating
                    </button>
                </h2>
                <div id="email_txt_tab" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="side_menu">
                            <ul>
                                <li class="filter-cross">
                                    <button id="rating-filter" class="close-search display_none"
                                        onclick="filterReset('rating-filter')">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </button>
                                </li>
                                <li>
                                    <div class="averageRating">
                                        <input class="form-check-input rating_checkbox_list" type="radio"
                                            name="rating" value="5" id="rating-5">
                                        <label class="form-check-label" for="rating-5">

                                            <div class="filterRating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="ratingNumber">
                                                <span>(5)</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="averageRating">
                                        <input class="form-check-input rating_checkbox_list" type="radio"
                                            name="rating" value="4" id="rating-4">
                                        <label class="form-check-label" for="rating-4">

                                            <div class="filterRating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                            </div>
                                            <div class="ratingNumber">
                                                <span>(4)</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="averageRating">

                                        <input class="form-check-input rating_checkbox_list" type="radio"
                                            name="rating" value="3" id="rating-3">
                                        <label class="form-check-label" for="rating-3">
                                            <div class="filterRating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                            </div>
                                            <div class="ratingNumber">
                                                <span>(3)</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="averageRating">

                                        <input class="form-check-input rating_checkbox_list" type="radio"
                                            name="rating" value="2" id="rating-2">
                                        <label class="form-check-label" for="rating-2">
                                            <div class="filterRating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                            </div>
                                            <div class="ratingNumber">
                                                <span>(2)</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="averageRating">
                                        <input class="form-check-input rating_checkbox_list" type="radio"
                                            name="rating" value="1" id="rating-1">
                                        <label class="form-check-label" for="rating-1">
                                            <div class="filterRating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                                <i class="fa fa-star filterRatingWhite" aria-hidden="true"></i>
                                            </div>
                                            <div class="ratingNumber">
                                                <span>(1)</span>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
