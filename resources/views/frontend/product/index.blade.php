<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.header')

    <title>{{ $product->name }}</title>
</head>

<body>

<div class="container mt-5">

    <div class="row">

        <!-- Product Image -->
        <div class="col-md-6">
            <img src="{{ asset($product->image) }}"
                 class="img-fluid rounded shadow"
                 alt="{{ $product->name }}">
        </div>

        <!-- Product Info -->
        <div class="col-md-6">

            <h2 class="fw-bold">{{ $product->name }}</h2>

           <p class="text-muted">
    {!! $product->description !!}
</p>

            <h4 class="text-primary">
                ${{ number_format($product->final_price ?? $product->price, 2) }}
            </h4>

            @if($product->discount > 0)
                <span class="badge bg-success">
                    Save {{ $product->discount }}%
                </span>
            @endif

            <div class="mt-3">
                <button class="btn btn-primary">
                    Add to Cart
                </button>

                <button class="btn btn-outline-dark">
                    Buy Now
                </button>
            </div>

        </div>

    </div>

</div>

@include('frontend.footer')

</body>
</html>
