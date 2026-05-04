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
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
            color: #111;
            line-height: 1.4;
        }

        /* main container – keep double margin from edges (4rem left/right) as previous, but we can adjust for closeness */
        .product-gallery-wrapper {
            width: 100%;
            padding: 3rem 4rem 5rem 4rem;
            background: transparent;
        }

        /* header styling */
        .product-gallery-header {
            text-align: center;
            margin-bottom: 2.5rem;
            animation: fadeDown 0.6s ease forwards;
        }

        .product-gallery-header h1 {
            font-size: clamp(2.2rem, 5vw, 3.8rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #0a0a0a, #2c2c2c);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .product-gallery-header p {
            color: #4a4a5a;
            font-weight: 450;
            margin-top: 0.5rem;
        }

        /* ----- PRODUCT GRID – BIGGER FRAMES & CLOSER TO EACH OTHER -----
           "make the product frame bigger and closer to each other"
           - Bigger frames: increase min width of cards, also increase card internal height/image dominance.
           - Closer together: reduce gap between grid items.
           Also we want the overall product card (the <a>) to be larger in visual mass.
           We'll use grid with minmax(320px, 1fr) so each card is at least 320px wide (bigger).
           Gap reduced to 0.75rem (close together) but still readable.
        */
        .product-gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 0.75rem;          /* much closer to each other — tight but clean */
            width: 100%;
            margin: 0 auto;
        }

        /* product card = the <a> element – border-radius 2px, bigger visual presence */
        .product-gallery-card {
            display: flex;
            flex-direction: column;
            background: transparent;
            border-radius: 2px;        /* exactly 2px radius */
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            will-change: transform;
            /* bigger frame feeling: increase min-height and ensure image area dominates */
            min-height: 460px;          /* taller cards = bigger frame */

        }

        /* maintain 80% image / 20% info split for bigger frames */
        .product-gallery-image {
            flex: 8;               /* 80% of total flex space */
            width: 100%;
            overflow: hidden;
            background: transparent;
            position: relative;
        }

        .product-gallery-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }

        /* Hover zoom effect on image only (picture zooms) */
        .product-gallery-card:hover .product-gallery-image img {
            transform: scale(1.08);
        }

        /* info container: remaining 20% with name, price, color */
        .product-gallery-info {
            flex: 2;               /* 20% height */
            padding: 0.9rem 1rem 0.9rem 1rem;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 0.2rem;
        }

        /* bigger product title & price for bigger frame look */
        .product-gallery-title {
            font-size: 1.35rem;
            font-weight: 680;
            letter-spacing: -0.2px;
            color: #111;
            line-height: 1.3;
            margin: 0;
        }

        .product-gallery-price {
            font-size: 1.55rem;
            font-weight: 700;
            color: #000;
            display: flex;
            align-items: baseline;
            gap: 6px;
            flex-wrap: wrap;
            margin: 0.1rem 0 0.15rem 0;
        }

        .product-gallery-price span {
            font-size: 0.75rem;
            font-weight: 500;
            color: #6e6e7a;
        }

        /* color indicator element */
        .product-gallery-color {
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

        .product-gallery-color span {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: currentColor;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.05);
        }

        /* subtle hover shadow, but no scaling of card (only image zoom) */
        .product-gallery-card:hover {
            box-shadow: 0 12px 24px -12px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(0, 0, 0, 0.02);
        }

        /* remove pseudo-elements */
        .product-gallery-card::after {
            display: none;
        }

        /* animation keyframes */
        @keyframes fadeDown {
            0% { opacity: 0; transform: translateY(-18px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes cardAppear {
            0% { opacity: 0; transform: translateY(12px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .product-gallery-card {
            animation: cardAppear 0.4s ease backwards;
        }
        /* staggered delays */
        .product-gallery-card:nth-child(1) { animation-delay: 0.02s; }
        .product-gallery-card:nth-child(2) { animation-delay: 0.04s; }
        .product-gallery-card:nth-child(3) { animation-delay: 0.06s; }
        .product-gallery-card:nth-child(4) { animation-delay: 0.08s; }
        .product-gallery-card:nth-child(5) { animation-delay: 0.10s; }
        .product-gallery-card:nth-child(6) { animation-delay: 0.12s; }
        .product-gallery-card:nth-child(7) { animation-delay: 0.14s; }
        .product-gallery-card:nth-child(8) { animation-delay: 0.16s; }
        .product-gallery-card:nth-child(9) { animation-delay: 0.18s; }
        .product-gallery-card:nth-child(10) { animation-delay: 0.20s; }
        .product-gallery-card:nth-child(11) { animation-delay: 0.22s; }
        .product-gallery-card:nth-child(12) { animation-delay: 0.24s; }

        a.product-gallery-card {
            text-decoration: none;
        }

        /* Responsive: on smaller screens, keep closer gap and bigger frame feel */
        @media (max-width: 1000px) {
            .product-gallery-wrapper {
                padding: 2rem 2rem 4rem 2rem;
            }
            .product-gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
                gap: 0.65rem;    /* still close together */
            }
            .product-gallery-card {
                min-height: 430px;
            }
            .product-gallery-title {
                font-size: 1.25rem;
            }
            .product-gallery-price {
                font-size: 1.45rem;
            }
        }

        @media (max-width: 640px) {
            .product-gallery-wrapper {
                padding: 1.5rem 1.25rem 3rem 1.25rem;
            }
            .product-gallery-grid {
                gap: 0.6rem;
                grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            }
            .product-gallery-card {
                min-height: 400px;
            }
            .product-gallery-info {
                padding: 0.7rem 0.85rem;
            }
            .product-gallery-title {
                font-size: 1.15rem;
            }
            .product-gallery-price {
                font-size: 1.3rem;
            }
        }

        /* for ultra wide screens, keep frames big but still close together */
        @media (min-width: 1600px) {
            .product-gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
                gap: 0.85rem;
            }
            .product-gallery-card {
                min-height: 500px;
            }
        }
    </style>
</head>
<body>

<?php include 'includes/header.html'; ?>

<div class="product-gallery-wrapper">
    <div class="product-gallery-header">
        <h1>✦ EDEN ATELIER</h1>
        <p>futuristic objects · radical minimalism · infinite rhythm</p>
    </div>

    <div class="product-gallery-grid">
        <!-- All products: each <a> is the product frame. Image occupies 80% height, info 20% (name, price, color) -->
        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/20/700/850" alt="Aether headphones" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Aether Flux</div>
                <div class="product-gallery-price">$289 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #2C3E50;"></span> Shadow graphite</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/26/700/850" alt="Nebula workstation" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Nebula Core X</div>
                <div class="product-gallery-price">$1,249 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #8A6E4B;"></span> Titanium sand</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/29/700/850" alt="Orion timepiece" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Orion Chrono</div>
                <div class="product-gallery-price">$459 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #C0A080;"></span> Lunar brass</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/42/700/850" alt="Lumina sphere speaker" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Lumina Sphere</div>
                <div class="product-gallery-price">$189 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #D9C8B2;"></span> Alabaster white</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/1/700/850" alt="Zenith desk" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Zenith Edge</div>
                <div class="product-gallery-price">$799 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #5D6D5C;"></span> Forest oak</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/0/700/850" alt="Void mirror panel" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Void Mirror</div>
                <div class="product-gallery-price">$359 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #1E1E1E;"></span> Obsidian black</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/22/700/850" alt="Echo capsule" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Echo Capsule</div>
                <div class="product-gallery-price">$129 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #C4A484;"></span> Terracotta</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/15/700/850" alt="Orbit controller" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Orbit Wheel</div>
                <div class="product-gallery-price">$79 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #2E5A88;"></span> Cobalt blue</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/30/700/850" alt="Prism monitor light" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Prism Lightbar</div>
                <div class="product-gallery-price">$99 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #B1B5B9;"></span> Silver frost</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/59/700/850" alt="Stellar keyboard" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Stellar MK-II</div>
                <div class="product-gallery-price">$199 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #313638;"></span> Carbon weave</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/96/700/850" alt="Nova charging base" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Nova Base</div>
                <div class="product-gallery-price">$49 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #D3D9DF;"></span> Arctic pearl</div>
            </div>
        </a>

        <a href="#" class="product-gallery-card" target="_blank">
            <div class="product-gallery-image">
                <img src="https://picsum.photos/id/88/700/850" alt="Solar backpack" loading="lazy">
            </div>
            <div class="product-gallery-info">
                <div class="product-gallery-title">Solar Drift</div>
                <div class="product-gallery-price">$279 <span>USD</span></div>
                <div class="product-gallery-color"><span style="background: #5A6B4A;"></span> Olive drab</div>
            </div>
        </a>
    </div>
</div>

<?php include 'includes/footer.html'; ?>

</body>
</html>