@if (count($ratings) > 0)
@foreach ($ratings as  $values)

<div class="mb-5">
    <div class="reviewNames">
        <span>{{$values->name ?? ''}}</span>
    </div>
    <div class="reviewRatingDate mb-3">
        <div class="">
            @php

                $num = 5 - $values->reviews;
            @endphp
            @for ($x = 1; $x <= $values->reviews; $x++)
                <i class="fa fa-star goldenstar "></i>
            @endfor

            @for ($x = 1; $x <= $num; $x++)
                <i class="fa fa-star"></i>
            @endfor
        </div>
        <span>{!! date('m/d/Y', strtotime($values->created_at)) !!}</span>
    </div>

    <div class="reviewText">
        <p>{{$values->comments}}</p>
    </div>

    <div class="reviewImages">
        @foreach (json_decode($values->image) as $key => $image)

        <div class="productReviewImage">
            <a href="{{ url('public/reviews/' . $image) }}" target="_blank">
                <img src="{{ url('public/reviews/' . $image) }}" alt="Product Image" width="80px" height="80px">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endforeach

@else
<div class="my-5">
    <h5 class="text-center">
        <i class="fa fa-meh-o" aria-hidden="true"></i> Oops! No reviews found.
    </h5>
</div>
@endif
