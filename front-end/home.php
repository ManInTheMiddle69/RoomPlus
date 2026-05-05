<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="/WebSite1/front-end/css/style.css">
    <title>Neo Horizon | Intelligent Interface</title>
    <style>
    /* ----- 1. THEME VARIABLES ----- */
    :root {
        --home-bg: #f2f2f2;
        --home-text-main: #111111;
        --home-text-sec: #444444;
        --home-accent-line: #cccccc;
        --home-badge-bg: #e0e0e0;
        --home-title-gradient: linear-gradient(135deg, #0a0a0a 0%, #333333 100%);
        --home-btn-text: #ffffff;
    }

    [data-theme="dark"] {
        --home-bg: #0e0e0e; 
        --home-text-main: #ffffff;
        --home-text-sec: #aaaaaa;
        --home-accent-line: #333333;
        --home-badge-bg: #222222;
        --home-title-gradient: linear-gradient(135deg, #ffffff 0%, #888888 100%);
        --home-btn-text: #0e0e0e;
    }

    /* ----- 2. BASE MODIFICATIONS ----- */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .home-body {
        background-color: var(--home-bg);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        color: var(--home-text-main);
        line-height: 1.4;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        transition: background-color 0.4s ease, color 0.4s ease;
    }

    .home-mainContainer {
        width: 100%;
        max-width: 100%;
        margin: 0;
        padding: 0;
        flex-grow: 1;
    }

    .home-splitSection {
        display: flex;
        width: 100%;
        min-height: 100vh;
        align-items: center;
        flex-wrap: wrap;
        background-color: var(--home-bg);
        transition: background-color 0.4s ease;
    }

    .home-textCol {
        flex: 0 0 55%;
        padding: 4rem 5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: var(--home-bg);
        position: relative;
        z-index: 2;
        transition: background-color 0.4s ease;
    }

    .home-imageCol {
        flex: 0 0 45%;
        height: 100vh;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .home-splitSection.home-reverse .home-imageCol { order: 1; }
    .home-splitSection.home-reverse .home-textCol { order: 2; }

    .home-imageCol img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1), filter 0.4s ease;
    }

    [data-theme="dark"] .home-imageCol img {
        filter: brightness(0.8) contrast(1.1);
    }

    /* ----- 3. TYPOGRAPHY & BUTTONS ----- */
    .home-bigTitle {
        font-size: clamp(2.8rem, 8vw, 5.8rem);
        font-weight: 700;
        letter-spacing: -0.02em;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        background: var(--home-title-gradient);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        transition: background 0.4s ease;
    }

    .home-description {
        font-size: 1.2rem;
        line-height: 1.5;
        color: var(--home-text-main);
        max-width: 90%;
        margin-bottom: 1.2rem;
    }

    .home-auraMessage {
        font-size: 0.95rem;
        color: var(--home-text-sec);
        margin-bottom: 1.5rem;
        border-left: 3px solid var(--home-text-main);
        padding-left: 1rem;
        opacity: 0.85;
    }

    .home-insightStrip {
        display: flex;
        gap: 2rem;
        margin-top: 1.8rem;
        margin-bottom: 2rem;
        border-top: 1px dashed var(--home-accent-line);
        padding-top: 1.5rem;
    }

    .home-insightNumber {
        font-size: 1.6rem;
        font-weight: 700;
        display: block;
        color: var(--home-text-main);
    }

    .home-futuristicBtn {
        background: transparent;
        border: 1.5px solid var(--home-text-main);
        padding: 0.9rem 2.2rem;
        font-weight: 600;
        border-radius: 50px;
        color: var(--home-text-main);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .home-futuristicBtn:hover {
        background: var(--home-text-main);
        color: var(--home-btn-text);
        transform: translateY(-3px);
    }

    /* ---------- 4. SMARTPHONE & TABLET OPTIMIZATION ---------- */
    @media (max-width: 1024px) {
        .home-textCol {
            padding: 4rem 3rem;
        }
    }

    @media (max-width: 768px) {
        .home-splitSection {
            flex-direction: column !important; /* Stack vertically */
            min-height: auto;
        }

        .home-imageCol {
            flex: 0 0 100%;
            width: 100%;
            height: 50vh; /* Shorter image height on mobile */
            order: -1 !important; /* Image always goes above text on mobile */
        }

        .home-textCol {
            flex: 0 0 100%;
            width: 100%;
            padding: 3rem 1.5rem 5rem 1.5rem; /* Reduced horizontal padding */
            text-align: center;
            align-items: center;
        }

        /* Adjust the reverse section to also put image on top */
        .home-splitSection.home-reverse .home-imageCol { order: -1 !important; }
        .home-splitSection.home-reverse .home-textCol { order: 1 !important; }

        .home-description {
            max-width: 100%;
        }

        .home-auraMessage {
            border-left: none;
            border-top: 2px solid var(--home-text-main);
            padding-left: 0;
            padding-top: 1rem;
            display: inline-block;
        }

        .home-insightStrip {
            justify-content: center;
            gap: 1.5rem;
            width: 100%;
        }

        .home-actionRow {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }
    }

    /* Animations */
    @keyframes home-fadeSlideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .home-textCol > * { animation: home-fadeSlideUp 0.6s ease forwards; opacity: 0; }
    .home-bigTitle { animation-delay: 0.1s; }
    .home-description { animation-delay: 0.2s; }
    .home-actionRow { animation-delay: 0.4s; }
    
    html { scroll-behavior: smooth; }
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
        target.style.transition = "all 0.8s cubic-bezier(0.2, 1, 0.3, 1)";
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
                img.style.transform = "scale(1.15)";
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