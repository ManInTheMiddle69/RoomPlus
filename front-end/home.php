<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="/WebSite1/front-end/css/style.css">
    <title>Neo Horizon | Intelligent Interface</title>
    <style>
        /* ----- RESET & BASE ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .home-body {
            background-color: #f2f2f2;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #111111;
            line-height: 1.4;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .home-mainContainer {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0;
            flex-grow: 1;
        }

        /* Split Section Layout */
        .home-splitSection {
            display: flex;
            width: 100%;
            min-height: 100vh;
            align-items: center;
            flex-wrap: wrap;
            background-color: #f2f2f2;
        }

        .home-textCol {
            flex: 0 0 55%;
            padding: 4rem 5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #f2f2f2;
            position: relative;
            z-index: 2;
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
            transition: transform 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        .home-imageCol:hover img {
            transform: scale(1.08);
        }

        /* Typography */
        .home-bigTitle {
            font-size: clamp(3.2rem, 8vw, 5.8rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #0a0a0a 0%, #333333 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .home-description {
            font-size: 1.2rem;
            line-height: 1.5;
            color: #111111;
            max-width: 90%;
            margin-bottom: 1.2rem;
        }

        .home-auraMessage {
            font-size: 0.95rem;
            color: #444444;
            margin-bottom: 1.5rem;
            border-left: 3px solid #111111;
            padding-left: 1rem;
            opacity: 0.85;
        }

        /* Elements & Badges - UPDATED TO BE TRANSPARENT */
        .home-floatingBadge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent; /* Force transparency */
            padding: 0.5rem 0; /* Removed horizontal padding since no background */
            margin-bottom: 1.2rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: #111111;
            animation: home-floatSoft 3s ease-in-out infinite;
            border: none; /* Ensure no border */
        }

        .home-insightStrip {
            display: flex;
            gap: 2rem;
            margin-top: 1.8rem;
            margin-bottom: 2rem;
            border-top: 1px dashed #cccccc;
            padding-top: 1.5rem;
        }

        .home-insightNumber {
            font-size: 1.6rem;
            font-weight: 700;
            display: block;
            color: #000000;
        }

        .home-actionRow {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1.5rem;
        }

        .home-sideNote {
            font-size: 0.95rem;
            text-transform: uppercase;
            background: #e0e0e0;
            color: #111111;
            padding: 0.3rem 0.9rem;
            border-radius: 40px;
            animation: home-gentlePulse 2s infinite alternate;
        }

        .home-futuristicBtn {
            background: transparent;
            border: 1.5px solid #111111;
            padding: 0.9rem 2.2rem;
            font-weight: 600;
            border-radius: 50px;
            color: #111111;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .home-futuristicBtn:hover {
            background: #111111;
            color: #ffffff;
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes home-floatSoft {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-6px); }
        }

        @keyframes home-gentlePulse {
            0% { opacity: 0.7; transform: scale(0.98); }
            100% { opacity: 1; transform: scale(1); }
        }

        @keyframes home-fadeSlideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Staggered Entrance */
        .home-textCol > * { animation: home-fadeSlideUp 0.6s ease forwards; opacity: 0; }
        .home-bigTitle { animation-delay: 0.1s; }
        .home-description { animation-delay: 0.2s; }
        .home-actionRow { animation-delay: 0.4s; }

        @media (max-width: 1000px) {
            .home-splitSection { flex-direction: column; }
            .home-textCol, .home-imageCol { flex: 0 0 100%; width: 100%; height: auto; min-height: 50vh; }
            .home-textCol { padding: 3rem 2rem; }
            .home-splitSection.home-reverse .home-imageCol { order: 0; }
        }
    </style>
</head>
<body class="home-body">

<?php include 'includes/header.html'; ?>

<div class="home-mainContainer">
    <!-- SECTION 01 -->
    <section class="home-splitSection">
        <div class="home-textCol">
            <div class="home-floatingBadge">
                <span>🌿</span> organically intelligent
            </div>
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
                <span class="home-sideNote">✦ limitless potential</span>
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
            <div class="home-floatingBadge">
                <span>⚡</span> cyber flux
            </div>
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
                <span class="home-sideNote">⚡ dynamic core</span>
                <button class="home-futuristicBtn">Launch →</button>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.html'; ?>

</body>
</html>