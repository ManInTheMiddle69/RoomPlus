<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../front-end/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product1</title>
</head>
<body class="singleProduct-body">

<?php include 'includes/header.html'; ?>

<style>
    /* ---------- 1. DARK MODE ENGINE ---------- */
    :root {
      --sp-bg: #ffffff;
      --sp-text-main: #111111;
      --sp-text-sec: #444444;
      --sp-text-muted: #888888;
      --sp-ui-bg: #f3f3f6;
      --sp-border: #eeeeee;
      --sp-btn-bg: #000000;
      --sp-btn-text: #ffffff;
      --sp-thumb-bg: #f0f0f4;
    }

    [data-theme="dark"] {
      --sp-bg: #0e0e0e;
      --sp-text-main: #ffffff;
      --sp-text-sec: #cccccc;
      --sp-text-muted: #888888;
      --sp-ui-bg: #1a1a1a;
      --sp-border: #2a2a2a;
      --sp-btn-bg: #ffffff;
      --sp-btn-text: #000000;
      --sp-thumb-bg: #1a1a1a;
    }

    /* ---------- 2. RESET & GLOBAL ---------- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .singleProduct-body {
      background-color: var(--sp-bg);
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: var(--sp-text-main);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      transition: background-color 0.4s ease, color 0.4s ease;
    }

    .singleProduct-pageContainer {
      max-width: 1400px; 
      margin: 0 auto;
      padding: 6rem 5%; 
      flex-grow: 1;
      animation: singleProduct-fadeScale 0.65s ease forwards;
    }

    .singleProduct-inner {
      display: flex;
      flex-wrap: wrap;
      gap: 5rem;
      align-items: stretch;
      margin-bottom: 8rem;
    }

    /* LEFT SIDE: Vertical Gallery */
    .singleProduct-galleryContainer {
      flex: 1;
      display: flex;
      flex-direction: row;
      gap: 1.5rem;
    }

    .singleProduct-thumbnails {
      display: flex;
      flex-direction: column;
      gap: 0.8rem;
    }

    .singleProduct-thumb {
      width: 60px;
      height: 60px;
      border-radius: 0.2rem;
      overflow: hidden;
      background: var(--sp-thumb-bg);
      border: 1px solid var(--sp-border);
    }

    .singleProduct-thumb img { width: 100%; height: 100%; object-fit: cover; }

    .singleProduct-mainImg {
      flex: 1;
      border-radius: 0.4rem;
      overflow: hidden;
      background: var(--sp-ui-bg);
    }

    .singleProduct-mainImg img {
      width: 100%;
      height: 100%; 
      display: block;
      object-fit: cover;
      transition: filter 0.4s ease;
    }

    [data-theme="dark"] img { filter: brightness(0.85) contrast(1.1); }

    /* RIGHT SIDE: product details */
    .singleProduct-details {
      flex: 1.2;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .singleProduct-name { font-size: 3rem; font-weight: 800; letter-spacing: -0.03em; margin-bottom: 1rem; color: var(--sp-text-main); }
    .singleProduct-priceRow { margin-bottom: 1.5rem; display: flex; align-items: baseline; gap: 15px; }
    .singleProduct-currentPrice { font-size: 2.2rem; font-weight: 700; color: var(--sp-text-main); }
    .singleProduct-badge { background: var(--sp-thumb-bg); color: var(--sp-text-main); padding: 0.3rem 0.8rem; border-radius: 2px; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; }

    .singleProduct-description { font-size: 1.05rem; line-height: 1.6; color: var(--sp-text-sec); margin-bottom: 2rem; }

    .singleProduct-infoGrid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.5rem;
      margin-bottom: 2rem;
      padding-top: 1.5rem;
      border-top: 1px solid var(--sp-border);
    }

    .singleProduct-infoLabel { font-size: 0.7rem; text-transform: uppercase; font-weight: 700; color: var(--sp-text-muted); }
    .singleProduct-colorSwatch { display: inline-block; width: 14px; height: 14px; border-radius: 2px; margin-right: 8px; }
    .singleProduct-colorMidnight { background: #1a1a2e; }
    .singleProduct-sizePill { border: 1px solid var(--sp-text-main); padding: 0.3rem 0.8rem; border-radius: 2px; font-size: 0.75rem; color: var(--sp-text-main); }

    .singleProduct-cartBtn {
      background: var(--sp-btn-bg); color: var(--sp-btn-text); border: none; padding: 1.2rem; width: 100%; border-radius: 2px; font-weight: 700; text-transform: uppercase; cursor: pointer; transition: 0.3s;
    }

    .singleProduct-metaRow { display: flex; gap: 1.5rem; font-size: 0.8rem; color: var(--sp-text-muted); border-top: 1px solid var(--sp-border); padding-top: 1.5rem; }

    /* ---------- RECOMMENDED SECTION ---------- */
    .singleProduct-recTitle {
      font-size: 1.5rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 2.5rem;
      text-align: left;
      border-bottom: 2px solid var(--sp-text-main);
      display: inline-block;
      padding-bottom: 0.5rem;
      color: var(--sp-text-main);
    }

    .singleProduct-recRow {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 1.5rem;
    }

    .singleProduct-recCard {
      text-decoration: none;
      color: inherit;
      transition: transform 0.3s ease;
    }

    .singleProduct-recCard:hover {
      transform: translateY(-5px);
    }

    .singleProduct-recImage {
      width: 100%;
      aspect-ratio: 3/4;
      background: var(--sp-ui-bg);
      border-radius: 0.3rem;
      overflow: hidden;
      margin-bottom: 1rem;
    }

    .singleProduct-recImage img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .singleProduct-recName {
      font-size: 0.9rem;
      font-weight: 700;
      margin-bottom: 0.3rem;
      text-transform: uppercase;
      color: var(--sp-text-main);
    }

    .singleProduct-recPrice {
      font-size: 0.85rem;
      color: var(--sp-text-muted);
    }

    @keyframes singleProduct-fadeScale {
      0% { opacity: 0; transform: translateY(10px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    /* ---------- SMARTPHONE REFINEMENT ---------- */
    @media (max-width: 768px) {
      .singleProduct-pageContainer {
        padding: 4rem 1.5rem;
      }
      
      .singleProduct-inner {
        flex-direction: column;
        gap: 3rem;
      }

      .singleProduct-galleryContainer {
        flex-direction: column-reverse; /* Put main image on top, thumbs below */
      }

      .singleProduct-thumbnails {
        flex-direction: row;
        justify-content: center;
      }

      .singleProduct-details {
        text-align: center;
      }

      .singleProduct-name {
        font-size: 2.2rem;
      }

      .singleProduct-priceRow {
        justify-content: center;
      }

      .singleProduct-infoGrid {
        grid-template-columns: 1fr; /* Stack info labels on mobile */
        gap: 1rem;
      }

      .singleProduct-metaRow {
        justify-content: center;
      }

      .singleProduct-recRow {
        grid-template-columns: repeat(2, 1fr); /* 2 items per row on mobile */
        gap: 1rem;
      }

      .singleProduct-recTitle {
        text-align: center;
        display: block;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
      }
    }
</style>

<div class="singleProduct-pageContainer">
  <!-- MAIN PRODUCT ZONE -->
  <div class="singleProduct-inner">
    <div class="singleProduct-galleryContainer">
      <div class="singleProduct-thumbnails">
        <div class="singleProduct-thumb"><img src="https://picsum.photos/id/1/150/150" alt="thumb"></div>
        <div class="singleProduct-thumb"><img src="https://picsum.photos/id/2/150/150" alt="thumb"></div>
        <div class="singleProduct-thumb"><img src="https://picsum.photos/id/3/150/150" alt="thumb"></div>
      </div>
      <div class="singleProduct-mainImg">
        <img src="https://picsum.photos/id/1/600/900" alt="Main product">
      </div>
    </div>

    <div class="singleProduct-details">
      <div>
        <h1 class="singleProduct-name">ORBIT NEBULA X</h1>
        <div class="singleProduct-priceRow">
          <span class="singleProduct-currentPrice">$379</span>
          <span class="singleProduct-badge">limited edition</span>
        </div>
        <p class="singleProduct-description">
          Immerse in pure audio innovation. The Orbit Nebula X fuses adaptive noise cancellation, 
          spatial audio with head-tracking, and 80h battery life.
        </p>
        <div class="singleProduct-infoGrid">
          <div class="singleProduct-infoItem">
            <span class="singleProduct-infoLabel">Color</span>
            <div class="singleProduct-infoValue"><span class="singleProduct-colorSwatch singleProduct-colorMidnight"></span> Midnight</div>
          </div>
          <div class="singleProduct-infoItem">
            <span class="singleProduct-infoLabel">Size</span>
            <div class="singleProduct-infoValue"><span class="singleProduct-sizePill">Universal</span></div>
          </div>
        </div>
      </div>
      <div>
        <button class="singleProduct-cartBtn">Add to cart</button>
        <div class="singleProduct-metaRow">
          <span>🚚 Free Shipping</span>
          <span>✨ 2-year Warranty</span>
        </div>
      </div>
    </div>
  </div>

  <!-- RECOMMENDED PRODUCTS ZONE -->
  <h2 class="singleProduct-recTitle">You may also like</h2>
  
  <div class="singleProduct-recRow">
    <a href="#" class="singleProduct-recCard">
      <div class="singleProduct-recImage"><img src="https://picsum.photos/id/48/400/533" alt="Rec 1"></div>
      <p class="singleProduct-recName">Nova Case</p>
      <p class="singleProduct-recPrice">$45</p>
    </a>
    <a href="#" class="singleProduct-recCard">
      <div class="singleProduct-recImage"><img src="https://picsum.photos/id/11/400/533" alt="Rec 2"></div>
      <p class="singleProduct-recName">Zen Stand</p>
      <p class="singleProduct-recPrice">$89</p>
    </a>
    <a href="#" class="singleProduct-recCard">
      <div class="singleProduct-recImage"><img src="https://picsum.photos/id/13/400/533" alt="Rec 3"></div>
      <p class="singleProduct-recName">Flux Cable</p>
      <p class="singleProduct-recPrice">$29</p>
    </a>
    <a href="#" class="singleProduct-recCard">
      <div class="singleProduct-recImage"><img src="https://picsum.photos/id/17/400/533" alt="Rec 4"></div>
      <p class="singleProduct-recName">Aero Buds</p>
      <p class="singleProduct-recPrice">$199</p>
    </a>
    <a href="#" class="singleProduct-recCard">
      <div class="singleProduct-recImage"><img src="https://picsum.photos/id/21/400/533" alt="Rec 5"></div>
      <p class="singleProduct-recName">Solar Hub</p>
      <p class="singleProduct-recPrice">$120</p>
    </a>
  </div>
</div>

<?php include 'includes/footer.html'; ?>
</body>
</html>