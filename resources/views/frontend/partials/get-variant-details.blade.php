
@if (!empty($product_variation))
    

<div class="sizesBox add-box-weidth">
    {{-- <div class="variant_sku">
        <p>Sku: {{ $product_variation->sku }}</p>
    </div> --}}

    <div class="variant_sku label-space top-margin-label">
        <span><label for="">Sku: </label>{{ $product_variation->sku }}</span>
    </div>
    
    

    @if ($product_variation->discount_status == null || $product_variation->discount_status == 0)
    {{-- <div class="variant_price variantPrice">
        <p>${{ number_format($product_variation->regular_price,2) }}</p>
    </div> --}}
    <div class="variant_discount variantDiscount label-space">
        <span> <label for="">Price: </label>${{ number_format($product_variation->regular_price,2) }}</span>
    </div>
    @endif

    @if ($product_variation->discount_status != null || $product_variation->discount_status == 1)
    {{-- <div class="variant_price variantPrice">
        <p><span style="text-decoration: line-through">${{ number_format($product_variation->regular_price,2) }}</span></p>
    </div>

    <div class="variant_discount variantDiscount">
        <p>${{ number_format($product_variation->sale_price,2) }}</p>
    </div> --}}

    <div class="variant_discount variantDiscount label-space">
        <span style="text-decoration: line-through"> <label for="">Price: </label>${{ number_format($product_variation->regular_price,2) }}</span>
    </div>
    <div class="variant_price variantPrice label-space">
        <span> <label for="">Discounted Price:</label>${{ number_format($product_variation->sale_price,2) }}</span>
    </div>

    @endif



    

    {{-- <div class="variant_weight">
        <p>Weight: 10g</p>
    </div>
    <div class="variant_length">
        <p>Length: 10</p>
    </div>
    <div class="variant_width">
        <p>Width: 15</p>
    </div>
    <div class="variant_height">
        <p>Height: 25</p>
    </div> --}}

    <div class="variant_price inStock">
        @if ($product_variation->stock == 1)
        <p>In Stock</p>
        @else
        <p class="outOfStock">Out of stock</p>
        @endif
    </div>
</div>



<input type="hidden" name="variation_stock" id="variation_stock" value="{{ $product_variation->stock }}">
@endif