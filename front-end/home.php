<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="/WebSite1/front-end/css/style.css">
    <title>Neo Horizon | Intelligent Interface</title>
    <style>
    
</style>
</head>
<body class="home-body">

<?php include 'includes/header.html'; ?>

<div class="home-mainContainer">
    <!-- SECTION 01 -->
    <section class="home-splitSection">
        <div class="home-textCol">
            <h1 class="home-bigTitle">Neo Horizon<br>Intelligence</h1>
            <p class="home-description">
                Where vision meets velocity. Step into a seamless digital ecosystem designed for tomorrow's creators.
            </p>
            <div class="home-auraMessage">
                ✦ harmonic resonance — each pixel breathes with intention.
            </div>
            <div class="home-insightStrip">
                <div class="home-insightItem"><span class="home-insightNumber">0.3s</span> neural response</div>
                <div class="home-insightItem"><span class="home-insightNumber">∞</span> adaptive flow</div>
            </div>
            <div class="home-actionRow">
                <button class="home-futuristicBtn">Explore →</button>
            </div>
        </div>
        <div class="home-imageCol">
            <img src="/WebSite1/front-end/images/trap8.png" alt="Futuristic landscape">
        </div>
    </section>

    <!-- SECTION 02 -->
    <section class="home-splitSection home-reverse">
        <div class="home-imageCol">
            <img src="https://picsum.photos/id/26/900/1200" alt="Serene architecture">
        </div>
        <div class="home-textCol">
            <h2 class="home-bigTitle">Cyber Lumina<br>Interface</h2>
            <p class="home-description">
                Redefining digital frontiers. Built for speed, crafted for emotion.
            </p>
            <div class="home-auraMessage">
                ✦ etherial coherence — visionary storytelling.
            </div>
            <div class="home-insightStrip">
                <div class="home-insightItem"><span class="home-insightNumber">4D</span> sensory matrix</div>
                <div class="home-insightItem"><span class="home-insightNumber">AI</span> synergy core</div>
            </div>
            <div class="home-actionRow">
                <button class="home-futuristicBtn">Launch →</button>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.html'; ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const revealOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const revealOnScroll = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
                observer.unobserve(entry.target);
            }
        });
    }, revealOptions);

    const targets = document.querySelectorAll('.home-textCol > *, .home-imageCol');
    targets.forEach(target => {
        target.style.opacity = "0";
        target.style.transform = "translateY(30px)";
        target.style.transition = "all 0.8s cubic-bezier(0.2, 0.5, 0.3, 1)";
        revealOnScroll.observe(target);
    });

    const imageContainers = document.querySelectorAll('.home-imageCol');
    imageContainers.forEach(container => {
        const img = container.querySelector('img');
        container.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768) { // Only zoom on desktop
                const { left, top, width, height } = container.getBoundingClientRect();
                const x = (e.clientX - left) / width;
                const y = (e.clientY - top) / height;
                img.style.transformOrigin = `${x * 100}% ${y * 100}%`;
                img.style.transform = "scale(1.03)";
            }
        });
        container.addEventListener('mouseleave', () => {
            img.style.transform = "scale(1)";
        });
    });
});
</script>
</body>
</html>