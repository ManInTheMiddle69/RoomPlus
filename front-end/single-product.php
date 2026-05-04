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
    /* ---------- RESET & GLOBAL ---------- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .singleProduct-body {
      background-color: #ffffff;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: #111;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* main container for content */
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
      background: #f0f0f4;
      border: 1px solid #eee;
    }

    .singleProduct-thumb img { width: 100%; height: 100%; object-fit: cover; }

    .singleProduct-mainImg {
      flex: 1;
      border-radius: 0.4rem;
      overflow: hidden;
      background: #f3f3f6;
    }

    .singleProduct-mainImg img {
      width: 100%;
      height: 100%; 
      display: block;
      object-fit: cover;
    }

    /* RIGHT SIDE: product details */
    .singleProduct-details {
      flex: 1.2;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .singleProduct-name { font-size: 3rem; font-weight: 800; letter-spacing: -0.03em; margin-bottom: 1rem; }
    .singleProduct-priceRow { margin-bottom: 1.5rem; display: flex; align-items: baseline; gap: 15px; }
    .singleProduct-currentPrice { font-size: 2.2rem; font-weight: 700; }
    .singleProduct-badge { background: #f0f0f4; padding: 0.3rem 0.8rem; border-radius: 2px; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; }

    .singleProduct-description { font-size: 1.05rem; line-height: 1.6; color: #444; margin-bottom: 2rem; }

    .singleProduct-infoGrid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.5rem;
      margin-bottom: 2rem;
      padding-top: 1.5rem;
      border-top: 1px solid #eee;
    }

    .singleProduct-infoLabel { font-size: 0.7rem; text-transform: uppercase; font-weight: 700; color: #999; }
    .singleProduct-colorSwatch { display: inline-block; width: 14px; height: 14px; border-radius: 2px; margin-right: 8px; }
    .singleProduct-colorMidnight { background: #1a1a2e; }
    .singleProduct-sizePill { border: 1px solid #000; padding: 0.3rem 0.8rem; border-radius: 2px; font-size: 0.75rem; }

    .singleProduct-cartBtn {
      background: #000; color: white; border: none; padding: 1.2rem; width: 100%; border-radius: 2px; font-weight: 700; text-transform: uppercase; cursor: pointer;
    }

    .singleProduct-metaRow { display: flex; gap: 1.5rem; font-size: 0.8rem; color: #888; border-top: 1px solid #eee; padding-top: 1.5rem; }

    /* ---------- RECOMMENDED SECTION ---------- */
    .singleProduct-recTitle {
      font-size: 1.5rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 2.5rem;
      text-align: left;
      border-bottom: 2px solid #111;
      display: inline-block;
      padding-bottom: 0.5rem;
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
      background: #f3f3f6;
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
    }

    .singleProduct-recPrice {
      font-size: 0.85rem;
      color: #666;
    }

    @keyframes singleProduct-fadeScale {
      0% { opacity: 0; transform: translateY(10px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 1100px) {
      .singleProduct-recRow { grid-template-columns: repeat(3, 1fr); }
    }

    @media (max-width: 768px) {
      .singleProduct-inner { flex-direction: column; }
      .singleProduct-recRow { grid-template-columns: repeat(2, 1fr); }
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