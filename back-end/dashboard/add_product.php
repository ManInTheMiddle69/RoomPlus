<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>Nebula Commerce | Add Product</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
    }

    /* VERY LIGHT BLUE BACKGROUND */
    .addProduct-body {
      background: #eef5fe;
      min-height: 100vh;
      padding: 2rem 2rem 3rem 2rem;
    }

    /* MAIN DASHBOARD CONTAINER */
    .addProduct-dashboard {
      max-width: 1400px;
      margin: 0 auto;
    }

    /* PAGE TITLE */
    .addProduct-pageTitle {
      margin-bottom: 2rem;
      font-size: 2.2rem;
      font-weight: 700;
      background: linear-gradient(125deg, #0a5e88, #1f7fb3, #3c93ca);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      letter-spacing: -0.3px;
      display: inline-block;
      border-left: 5px solid #4a9fd8;
      padding-left: 1.2rem;
    }

    /* THREE SECTIONS DIRECT LAYOUT */
    .addProduct-threeZoneLayout {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }

    /* SECTION 1: LEFT SIDE - PHOTO ZONE */
    .addProduct-photoZone {
      flex: 1.1;
      min-width: 280px;
      background: rgba(255, 255, 255, 0.5);
      backdrop-filter: blur(4px);
      border-radius: 2rem;
      padding: 1.6rem;
      border: 1px solid rgba(255,255,245,0.8);
      box-shadow: 0 12px 28px -8px rgba(0, 50, 80, 0.08);
    }

    .addProduct-photoBlock {
      background: rgba(230, 245, 255, 0.9);
      border-radius: 1.8rem;
      padding: 1.2rem;
      text-align: center;
      margin-bottom: 1.5rem;
      border: 2px dashed #8db9e2;
      cursor: pointer;
      transition: all 0.2s;
    }

    .addProduct-photoBlock:hover {
      background: rgba(220, 240, 255, 0.95);
      border-color: #4a9fd8;
    }

    .addProduct-cameraIcon {
      font-size: 3.2rem;
      display: inline-block;
    }

    .addProduct-photoText {
      font-weight: 700;
      color: #136b97;
      margin-top: 0.3rem;
      font-size: 0.9rem;
    }

    .addProduct-galleryGrid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
      gap: 1rem;
      width: 100%;
    }

    .addProduct-photoCard {
      background: rgba(255,255,250,0.7);
      border-radius: 1.2rem;
      overflow: hidden;
      border: 1px solid rgba(255,255,245,0.9);
      width: 100%;
    }

    .addProduct-photoCard img {
      width: 100%;
      aspect-ratio: 1 / 1;
      object-fit: cover;
      display: block;
      background: #cfe2f5;
    }

    .addProduct-galleryGridSecondRow {
      margin-top: 1rem;
    }

    /* RIGHT SIDE STACK */
    .addProduct-rightStack {
      flex: 2.2;
      min-width: 320px;
      display: flex;
      flex-direction: column;
      gap: 1.8rem;
    }

    /* UPPER SIDE: product form */
    .addProduct-formSection {
      background: rgba(255, 255, 255, 0.65);
      backdrop-filter: blur(8px);
      border-radius: 2rem;
      padding: 1.6rem 2rem;
      border: 1px solid rgba(255,255,250,0.9);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
    }

    .addProduct-formHeader {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      margin-bottom: 1.3rem;
      border-bottom: 2px solid rgba(70, 150, 200, 0.25);
      padding-bottom: 0.5rem;
    }

    .addProduct-formHeader h3 {
      font-weight: 700;
      background: linear-gradient(125deg, #11658e, #3083b5);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .addProduct-formGrid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
      gap: 1.3rem;
    }

    .addProduct-inputField {
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
    }

    .addProduct-inputField label {
      font-weight: 600;
      font-size: 0.8rem;
      color: #115e86;
    }

    .addProduct-inputField input, .addProduct-inputField select {
      background: #ffffffdb;
      border: 1px solid #cce2f5;
      border-radius: 1.5rem;
      padding: 0.8rem 1rem;
      font-size: 0.9rem;
      color: #0c405b;
      outline: none;
    }

    .addProduct-inputField input:focus {
      border-color: #3083b5;
      background: white;
    }

    /* LOWER SIDE: details area */
    .addProduct-detailsSection {
      background: rgba(255, 255, 255, 0.65);
      backdrop-filter: blur(8px);
      border-radius: 2rem;
      padding: 1.6rem 2rem;
      border: 1px solid rgba(255,255,250,0.9);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
    }

    .addProduct-detailsTitle {
      font-size: 1.2rem;
      font-weight: 700;
      background: linear-gradient(120deg, #136b9c, #3f92c7);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      margin-bottom: 1rem;
    }

    .addProduct-textarea {
      width: 100%;
      background: #fefefed9;
      border: 1px solid #cce2f5;
      border-radius: 1.5rem;
      padding: 1rem 1.2rem;
      font-family: inherit;
      resize: vertical;
      outline: none;
      color: #124263;
    }

    .addProduct-actionFooter {
      margin-top: 1.2rem;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 1.5rem;
    }

    .addProduct-submitBtn {
      background: linear-gradient(95deg, #1976b0, #389fd9);
      border: none;
      padding: 0.8rem 1.8rem;
      border-radius: 3rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: white;
      cursor: pointer;
      box-shadow: 0 5px 12px rgba(0, 70, 110, 0.2);
    }

    .addProduct-submitBtn:hover {
      transform: translateY(-2px);
      background: linear-gradient(95deg, #1e84c4, #4ca9e3);
    }

    .addProduct-goBack {
      font-size: 0.85rem;
      color: #136b97;
      text-decoration: none;
      font-weight: 500;
    }

    @media (max-width: 880px) {
      .addProduct-photoZone { flex: auto; }
      .addProduct-galleryGrid { grid-template-columns: repeat(auto-fill, minmax(85px, 1fr)); }
    }
  </style>
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