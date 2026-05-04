<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDEN ATELIER · radical objects</title>
    <style>
        /* ---------- RESET & GLOBAL ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f2f2f2;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #111;
            line-height: 1.4;
        }

        /* main container */
        .product-galleryWrapper {
            width: 100%;
            padding: 3rem 4rem 5rem 4rem;
            background: transparent;
        }

        /* header styling */
        .product-galleryHeader {
            text-align: center;
            margin-bottom: 2.5rem;
            animation: product-fadeDown 0.6s ease forwards;
        }

        .product-galleryHeader h1 {
            font-size: clamp(2.2rem, 5vw, 3.8rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #0a0a0a, #2c2c2c);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .product-galleryHeader p {
            color: #4a4a5a;
            font-weight: 450;
            margin-top: 0.5rem;
        }

        /* PRODUCT GRID */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 0.75rem; /* Closer together */
            width: 100%;
            margin: 0 auto;
        }

        /* Product Card */
        .product-card {
            display: flex;
            flex-direction: column;
            background: transparent;
            border-radius: 2px; /* Sharper edges */
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            min-height: 460px; /* Bigger frame */
            animation: product-cardAppear 0.4s ease backwards;
        }

        .product-imageArea {
            flex: 8; /* 80% height */
            width: 100%;
            overflow: hidden;
            background: transparent;
            position: relative;
        }

        .product-imageArea img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .product-card:hover .product-imageArea img {
            transform: scale(1.08);
        }

        /* Info Container */
        .product-infoArea {
            flex: 2; /* 20% height */
            padding: 0.9rem 1rem;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 0.2rem;
        }

        .product-title {
            font-size: 1.35rem;
            font-weight: 680;
            letter-spacing: -0.2px;
            color: #111;
            line-height: 1.3;
        }

        .product-price {
            font-size: 1.55rem;
            font-weight: 700;
            color: #000;
            display: flex;
            align-items: baseline;
            gap: 6px;
        }

        .product-currency {
            font-size: 0.75rem;
            font-weight: 500;
            color: #6e6e7a;
        }

        .product-colorIndicator {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #4b4b5a;
            margin-top: 0.2rem;
        }

        .product-colorDot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: currentColor;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.05);
        }

        .product-card:hover {
            box-shadow: 0 12px 24px -12px rgba(0, 0, 0, 0.15);
        }

        /* Animations */
        @keyframes product-fadeDown {
            0% { opacity: 0; transform: translateY(-18px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes product-cardAppear {
            0% { opacity: 0; transform: translateY(12px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Staggered Delays */
        .product-card:nth-child(1) { animation-delay: 0.02s; }
        .product-card:nth-child(2) { animation-delay: 0.04s; }
        .product-card:nth-child(3) { animation-delay: 0.06s; }
        .product-card:nth-child(4) { animation-delay: 0.08s; }

        /* Responsive */
        @media (max-width: 1000px) {
            .product-galleryWrapper { padding: 2rem 2rem; }
            .product-grid { grid-template-columns: repeat(auto-fill, minmax(290px, 1fr)); gap: 0.65rem; }
        }

        @media (max-width: 640px) {
            .product-grid { grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); }
        }
    </style>
</head>
<body>

<?php include 'includes/header.html'; ?>

<div class="product-galleryWrapper">
    <div class="product-galleryHeader">
        <h1>✦ EDEN ATELIER</h1>
        <p>futuristic objects · radical minimalism · infinite rhythm</p>
    </div>

    <div class="product-grid">
        <!-- Product 1 -->
        <a href="product1.php" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/20/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Aether Flux</div>
                <div class="product-price">$289 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #2C3E50;"></span> Shadow graphite
                </div>
            </div>
        </a>

        <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a>

                <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a>

                <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a>

                <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a>

                <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a>

                <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a>

                <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a>

                <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a>

                <!-- Product 2 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/26/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Nebula Core X</div>
                <div class="product-price">$1,249 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium sand
                </div>
            </div>
        </a> 

        <!-- Product 3 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/29/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Orion Chrono</div>
                <div class="product-price">$459 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #C0A080;"></span> Lunar brass
                </div>
            </div>
        </a>

        <!-- Product 4 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/42/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Lumina Sphere</div>
                <div class="product-price">$189 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #D9C8B2;"></span> Alabaster white
                </div>
            </div>
        </a>
    </div>
</div>

<?php include 'includes/footer.html'; ?>

</body>
</html>