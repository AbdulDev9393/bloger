<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
</head>
<body>

<!-- MAIN CONTENT -->
<div class="container py-5">

    <h2 class="mb-4">Our Products</h2>

    <div class="row">

        @foreach ($products as $product)

            <div class="col-md-3 mb-4">

                <div class="card h-100">

                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">

                    <div class="card-body">

                        <h5 class="card-title">
                            {{ \Illuminate\Support\Str::limit($product->name, 25) }}
                        </h5>

                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 60) }}
                        </p>

                        <p class="mb-2">
                            <strong>${{ number_format($product->price, 2) }}</strong>
                        </p>

                        <a href="{{ route('frontend.product', $product->slug) }}" class="btn btn-primary">
                            View
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@include('frontend.footer')

</body>
</html>
