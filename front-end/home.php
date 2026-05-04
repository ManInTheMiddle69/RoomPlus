<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="/WebSite1/front-end/css/style.css">
    <title>Neo Horizon | Intelligent Interface</title>
    <style>
        /* ----- RESET & BASE (preserving original structural integrity) ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* NEW THEME: main background #cdd1cd (soft sage-mist) with elegant contrast */
        body {
            background-color: #f2f2f2;
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            color: #111111;
            line-height: 1.4;
        }

        /* container: full width, no margins */
        .container {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0;
        }

        /* split-section: two columns flush edges */
        .split-section {
            display: flex;
            width: 100%;
            min-height: 100vh;
            align-items: center;
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        /* left column (text side) */
        .text-col {
            flex: 0 0 55%;
            padding: 4rem 5rem 4rem 5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #f2f2f2;
            position: relative;
            z-index: 2;
        }

        /* right column (image side) - 35% width, flush */
        .image-col {
            flex: 0 0 45%;
            height: 100vh;
            overflow: hidden;
            position: relative;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
        }

        /* reverse order for second section */
        .split-section.reverse .image-col {
            order: 1;
        }
        .split-section.reverse .text-col {
            order: 2;
        }

        /* images cover perfectly, no gaps, smooth zoom - UPDATED for transparent backgrounds */
        .image-col img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            margin: 0;
            padding: 0;
            transition: transform 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        /* hover effect - image scales up while maintaining transparent background */
        .image-col:hover img {
            transform: scale(1.08);
        }

        /* optional: subtle container effect on hover */
        .image-col {
            transition: all 0.3s ease;
        }

        /* ----- TYPOGRAPHY with theme-adapted gradients ----- */
        .big-title {
            font-size: clamp(3.2rem, 8vw, 5.8rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #1e2a1e 0%, #2a3b2a 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            transition: transform 0.3s ease, text-shadow 0.3s;
        }

        .big-title:hover {
            transform: translateX(4px);
            text-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .description-text {
            font-size: 1.2rem;
            line-height: 1.5;
            color: #1f2a1f;
            max-width: 90%;
            margin-bottom: 1.2rem;
            font-weight: 400;
            letter-spacing: -0.01em;
        }

        /* NEW additional descriptive text block — animated poetic line */
        .aura-message {
            font-size: 0.95rem;
            line-height: 1.5;
            color: #2c3e2c;
            margin-top: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 450;
            letter-spacing: 0.2px;
            border-left: 3px solid #3b4d3b;
            padding-left: 1rem;
            opacity: 0.85;
            transition: all 0.3s;
        }

        .aura-message:hover {
            opacity: 1;
            border-left-color: #1f2a1f;
            transform: translateX(3px);
        }

        /* action row: text left / button right */
        .action-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 1.5rem;
            width: 100%;
            margin-top: 0.5rem;
        }

        .side-note {
            font-size: 0.95rem;
            color: #2c3e2c;
            font-weight: 500;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            background: #b9c0b6;
            padding: 0.3rem 0.9rem;
            border-radius: 40px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .side-note:hover {
            background: #a8b2a5;
            transform: translateX(3px);
            color: #121212;
        }

        /* button — futuristic style adapted to theme, no JS, just CSS interaction */
        .futuristic-btn {
            background: transparent;
            border: 1.5px solid #1a2a1a;
            padding: 0.9rem 2.2rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            letter-spacing: 0.5px;
            background-color: #cdd1cd;
            color: #1e2a1e;
            position: relative;
            overflow: hidden;
            z-index: 1;
            font-family: inherit;
        }

        .futuristic-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: #1f2e1f;
            transition: all 0.4s ease;
            z-index: -1;
            border-radius: 50px;
        }

        .futuristic-btn:hover {
            color: #f2f5f0;
            border-color: #1a2a1a;
            transform: translateY(-3px);
            box-shadow: 0 15px 25px -12px rgba(0, 0, 0, 0.25);
        }

        .futuristic-btn:hover::before {
            width: 100%;
        }

        .futuristic-btn:active {
            transform: translateY(1px);
        }

        /* ----- NEW ANIMATIONS: floating badge, insight items, gentle pulse, shimmer effects ----- */
        @keyframes floatSoft {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-6px); }
            100% { transform: translateY(0px); }
        }

        @keyframes gentlePulse {
            0% { opacity: 0.7; transform: scale(0.98);}
            100% { opacity: 1; transform: scale(1);}
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shimmerBorder {
            0% { background-position: -100% 0; }
            100% { background-position: 200% 0; }
        }

        /* animated badge element (new text) */
        .floating-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(27, 37, 27, 0.12);
            backdrop-filter: blur(4px);
            padding: 0.5rem 1.2rem;
            border-radius: 100px;
            width: fit-content;
            margin-bottom: 1.2rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: #1c2c1c;
            border: 0.5px solid rgba(60, 80, 60, 0.4);
            animation: floatSoft 3s ease-in-out infinite;
            transition: all 0.2s;
        }

        .floating-badge span {
            font-size: 1.2rem;
        }

        .floating-badge:hover {
            background: rgba(30, 50, 30, 0.2);
            transform: scale(1.02);
            animation-play-state: paused;
        }

        /* insight strip with micro-animation on hover */
        .insight-strip {
            display: flex;
            gap: 2rem;
            margin-top: 1.8rem;
            margin-bottom: 0.8rem;
            flex-wrap: wrap;
            border-top: 1px dashed #8f9b8a;
            padding-top: 1.5rem;
        }

        .insight-item {
            display: flex;
            flex-direction: column;
            font-size: 0.85rem;
            font-weight: 500;
            color: #1f2a1f;
            letter-spacing: -0.2px;
            transition: transform 0.2s ease;
        }

        .insight-item .insight-number {
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(135deg, #2a3e2a, #1c2a1c);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .insight-item:hover {
            transform: translateY(-3px);
        }

        /* ----- FADE-IN ANIMATIONS FOR ALL TEXT ELEMENTS (NO JS, PURE CSS) ----- */
        .text-col .big-title {
            animation: fadeSlideUp 0.6s ease forwards;
        }
        .text-col .description-text {
            animation: fadeSlideUp 0.6s ease 0.15s forwards;
            opacity: 0;
        }
        .text-col .aura-message {
            animation: fadeSlideUp 0.6s ease 0.25s forwards;
            opacity: 0;
        }
        .text-col .floating-badge {
            animation: fadeSlideUp 0.5s ease 0.05s forwards;
            opacity: 0;
        }
        .text-col .insight-strip {
            animation: fadeSlideUp 0.6s ease 0.35s forwards;
            opacity: 0;
        }
        .text-col .action-row {
            animation: fadeSlideUp 0.6s ease 0.45s forwards;
            opacity: 0;
        }

        .image-col {
            animation: fadeSlideUp 0.7s ease 0.1s forwards;
            opacity: 0;
        }

        /* second section staggered delays */
        .split-section.reverse .text-col .big-title {
            animation: fadeSlideUp 0.6s ease 0.1s forwards;
        }
        .split-section.reverse .text-col .description-text {
            animation: fadeSlideUp 0.6s ease 0.2s forwards;
        }
        .split-section.reverse .text-col .aura-message {
            animation: fadeSlideUp 0.6s ease 0.3s forwards;
        }
        .split-section.reverse .text-col .insight-strip {
            animation: fadeSlideUp 0.6s ease 0.4s forwards;
        }
        .split-section.reverse .text-col .action-row {
            animation: fadeSlideUp 0.6s ease 0.5s forwards;
        }
        .split-section.reverse .image-col {
            animation: fadeSlideUp 0.7s ease 0.15s forwards;
        }

        /* decorative line that adapts to theme */
        .text-col::before {
            content: '';
            position: absolute;
            left: 2rem;
            width: 2px;
            height: 60px;
            background: #8fa08a;
            top: 15%;
            opacity: 0.45;
        }

        /* add subtle animated gradient text for extra effect on certain spans (CSS only animation) */
        @keyframes textGlow {
            0% { text-shadow: 0 0 0px rgba(30,42,30,0); }
            50% { text-shadow: 0 0 2px rgba(30,42,30,0.3); }
            100% { text-shadow: 0 0 0px rgba(30,42,30,0); }
        }

        .insight-number {
            animation: textGlow 3s infinite ease-in-out;
        }

        /* additional css-only micro interaction: pulsing effect on side-note */
        .side-note {
            animation: gentlePulse 2s infinite alternate;
        }

        .side-note:hover {
            animation: none;
        }

        /* responsive design matching original but preserving theme and new elements */
        @media (max-width: 1000px) {
            .split-section {
                flex-direction: column;
                min-height: auto;
            }
            .text-col,
            .image-col {
                flex: 0 0 100%;
                width: 100%;
                height: auto;
                min-height: 50vh;
            }
            .text-col {
                padding: 3rem 2rem;
            }
            .image-col {
                height: 60vh;
            }
            .split-section.reverse .image-col {
                order: 0;
            }
            .split-section.reverse .text-col {
                order: 1;
            }
            .description-text {
                max-width: 100%;
            }
            .insight-strip {
                justify-content: space-between;
            }
            .text-col::before {
                left: 1.2rem;
                height: 40px;
            }
        }

        @media (max-width: 680px) {
            .action-row {
                flex-direction: column;
                align-items: flex-start;
            }
            .futuristic-btn {
                width: 100%;
                text-align: center;
            }
            .insight-strip {
                gap: 1rem;
            }
            .floating-badge {
                font-size: 0.75rem;
            }
        }

        /* additional decorative enhancement: css-only hover glow for images - removed to keep transparent background clean */
        .image-col {
            position: relative;
        }

        /* ensure all text has appropriate contrast */
        .aura-message i, em {
            font-style: normal;
        }
        body {
            background-color: #cdd1cd;
        }
    </style>
</head>
<body>

<?php include 'includes/header.html'; ?>

<div class="container">

    <!-- FIRST SECTION: enhanced with extra text & animations, no JS, pure CSS -->
    <section class="split-section">
        <div class="text-col">
            <!-- animated floating badge (extra text element) -->
            <div class="floating-badge">
                <span>🌿</span> organically intelligent · zero latency
            </div>
            <h1 class="big-title">Neo Horizon<br>Intelligence</h1>
            <p class="description-text">
                Where vision meets velocity. Step into a seamless digital ecosystem designed for tomorrow's creators. 
                Experience fluid interactions, minimal aesthetics, and powerful storytelling.
            </p>
            <!-- NEW additional poetic text block with theme vibe -->
            <div class="aura-message">
                ✦ harmonic resonance — crafted on #cdd1cd, a canvas of tranquil momentum. Each pixel breathes with intention.
            </div>
            <!-- NEW insight strip (dynamic micro stats / text elements) -->
            <div class="insight-strip">
                <div class="insight-item"><span class="insight-number">0.3s</span> neural response</div>
                <div class="insight-item"><span class="insight-number">∞</span> adaptive flow</div>
                <div class="insight-item"><span class="insight-number">93%</span> immersive recall</div>
            </div>
            <div class="action-row">
                <span class="side-note">✦ limitless potential</span>
                <button class="futuristic-btn" onclick="return false;">Explore →</button>
            </div>
        </div>
        <div class="image-col">
            <img src="/WebSite1/front-end/images/trap8.png" alt="Futuristic organic landscape" loading="lazy">
        </div>
    </section>

    <!-- SECOND SECTION: reverse layout with extra text, consistent theme & animations -->
    <section class="split-section reverse">
        <div class="image-col">
            <img src="https://picsum.photos/id/26/900/1200" alt="Abstract future architecture serene" loading="lazy">
        </div>
        <div class="text-col">
            <!-- badge for second section -->
            <div class="floating-badge">
                <span>⚡</span> cyber flux · seamless morph
            </div>
            <h2 class="big-title">Cyber Lumina<br>Interface</h2>
            <p class="description-text">
                Redefining digital frontiers. Harness the power of minimalist design with high-impact visuals. 
                Built for speed, crafted for emotion — your next chapter begins here.
            </p>
            <!-- additional text element - new poetic line related to theme -->
            <div class="aura-message">
                ✦ etherial coherence — where #cdd1cd meets visionary storytelling. Immerse in silent power.
            </div>
            <!-- secondary insight strip adding textual richness -->
            <div class="insight-strip">
                <div class="insight-item"><span class="insight-number">4D</span> sensory matrix</div>
                <div class="insight-item"><span class="insight-number">AI</span> synergy core</div>
                <div class="insight-item"><span class="insight-number">∞</span> creative horizon</div>
            </div>
            <div class="action-row">
                <span class="side-note">⚡ dynamic core</span>
                <button class="futuristic-btn" onclick="return false;">Launch →</button>
            </div>
        </div>
    </section>

    <!-- subtle decorative extra section to showcase the theme flow, but keeps original two sections intact -->
</div>
<?php include 'includes/footer.html'; ?>

</body>
</html>