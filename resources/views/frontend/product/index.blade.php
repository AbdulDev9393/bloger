<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
    <title>{{ $product->name }}</title>

    <style>


        .container {
            max-width: 1280px;
            margin-top: 2rem !important;
            margin-bottom: 3rem;
        }

        /* Product image container with subtle elegance */
        .product-image-wrapper {
            background: linear-gradient(145deg, #ffffff 0%, #f9f9fc 100%);
            border-radius: 28px;
            padding: 1rem;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.02);
            transition: all 0.2s ease;
            max-height: 450px;
        }

       .product-image-wrapper {
    background: linear-gradient(145deg, #ffffff 0%, #f9f9fc 100%);
    border-radius: 28px;
    padding: 1rem;
    box-shadow: 0 20px 35px -12px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.02);

    height: 450px;   /* 👈 fixed height better */
    display: flex;
    align-items: center;
    justify-content: center;
}
        #productImage:hover {
            transform: scale(1.01);
            box-shadow: 0 12px 24px -10px rgba(0,0,0,0.15);
        }

        /* Zoom button refined */
        .btn-zoom {
            background: #1e293b;
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            font-size: 0.85rem;
            border-radius: 40px;
            letter-spacing: 0.3px;
            transition: all 0.2s;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .btn-zoom:hover {
            background: #0f172a;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.1);
        }

        /* Info card premium look */
        .info-card {
            background: #ffffff;
            border-radius: 28px;
            padding: 1.8rem;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.08);
            transition: all 0.2s;
            border: 1px solid rgba(203, 213, 225, 0.3);
        }

        .product-name {
            font-size: 1.9rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #1e293b 0%, #2d3a4b 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }

        /* Rating stars - refined */
        .rating-stars {
            display: inline-flex;
            gap: 4px;
            font-size: 1.2rem;
            letter-spacing: 2px;
            background: #fff9e8;
            padding: 0.25rem 0.8rem;
            border-radius: 40px;
            box-shadow: inset 0 0 0 1px rgba(253, 224, 71, 0.2), 0 1px 2px rgba(0,0,0,0.02);
        }

        .star-filled {
            color: #f5b042;
            text-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .star-empty {
            color: #e2e8f0;
        }

        /* description rich */
        .description-box {
            background: #f9fafb;
            padding: 1.2rem 1.4rem;
            border-radius: 20px;
            margin: 1.2rem 0;
            font-size: 1rem;
            line-height: 1.5;
            color: #1f2a3e;
            border-left: 4px solid #3b82f6;
        }

        .price-wrapper {
            display: flex;
            align-items: baseline;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }

        .final-price {
            font-size: 2.2rem;
            font-weight: 800;
            color: #0f3b5e;
            letter-spacing: -0.01em;
        }

        .original-price {
            font-size: 1.1rem;
            color: #94a3b8;
            text-decoration: line-through;
        }

        .discount-badge {
            background: linear-gradient(115deg, #10b981 0%, #059669 100%);
            padding: 0.4rem 1rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.3px;
            box-shadow: 0 2px 5px rgba(16,185,129,0.2);
        }

        /* Buttons improved */
        .btn-primary-custom {
            background: #1e3a5f;
            border: none;
            padding: 0.8rem 2rem;
            font-weight: 600;
            border-radius: 60px;
            transition: all 0.2s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .btn-primary-custom:hover {
            background: #0f2c48;
            transform: translateY(-2px);
            box-shadow: 0 12px 18px -8px rgba(0,0,0,0.15);
        }

        .btn-outline-custom {
            border: 1.5px solid #cbd5e1;
            background: transparent;
            padding: 0.8rem 2rem;
            font-weight: 600;
            border-radius: 60px;
            color: #1e293b;
            transition: all 0.2s;
        }

        .btn-outline-custom:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
            transform: translateY(-2px);
        }

        /* action group */
        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 1.8rem;
        }

        /* ZOOM MODAL - keep original functionality but improved visual */
        .zoom-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 14, 23, 0.96);
            backdrop-filter: blur(8px);
            text-align: center;
            transition: 0.2s;
        }

        .zoom-modal img {
            max-width: 90%;
            max-height: 80vh;
            border-radius: 24px;
            box-shadow: 0 25px 45px rgba(0,0,0,0.3);
            border: 2px solid rgba(255,255,255,0.2);
        }

        .zoom-modal .close {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 48px;
            font-weight: 300;
            color: white;
            cursor: pointer;
            transition: 0.2s;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(4px);
        }

        .zoom-modal .close:hover {
            background: rgba(255,255,255,0.25);
            transform: scale(1.05);
        }

        /* responsiveness */
        @media (max-width: 768px) {
            .info-card {
                padding: 1.4rem;
                margin-top: 1rem;
            }
            .product-name {
                font-size: 1.6rem;
            }
            .final-price {
                font-size: 1.8rem;
            }
            .action-buttons button {
                flex: 1;
            }
        }

        /* subtle animation on load */
        .col-md-6 {
            animation: fadeSlideUp 0.4s ease-out;
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="row g-4 align-items-start">

        <!-- IMAGE SECTION (improved visual wrapper, same variables & functions) -->
        <div class="col-md-6">
            <div class="product-image-wrapper">
                <img id="productImage"
                    src="{{ asset($product->image) }}"
                    style="width:100%; height:100%; object-fit:contain; border-radius:16px;"
                    alt="{{ $product->name }}">
            </div>
            <div class="mt-3 d-flex justify-content-start">
                <button class="btn btn-zoom" onclick="openZoom()">
                    🔍 Zoom Image
                </button>
            </div>
        </div>

        <!-- INFO SECTION (redesigned card, keeps all original variables) -->
        <div class="col-md-6">
            <div class="info-card">
                <h2 class="product-name">{{ $product->name }}</h2>

                <!-- RATING (original dynamic logic preserved, improved styling) -->
                <div class="rating-stars mb-3 d-inline-flex">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $product->rating)
                            <span class="star-filled">★</span>
                        @else
                            <span class="star-empty">☆</span>
                        @endif
                    @endfor
                </div>

                <div class="description-box">
                    {!! $product->description !!}
                </div>

                <!-- PRICE (exactly uses $product->final_price ?? $product->price) -->
                <div class="price-wrapper">
                    <span class="final-price">
                        ${{ number_format($product->final_price ?? $product->price, 2) }}
                    </span>
                    @if($product->discount > 0)
                        <span class="original-price">
                            ${{ number_format($product->price, 2) }}
                        </span>
                    @endif
                </div>

                <!-- DISCOUNT badge (preserved discount variable) -->
                @if($product->discount > 0)
                    <div class="mt-2">
                        <span class="discount-badge text-white">
                            🔥 Save {{ $product->discount }}%
                        </span>
                    </div>
                @endif

                <!-- BUTTONS (unchanged actions, same buttons but styled) -->
                <div class="action-buttons">
                    <button class="btn btn-primary-custom text-white">
                         Add to Cart
                    </button>

                    <button class="btn btn-outline-custom">
                         Buy Now
                    </button>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- ZOOM MODAL (exactly same structure & ids, no functional change) -->
<div id="zoomModal" class="zoom-modal">
    <span class="close" onclick="closeZoom()">&times;</span>
    <img id="zoomImg" src="{{ asset($product->image) }}">
</div>

@include('frontend.footer')

<script>
// ALL FUNCTIONS AND VARIABLES KEPT ORIGINAL
// openZoom and closeZoom use same DOM references — no modifications
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
