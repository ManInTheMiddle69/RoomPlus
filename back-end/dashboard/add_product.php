<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <link rel="stylesheet" href="../back-end-style.css">
  <title>Nebula Commerce | Add Product</title>

  
</head>
<body class="addProduct-body">

<div class="addProduct-dashboard">
  <div class="addProduct-pageTitle">✦ ADD NEW PRODUCT ✦</div>

  <div class="addProduct-threeZoneLayout">
    
    <!-- LEFT PHOTO ZONE -->
    <div class="addProduct-photoZone">
      <div class="addProduct-photoBlock">
        <div class="addProduct-cameraIcon">📷 + 🖼️</div>
        <div class="addProduct-photoText">CLICK TO ADD PHOTO</div>
      </div>
      
      <div class="addProduct-galleryContainer">
        <div class="addProduct-galleryGrid">
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/20/200/200" alt="sample"></div>
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/26/200/200" alt="sample"></div>
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/30/200/200" alt="sample"></div>
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/36/200/200" alt="sample"></div>
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/42/200/200" alt="sample"></div>
        </div>
        <div class="addProduct-galleryGrid addProduct-galleryGridSecondRow">
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/59/200/200" alt="sample"></div>
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/66/200/200" alt="sample"></div>
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/88/200/200" alt="sample"></div>
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/100/200/200" alt="sample"></div>
          <div class="addProduct-photoCard"><img src="https://picsum.photos/id/120/200/200" alt="sample"></div>
        </div>
      </div>
    </div>

    <!-- RIGHT STACK -->
    <div class="addProduct-rightStack">
      <div class="addProduct-formSection">
        <div class="addProduct-formHeader">
          <h3>⚡ PRODUCT SPECS</h3>
          <span style="font-size:0.7rem; background:#cae1f5; padding:0.2rem 0.8rem; border-radius:30px;">inventory</span>
        </div>
        <form onsubmit="return false;">
          <div class="addProduct-formGrid">
            <div class="addProduct-inputField">
              <label>🏷️ PRODUCT NAME</label>
              <input type="text" value="Nebula Drift 3.0">
            </div>
            <div class="addProduct-inputField">
              <label>💰 PRICE ($)</label>
              <input type="number" step="0.01" value="149.99">
            </div>
            <div class="addProduct-inputField">
              <label>🎨 COLOR</label>
              <select>
                <option value="Lunar Frost" selected>Lunar Frost</option>
                <option value="Midnight Black">Midnight Black</option>
                <option value="Arctic White">Arctic White</option>
              </select>
            </div>
            <div class="addProduct-inputField">
              <label>📏 SIZE</label>
              <select>
                <option>S</option>
                <option selected>M</option>
                <option>L</option>
              </select>
            </div>
            <div class="addProduct-inputField">
              <label>📦 QUANTITY</label>
              <input type="number" value="78">
            </div>
          </div>
        </form>
      </div>

      <div class="addProduct-detailsSection">
        <div class="addProduct-detailsTitle">✨ MORE DETAILS</div>
        <textarea class="addProduct-textarea" rows="5">🚀 NEBULA DRIFT 3.0 – FUTURISTIC ESSENTIALS

• Aerodynamic mesh upper with reactive cooling
• Lightweight carbon-fiber midsole
• Holographic reflective details
• 2-year cosmic warranty</textarea>
        <div class="addProduct-actionFooter">
          <a href="products.php" class="addProduct-goBack">← Go Back</a>
          <button class="addProduct-submitBtn" type="button">+ ADD PRODUCT ✦</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>