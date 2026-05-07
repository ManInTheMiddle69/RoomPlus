<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WebSite1/front-end/css/style.css">
    <title>EDEN ATELIER · radical objects</title>
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