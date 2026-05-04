<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../front-end/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product1</title>
</head>
<body>

<?php include 'includes/header.html'; ?>


  <style>
    /* ---------- RESET & GLOBAL ---------- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(145deg, #ffffff 0%, #fafafc 100%);
      font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
      color: #111;
      line-height: 1.4;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    /* main product container – elegant card-like but full width */
    .single-product {
      max-width: 1360px;
      width: 100%;
      background: #ffffff;
      border-radius: 2.5rem;
      box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.02);
      overflow: hidden;
      transition: all 0.4s ease;
      animation: product-fadeScale 0.65s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
    }

    /* two column layout */
    .single-product-inner {
      display: flex;
      flex-wrap: wrap;
    }

    /* LEFT SIDE: image gallery (images from internet) */
    .single-product-gallery {
      flex: 1.1;
      background: #fefefe;
      padding: 2rem 2rem 2rem 2.5rem;
      display: flex;
      flex-direction: column;
      gap: 1.25rem;
    }

    /* main featured image */
    .single-product-main-img {
      width: 100%;
      border-radius: 1.8rem;
      overflow: hidden;
      background: #f3f3f6;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.02);
      transition: transform 0.3s ease;
    }

    .single-product-main-img img {
      width: 100%;
      height: auto;
      display: block;
      object-fit: cover;
      transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.4, 1.2);
    }

    .single-product-main-img:hover img {
      transform: scale(1.02);
    }

    /* thumbnail row (additional images from internet) */
    .single-product-thumbnails {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .single-product-thumb {
      width: 85px;
      height: 85px;
      border-radius: 1.2rem;
      overflow: hidden;
      cursor: pointer;
      background: #f0f0f4;
      transition: all 0.25s ease;
      border: 2px solid transparent;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
    }

    .single-product-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.3s;
    }

    .single-product-thumb:hover {
      transform: translateY(-4px);
      border-color: #cbcbcf;
      box-shadow: 0 12px 20px -8px rgba(0, 0, 0, 0.12);
    }

    .single-product-thumb:hover img {
      transform: scale(1.05);
    }

    /* RIGHT SIDE: product details */
    .single-product-details {
      flex: 0.9;
      padding: 2.5rem 3rem 2.5rem 1.8rem;
      background: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* product name */
    .single-product-name {
      font-size: clamp(2rem, 5vw, 2.8rem);
      font-weight: 750;
      letter-spacing: -0.02em;
      line-height: 1.2;
      margin-bottom: 1rem;
      background: linear-gradient(135deg, #0a0a0a, #2a2a2a);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      animation: slideRight 0.5s ease forwards;
    }

    /* price section */
    .single-product-price {
      margin: 0.75rem 0 1.25rem 0;
      display: flex;
      align-items: baseline;
      gap: 12px;
      flex-wrap: wrap;
    }

    .single-product-current-price {
      font-size: 2.2rem;
      font-weight: 800;
      color: #000;
      letter-spacing: -0.02em;
    }

    .single-product-old-price {
      font-size: 1.1rem;
      color: #888;
      text-decoration: line-through;
      font-weight: 450;
    }

    .single-product-badge {
      background: #f0f0f4;
      padding: 0.2rem 0.9rem;
      border-radius: 50px;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      color: #2c2c2c;
    }

    /* description */
    .single-product-description {
      font-size: 1rem;
      line-height: 1.55;
      color: #3a3a44;
      margin: 1rem 0 1.5rem 0;
      border-left: 3px solid #e0e0e8;
      padding-left: 1rem;
      transition: border 0.2s;
    }

    /* detail grid: color, size, other info */
    .single-product-info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem 1.5rem;
      margin: 1.2rem 0 1.6rem 0;
      background: #fafafd;
      padding: 1.2rem 1.2rem;
      border-radius: 1.5rem;
    }

    .single-product-info-item {
      display: flex;
      flex-direction: column;
      gap: 0.3rem;
    }

    .single-product-info-label {
      font-size: 0.7rem;
      text-transform: uppercase;
      font-weight: 600;
      letter-spacing: 0.5px;
      color: #7c7c8a;
    }

    .single-product-info-value {
      font-weight: 600;
      font-size: 1rem;
      color: #1e1e2a;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    /* color swatch circle */
    .color-swatch {
      display: inline-block;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #3b3b4f;
      margin-right: 6px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .color-swatch.midnight { background: #1a1a2e; }
    .color-swatch.silver { background: #b9c3ce; }
    .color-swatch.copper { background: #c97e5a; }

    /* size options (interactive via css, but no js needed: just display) */
    .size-options {
      display: flex;
      gap: 0.6rem;
      margin-top: 4px;
    }
    .size-pill {
      border: 1px solid #ddd;
      padding: 0.2rem 0.8rem;
      border-radius: 40px;
      font-size: 0.8rem;
      font-weight: 500;
      background: white;
      transition: all 0.2s;
      cursor: default;
    }
    .size-pill:hover {
      background: #111;
      color: white;
      border-color: #111;
      transform: scale(0.96);
    }

    /* quantity & add to cart – animated button */
    .single-product-actions {
      margin-top: 1rem;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 1.2rem;
    }

    .single-product-quantity {
      display: flex;
      align-items: center;
      border: 1px solid #e2e2ea;
      border-radius: 60px;
      overflow: hidden;
      background: white;
    }

    .single-product-qty-btn {
      background: transparent;
      border: none;
      padding: 0.6rem 1rem;
      font-size: 1.2rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
      font-family: monospace;
    }

    .single-product-qty-btn:hover {
      background: #f0f0f4;
    }

    .single-product-qty-input {
      width: 48px;
      text-align: center;
      border: none;
      font-weight: 600;
      font-size: 1rem;
      background: white;
      pointer-events: none;
    }

    /* main CTA button */
    .single-product-cart-btn {
      background: #000;
      border: none;
      padding: 0.85rem 2rem;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.95rem;
      letter-spacing: 0.3px;
      color: white;
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .single-product-cart-btn:hover {
      background: #2a2a2a;
      transform: translateY(-2px);
      box-shadow: 0 16px 24px -10px rgba(0, 0, 0, 0.2);
    }

    .single-product-cart-btn:active {
      transform: translateY(1px);
    }

    /* extra detail row (shipping, warranty) */
    .single-product-meta {
      margin-top: 2rem;
      padding-top: 1rem;
      border-top: 1px solid #efeff4;
      display: flex;
      gap: 1.5rem;
      flex-wrap: wrap;
      font-size: 0.8rem;
      color: #5c5c6e;
    }

    .single-product-meta span {
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    /* animations */
    @keyframes product-fadeScale {
      0% {
        opacity: 0;
        transform: scale(0.97) translateY(12px);
      }
      100% {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    @keyframes slideRight {
      0% {
        opacity: 0;
        transform: translateX(-18px);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    /* staggered children animation */
    .single-product-details > * {
      animation: slideUpFade 0.5s ease backwards;
    }

    .single-product-name { animation-delay: 0.05s; }
    .single-product-price { animation-delay: 0.1s; }
    .single-product-description { animation-delay: 0.15s; }
    .single-product-info-grid { animation-delay: 0.2s; }
    .single-product-actions { animation-delay: 0.28s; }
    .single-product-meta { animation-delay: 0.35s; }

    @keyframes slideUpFade {
      0% {
        opacity: 0;
        transform: translateY(14px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* responsive */
    @media (max-width: 900px) {
      body {
        padding: 1.2rem;
      }
      .single-product-inner {
        flex-direction: column;
      }
      .single-product-gallery {
        padding: 1.5rem;
      }
      .single-product-details {
        padding: 1.8rem;
      }
      .single-product-info-grid {
        grid-template-columns: 1fr;
      }
      .single-product-thumb {
        width: 70px;
        height: 70px;
      }
    }

    @media (max-width: 500px) {
      .single-product-actions {
        flex-direction: column;
        align-items: stretch;
      }
      .single-product-cart-btn {
        justify-content: center;
      }
    }

    /* no footer / no header - pure product page */
  </style>

<div class="single-product">
  <div class="single-product-inner">
    <!-- LEFT: IMAGES (from internet) -->
    <div class="single-product-gallery">
      <div class="single-product-main-img">
        <img src="https://picsum.photos/id/20/700/700" alt="Main product image - futuristic headphone" id="mainProductImage">
      </div>
      <div class="single-product-thumbnails">
        <div class="single-product-thumb" data-img="https://picsum.photos/id/20/700/700">
          <img src="https://picsum.photos/id/20/150/150" alt="thumbnail 1">
        </div>
        <div class="single-product-thumb" data-img="https://picsum.photos/id/26/700/700">
          <img src="https://picsum.photos/id/26/150/150" alt="thumbnail 2">
        </div>
        <div class="single-product-thumb" data-img="https://picsum.photos/id/29/700/700">
          <img src="https://picsum.photos/id/29/150/150" alt="thumbnail 3">
        </div>
        <div class="single-product-thumb" data-img="https://picsum.photos/id/42/700/700">
          <img src="https://picsum.photos/id/42/150/150" alt="thumbnail 4">
        </div>
      </div>
    </div>

    <!-- RIGHT: PRODUCT DETAILS -->
    <div class="single-product-details">
      <h1 class="single-product-name">ORBIT NEBULA X</h1>
      
      <div class="single-product-price">
        <span class="single-product-current-price">$379</span>
        <span class="single-product-old-price">$499</span>
        <span class="single-product-badge">limited edition</span>
      </div>

      <p class="single-product-description">
        Immerse in pure audio innovation. The Orbit Nebula X fuses adaptive noise cancellation, 
        spatial audio with head-tracking, and 80h battery life. Engineered for creators and dreamers.
      </p>

      <!-- detailed grid: color, size, material, etc -->
      <div class="single-product-info-grid">
        <div class="single-product-info-item">
          <span class="single-product-info-label">Color</span>
          <div class="single-product-info-value">
            <span class="color-swatch midnight"></span> Midnight obsidian
          </div>
        </div>
        <div class="single-product-info-item">
          <span class="single-product-info-label">Material</span>
          <div class="single-product-info-value">Recycled aluminum + vegan leather</div>
        </div>
        <div class="single-product-info-item">
          <span class="single-product-info-label">Size / fit</span>
          <div class="single-product-info-value">
            <div class="size-options">
              <span class="size-pill">S/M</span>
              <span class="size-pill">L/XL</span>
              <span class="size-pill">universal</span>
            </div>
          </div>
        </div>
        <div class="single-product-info-item">
          <span class="single-product-info-label">Connectivity</span>
          <div class="single-product-info-value">Bluetooth 5.4 · USB-C · multipoint</div>
        </div>
        <div class="single-product-info-item">
          <span class="single-product-info-label">Weight</span>
          <div class="single-product-info-value">250g · ergonomic design</div>
        </div>
        <div class="single-product-info-item">
          <span class="single-product-info-label">Warranty</span>
          <div class="single-product-info-value">2 years global + 30-day trial</div>
        </div>
      </div>

      <!-- action buttons + quantity (pure CSS, quantity display only) -->
      <div class="single-product-actions">
        <div class="single-product-quantity">
          <button class="single-product-qty-btn" aria-label="decrease" disabled style="cursor:default;">−</button>
          <input type="text" class="single-product-qty-input" value="1" readonly>
          <button class="single-product-qty-btn" aria-label="increase" disabled style="cursor:default;">+</button>
        </div>
        <button class="single-product-cart-btn">
          ✦ Add to cart
        </button>
      </div>

      <div class="single-product-meta">
        <span>🚚 free express shipping</span>
        <span>🔄 30 days easy return</span>
        <span>✨ 2-year warranty</span>
      </div>
    </div>
  </div>
</div>

<!-- micro interaction for thumbnail gallery (pure CSS but we add tiny inline style for image swap using minimal JS? but you said ONLY CSS/HTML: however thumbnail click to change main image requires a tiny JS. 
I'll add a very minimal and clean script only for gallery interaction because it's essential for product display. If you want truly no JS i can remove but it degrades UX. I'll keep it but note: it's only 6 lines and improves demo, but if you require zero JS i can remove. However I'll include and mark as optional but makes product perfect. 
But you requested "only css and html" — I can delete that? but many product pages have image gallery interaction, but to respect strict no-JS: I'll remove script and the thumbnails will just be decorative. I'll comment out the script to keep 100% html/css, but I will add a note. I decide: provide pure html/css version: the thumbnails won't change main image. That's fine for demo. For a better demo I'll keep a tiny script but also note it's minimal, but since you said ONLY css+html, I'll remove the script. I'll remove any JS and keep thumbnails as static, it's still elegant product page.

But to avoid any violation, I'll REMOVE ALL javascript. The product images are nice and design works. I'll keep thumbnails just as extra views without interactivity, still modern.

Here we go (No JS at all) -->

<style>
  /* ensure no JS fallback: thumbnails are just additional visuals */
  .single-product-thumb {
    cursor: default;
  }
  .single-product-qty-btn {
    cursor: default;
    opacity: 0.6;
  }
  .single-product-qty-btn:hover {
    background: transparent;
  }
</style>


<?php include 'includes/footer.html'; ?>
</body>
</html>