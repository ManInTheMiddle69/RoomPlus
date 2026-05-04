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
      font-family: 'Inter', 'Segoe UI', 'Poppins', system-ui, -apple-system, sans-serif;
    }

    /* VERY LIGHT BLUE BACKGROUND — extremely light, airy */
    body {
      background: #eef5fe;
      min-height: 100vh;
      padding: 2rem 2rem 3rem 2rem;
    }

    /* MAIN DASHBOARD CONTAINER */
    .add-product-dashboard {
      max-width: 1400px;
      margin: 0 auto;
    }

    /* PAGE TITLE (cool, futuristic) */
    .page-title {
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
    .three-zone-layout {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }

    /* ========= SECTION 1: LEFT SIDE - ICON + PHOTO ZONE (NO TITLE, NO LEGEND, FULL WIDTH PHOTOS WITH MARGIN BETWEEN) ========= */
    .photo-zone {
      flex: 1.1;
      min-width: 280px;
      background: rgba(255, 255, 255, 0.5);
      backdrop-filter: blur(4px);
      border-radius: 2rem;
      padding: 1.6rem;
      border: 1px solid rgba(255,255,245,0.8);
      box-shadow: 0 12px 28px -8px rgba(0, 50, 80, 0.08);
    }

    /* ADD PHOTO ICON area */
    .add-photo-block {
      background: rgba(230, 245, 255, 0.9);
      border-radius: 1.8rem;
      padding: 1.2rem;
      text-align: center;
      margin-bottom: 1.5rem;
      border: 2px dashed #8db9e2;
      cursor: pointer;
      transition: all 0.2s;
    }

    .add-photo-block:hover {
      background: rgba(220, 240, 255, 0.95);
      border-color: #4a9fd8;
    }

    .camera-icon {
      font-size: 3.2rem;
      display: inline-block;
      filter: drop-shadow(0 4px 6px rgba(0,0,0,0.03));
    }

    .add-photo-text {
      font-weight: 700;
      color: #136b97;
      margin-top: 0.3rem;
      font-size: 0.9rem;
      letter-spacing: 0.3px;
    }

    /* Under the icon: already added photos - full width grid with margin between photos */
    .added-photos-container {
      margin-top: 0.5rem;
    }

    /* gallery grid - photos take full available width, with gaps */
    .photo-gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
      gap: 1rem;
      width: 100%;
    }

    .photo-card {
      background: rgba(255,255,250,0.7);
      border-radius: 1.2rem;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
      text-align: center;
      border: 1px solid rgba(255,255,245,0.9);
      width: 100%;
    }

    /* images take full width of card */
    .photo-card img {
      width: 100%;
      aspect-ratio: 1 / 1;
      object-fit: cover;
      display: block;
      background: #cfe2f5;
    }

    /* NO LEGEND, NO TITLE — we completely remove any text label under photos */
    .photo-label {
      display: none;
    }

    /* second row same style, no extra titles */
    .second-row {
      margin-top: 1rem;
    }

    /* No animations on photo section at all (as requested) */
    .photo-card, .photo-card img, .photo-gallery-grid {
      animation: none;
      transition: none;
    }
    .photo-card:hover {
      transform: none;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
    }

    /* ========= RIGHT SIDE (DIVIDED INTO TWO SECTIONS) ========= */
    .right-stack {
      flex: 2.2;
      min-width: 320px;
      display: flex;
      flex-direction: column;
      gap: 1.8rem;
    }

    /* UPPER SIDE: product form (name, price, color, size, quantity) */
    .product-form-section {
      background: rgba(255, 255, 255, 0.65);
      backdrop-filter: blur(8px);
      border-radius: 2rem;
      padding: 1.6rem 2rem;
      border: 1px solid rgba(255,255,250,0.9);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
    }

    .form-header {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      margin-bottom: 1.3rem;
      border-bottom: 2px solid rgba(70, 150, 200, 0.25);
      padding-bottom: 0.5rem;
    }

    .form-header h3 {
      font-weight: 700;
      background: linear-gradient(125deg, #11658e, #3083b5);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      font-size: 1.3rem;
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
      gap: 1.3rem;
    }

    .input-field {
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
    }

    .input-field label {
      font-weight: 600;
      font-size: 0.8rem;
      color: #115e86;
      letter-spacing: 0.3px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .input-field input, .input-field select {
      background: #ffffffdb;
      border: 1px solid #cce2f5;
      border-radius: 1.5rem;
      padding: 0.8rem 1rem;
      font-size: 0.9rem;
      font-weight: 500;
      color: #0c405b;
      transition: all 0.2s;
      outline: none;
    }

    .input-field input:focus, .input-field select:focus {
      border-color: #3083b5;
      box-shadow: 0 0 0 3px rgba(48, 131, 181, 0.15);
      background: white;
    }

    /* LOWER SIDE: more details area */
    .more-details-section {
      background: rgba(255, 255, 255, 0.65);
      backdrop-filter: blur(8px);
      border-radius: 2rem;
      padding: 1.6rem 2rem;
      border: 1px solid rgba(255,255,250,0.9);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
    }

    .details-title {
      font-size: 1.2rem;
      font-weight: 700;
      background: linear-gradient(120deg, #136b9c, #3f92c7);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .details-title::before {
      content: "✧";
      font-size: 1.3rem;
      color: #4a9fd8;
    }

    textarea {
      width: 100%;
      background: #fefefed9;
      border: 1px solid #cce2f5;
      border-radius: 1.5rem;
      padding: 1rem 1.2rem;
      font-family: inherit;
      font-size: 0.9rem;
      resize: vertical;
      outline: none;
      transition: 0.2s;
      color: #124263;
    }

    textarea:focus {
      border-color: #4a9fd8;
      box-shadow: 0 0 0 3px rgba(74, 159, 216, 0.2);
      background: white;
    }

    .action-footer {
      margin-top: 1.2rem;
      display: flex;
      justify-content: flex-end;
    }

    .futuristic-btn {
      background: linear-gradient(95deg, #1976b0, #389fd9);
      border: none;
      padding: 0.8rem 1.8rem;
      border-radius: 3rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: white;
      letter-spacing: 0.5px;
      cursor: pointer;
      box-shadow: 0 5px 12px rgba(0, 70, 110, 0.2);
      transition: all 0.2s ease;
      border: 1px solid rgba(255,255,255,0.4);
    }

    .futuristic-btn:hover {
      transform: translateY(-2px);
      background: linear-gradient(95deg, #1e84c4, #4ca9e3);
      box-shadow: 0 10px 18px rgba(20, 80, 120, 0.25);
    }

    /* Responsive */
    @media (max-width: 880px) {
      body {
        padding: 1.2rem;
      }
      .photo-zone {
        flex: auto;
      }
      .photo-gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(85px, 1fr));
        gap: 0.8rem;
      }
    }

    /* ensure no extra spacing or titles appear */
    .added-photos-section {
      width: 100%;
    }
    /* remove any hidden legend */
    .added-photos-label, .photo-legend {
      display: none;
    }
  </style>
</head>
<body>
<div class="add-product-dashboard">
  <!-- PAGE TITLE -->
  <div class="page-title">✦ ADD NEW PRODUCT ✦</div>

  <!-- THREE DIRECT SECTIONS: left photo zone | right side splitted into upper form + lower details -->
  <div class="three-zone-layout">
    
    <!-- LEFT SECTION: Icon to add photo + already added photos (full width, margin between, no title/legend) -->
    <div class="photo-zone">
      <!-- Icon + add photo area (no js, just UI) -->
      <div class="add-photo-block">
        <div class="camera-icon">📷 + 🖼️</div>
        <div class="add-photo-text">CLICK TO ADD PHOTO</div>
        <div style="font-size:0.7rem; color:#2b7da3; margin-top: 5px;">drag & drop ready • futuristic</div>
      </div>
      
      <!-- UNDER THE ICON: random already added photos - full width with margin between, no title/legend -->
      <div class="added-photos-container">
        <!-- first row of random photos from internet (picsum) - no labels -->
        <div class="photo-gallery-grid">
          <div class="photo-card">
            <img src="https://picsum.photos/id/20/200/200" alt="product sample" loading="lazy">
          </div>
          <div class="photo-card">
            <img src="https://picsum.photos/id/26/200/200" alt="product sample" loading="lazy">
          </div>
          <div class="photo-card">
            <img src="https://picsum.photos/id/30/200/200" alt="product sample" loading="lazy">
          </div>
          <div class="photo-card">
            <img src="https://picsum.photos/id/36/200/200" alt="product sample" loading="lazy">
          </div>
          <div class="photo-card">
            <img src="https://picsum.photos/id/42/200/200" alt="product sample" loading="lazy">
          </div>
        </div>
        <!-- second row of random added photos from internet (more variety, full width, margin between) -->
        <div class="photo-gallery-grid second-row">
          <div class="photo-card">
            <img src="https://picsum.photos/id/59/200/200" alt="product sample" loading="lazy">
          </div>
          <div class="photo-card">
            <img src="https://picsum.photos/id/66/200/200" alt="product sample" loading="lazy">
          </div>
          <div class="photo-card">
            <img src="https://picsum.photos/id/88/200/200" alt="product sample" loading="lazy">
          </div>
          <div class="photo-card">
            <img src="https://picsum.photos/id/100/200/200" alt="product sample" loading="lazy">
          </div>
          <div class="photo-card">
            <img src="https://picsum.photos/id/120/200/200" alt="product sample" loading="lazy">
          </div>
        </div>
        <!-- No text, no legend, no titles — exactly as required -->
      </div>
    </div>

    <!-- RIGHT SIDE: split into two vertical sections (upper form & lower details) -->
    <div class="right-stack">
      
      <!-- UPPER SIDE: product form (name, price, color, size, quantity) -->
      <div class="product-form-section">
        <div class="form-header">
          <h3>⚡ PRODUCT SPECS</h3>
          <span style="font-size:0.7rem; background:#cae1f5; padding:0.2rem 0.8rem; border-radius:30px;">inventory</span>
        </div>
        <form onsubmit="return false;"> <!-- pure UI, no JS -->
          <div class="form-grid">
            <div class="input-field">
              <label>🏷️ PRODUCT NAME</label>
              <input type="text" placeholder="e.g. Quantum Runner X1" value="Nebula Drift 3.0">
            </div>
            <div class="input-field">
              <label>💰 PRICE ($)</label>
              <input type="number" step="0.01" placeholder="0.00" value="149.99">
            </div>
            <div class="input-field">
              <label>🎨 COLOR</label>
              <select>
                <option value="Lunar Frost" selected>Lunar Frost</option>
                <option value="Midnight Black">Midnight Black</option>
                <option value="Aurora Green">Aurora Green</option>
                <option value="Solar Flare">Solar Flare Red</option>
                <option value="Deep Ocean">Deep Ocean Blue</option>
                <option value="Neon Purple">Neon Purple</option>
                <option value="Arctic White">Arctic White</option>
                <option value="Carbon Gray">Carbon Gray</option>
                <option value="Sand Dune">Sand Dune</option>
                <option value="Cosmic Pink">Cosmic Pink</option>
              </select>
            </div>
            <div class="input-field">
              <label>📏 SIZE</label>
              <select>
                <option>XS</option>
                <option selected>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
                <option>XXL</option>
              </select>
            </div>
            <div class="input-field">
              <label>📦 QUANTITY AVAILABLE</label>
              <input type="number" value="78" min="0">
            </div>
          </div>
        </form>
      </div>

      <!-- LOWER SIDE: more details of the product (full description + additional) -->
      <div class="more-details-section">
        <div class="details-title">
          ✨ MORE DETAILS
        </div>
        <textarea rows="5" placeholder="Write a comprehensive product description, materials, special features, care instructions, warranty etc...">🚀 NEBULA DRIFT 3.0 – FUTURISTIC ESSENTIALS

• Aerodynamic mesh upper with reactive cooling
• Lightweight carbon-fiber midsole for maximum energy return
• Holographic reflective details for night visibility
• Eco-conscious manufacturing (30% recycled materials)
• 2-year cosmic warranty + AR fitting support
• Available in limited edition colorways</textarea>
        <div class="action-footer">
          <button class="futuristic-btn" type="button">+ ADD PRODUCT ✦</button>
          <a href="products.php">go back</a>
        </div>
        <p style="font-size:0.65rem; margin-top: 0.8rem; text-align: right; color: #2a6e97;">✨ dashboard ready · zero javascript</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>