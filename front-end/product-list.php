<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDEN ATELIER · radical objects</title>
    <style>
        /* ---------- 1. DARK MODE ENGINE ---------- */
        :root {
            --product-bg: #f2f2f2;
            --product-card-info: #ffffff;
            --product-text-main: #111111;
            --product-text-sub: #4a4a5a;
            --product-accent: #6e6e7a;
            --product-header-grad: linear-gradient(135deg, #0a0a0a, #2c2c2c);
            --product-shadow: rgba(0, 0, 0, 0.15);
        }

        [data-theme="dark"] {
            --product-bg: #0e0e0e;
            --product-card-info: #1a1a1a;
            --product-text-main: #ffffff;
            --product-text-sub: #aaaaaa;
            --product-accent: #888888;
            --product-header-grad: linear-gradient(135deg, #ffffff, #888888);
            --product-shadow: rgba(255, 255, 255, 0.05);
        }

        /* ---------- 2. RESET & GLOBAL ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--product-bg);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--product-text-main);
            line-height: 1.4;
            transition: background 0.4s ease, color 0.4s ease;
        }

        .product-galleryWrapper {
            width: 100%;
            padding: 3rem 4rem 5rem 4rem;
            background: transparent;
        }

        /* ---------- 3. HEADER STYLING ---------- */
        .product-galleryHeader {
            text-align: center;
            margin-bottom: 2.5rem;
            animation: product-fadeDown 0.6s ease forwards;
        }

        .product-galleryHeader h1 {
            font-size: clamp(1.8rem, 8vw, 3.8rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            background: var(--product-header-grad);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .product-galleryHeader p {
            color: var(--product-text-sub);
            font-weight: 450;
            margin-top: 0.5rem;
            font-size: clamp(0.8rem, 2vw, 1rem);
        }

        /* ---------- 4. PRODUCT GRID ---------- */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 0.75rem; 
            width: 100%;
            margin: 0 auto;
        }

        .product-card {
            display: flex;
            flex-direction: column;
            background: transparent;
            border-radius: 2px;
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            min-height: 460px;
            animation: product-cardAppear 0.4s ease backwards;
            transition: box-shadow 0.3s ease;
        }

        .product-imageArea {
            flex: 8; 
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
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94), filter 0.4s ease;
        }

        [data-theme="dark"] .product-imageArea img {
            filter: brightness(0.85) contrast(1.1);
        }

        .product-card:hover .product-imageArea img {
            transform: scale(1.08);
        }

        .product-infoArea {
            flex: 2; 
            padding: 0.9rem 1rem;
            background: var(--product-card-info);
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 0.2rem;
            transition: background 0.4s ease;
        }

        .product-title {
            font-size: 1.35rem;
            font-weight: 680;
            letter-spacing: -0.2px;
            color: var(--product-text-main);
            line-height: 1.3;
        }

        .product-price {
            font-size: 1.55rem;
            font-weight: 700;
            color: var(--product-text-main);
            display: flex;
            align-items: baseline;
            gap: 6px;
        }

        .product-currency {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--product-accent);
        }

        .product-colorIndicator {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.7rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: var(--product-text-sub);
            margin-top: 0.2rem;
        }

        .product-colorDot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: currentColor;
        }

        .product-card:hover {
            box-shadow: 0 12px 24px -12px var(--product-shadow);
        }

        /* ---------- 5. ANIMATIONS ---------- */
        @keyframes product-fadeDown {
            0% { opacity: 0; transform: translateY(-18px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes product-cardAppear {
            0% { opacity: 0; transform: translateY(12px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .product-card:nth-child(1) { animation-delay: 0.02s; }
        .product-card:nth-child(2) { animation-delay: 0.04s; }
        .product-card:nth-child(3) { animation-delay: 0.06s; }

        /* ---------- 6. RESPONSIVE / TWO PRODUCT ROW FIX ---------- */
        @media (max-width: 1000px) {
            .product-galleryWrapper { padding: 2rem 2rem; }
        }

        @media (max-width: 600px) {
            .product-galleryWrapper { 
                padding: 1.5rem 0.5rem 4rem 0.5rem; /* Tighter side padding */
            }
            .product-grid { 
                grid-template-columns: repeat(2, 1fr); /* FORCES 2 PRODUCTS PER ROW */
                gap: 0.5rem; /* Tighter gap for small screens */
            }
            .product-card {
                min-height: 320px; /* Adjusted height for 2-column layout */
            }
            .product-infoArea {
                padding: 0.6rem 0.5rem;
            }
            .product-title {
                font-size: 0.9rem; /* Smaller text to fit */
            }
            .product-price {
                font-size: 1rem;
            }
            .product-colorIndicator {
                font-size: 0.6rem;
            }
        }
    </style>
</head>
<body>

<?php include 'includes/header.html'; ?>

<div class="product-galleryWrapper">
    <div class="product-galleryHeader">
        <h1>✦ EDEN ATELIER</h1>
        <p>futuristic objects · radical minimalism</p>
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
                    <span class="product-colorDot" style="color: #2C3E50;"></span> Graphite
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
                    <span class="product-colorDot" style="color: #8A6E4B;"></span> Titanium
                </div>
            </div>
        </a>

        <!-- Product 3 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/11/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Zen Stand</div>
                <div class="product-price">$89 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #333;"></span> Matte Black
                </div>
            </div>
        </a>

        <!-- Product 4 -->
        <a href="#" class="product-card">
            <div class="product-imageArea">
                <img src="https://picsum.photos/id/17/700/850" alt="Product" loading="lazy">
            </div>
            <div class="product-infoArea">
                <div class="product-title">Aero Buds</div>
                <div class="product-price">$199 <span class="product-currency">USD</span></div>
                <div class="product-colorIndicator">
                    <span class="product-colorDot" style="color: #eee;"></span> Arctic
                </div>
            </div>
        </a>
        
        <!-- Add more cards as needed... -->
    </div>
</div>

<?php include 'includes/footer.html'; ?>

</body>
</html>