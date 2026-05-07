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


    /* ---------- 2. RESET & GLOBAL ---------- */
    
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