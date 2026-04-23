<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.header')
    <title>{{ $product->name }}</title>

    <style>
        .zoom-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            text-align: center;
        }

        .zoom-modal img {
            max-width: 90%;
            max-height: 80vh;
            border-radius: 10px;
        }

        .zoom-modal .close {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 40px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="row">

        <!-- IMAGE -->
        <div class="col-md-6">

            <img id="productImage"
                 src="{{ asset($product->image) }}"
                 class="img-fluid rounded shadow"
                 alt="{{ $product->name }}">

            <button class="btn btn-sm btn-dark mt-2" onclick="openZoom()">
                🔍 Zoom Image
            </button>

        </div>

        <!-- INFO -->
        <div class="col-md-6 p-3 shadow-sm rounded bg-white">

            <h2 class="fw-bold">{{ $product->name }}</h2>

            <!-- RATING -->
            <div class="text-warning mb-2">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $product->rating)
                        ★
                    @else
                        ☆
                    @endif
                @endfor
            </div>

            <!-- DESCRIPTION -->
            <div class="text-muted">
                {!! $product->description !!}
            </div>

            <!-- PRICE -->
            <h4 class="text-primary fw-bold mt-3">
                ${{ number_format($product->final_price ?? $product->price, 2) }}
            </h4>

            <!-- DISCOUNT -->
            @if($product->discount > 0)
                <span class="badge bg-success">
                    Save {{ $product->discount }}%
                </span>
            @endif

            <!-- BUTTONS -->
            <div class="mt-4">
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

<!-- ZOOM MODAL -->
<div id="zoomModal" class="zoom-modal">
    <span class="close" onclick="closeZoom()">&times;</span>
    <img id="zoomImg" src="{{ asset($product->image) }}">
</div>

@include('frontend.footer')

<script>
function openZoom() {
    document.getElementById('zoomModal').style.display = 'block';
    document.getElementById('zoomImg').src =
        document.getElementById('productImage').src;
}

function closeZoom() {
    document.getElementById('zoomModal').style.display = 'none';
}
</script>

</body>
</html>
