<ul>
    @if (count($sub_categories) > 0)
    @foreach ($sub_categories as $sub_category)
        <li>
            <div class="form-check">
                
                
                <label class="form-check-label" for="sub-category-{{ $sub_category->id }}">
                    {{-- <input class="form-check-input product_sub_categories" type="radio" name="sub_categories[]" data-id="{{ $sub_category->id }}" data-slug="{{ $sub_category->slug }}" value="{{ $sub_category->slug }}" id="sub-category-{{ $sub_category->id }}" {{ $category->id == $sub_category->id ? 'checked' : ''}}> --}}
                    <a href="{{ route('categories',["slug"=>$sub_category->slug]) }}" class="{{ $category->id == $sub_category->id ? 'radio-active' : ''}}" id="sub-category-anchor-{{ $sub_category->id }}">{{ ucwords($sub_category->sub_category_name) }}</a>
                </label>
            </div>
        </li>
        @endforeach
    @endif
</ul>