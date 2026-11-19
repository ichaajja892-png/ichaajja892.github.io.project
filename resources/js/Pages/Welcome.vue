<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Beranda" />

    <div class="page">

        <!-- BACKGROUND -->
        <div class="stars"></div>
        <div class="stars stars-2"></div>

        <div class="glow glow-1"></div>
        <div class="glow glow-2"></div>
        <div class="glow glow-3"></div>

        <!-- NAVBAR -->
        <nav class="navbar">
            <div class="logo">
                <span>✦</span> NEXORA
            </div>

            <div class="nav-links">
                <a href="#beranda">Beranda</a>
                <a href="#fitur">Fitur</a>
                <a href="#tentang">Tentang</a>
            </div>

            <div class="nav-buttons">
                <Link v-if="canLogin" href="/login" class="login">
                    Masuk
                </Link>

                <Link v-if="canRegister" href="/register" class="register">
                    Daftar
                </Link>
            </div>
        </nav>

        <!-- HERO -->
        <section id="beranda" class="hero">

            <div class="hero-content">

                <div class="badge">
                    <span></span>
                    SISTEM DIGITAL MODERN
                </div>

                <h1>
                    Bangun sesuatu
                    <br>
                    <span>yang luar biasa.</span>
                </h1>

                <p>
                    Platform modern berbasis Laravel dan Vue
                    yang dirancang untuk memberikan pengalaman
                    digital yang cepat, elegan, dan nyaman.
                </p>

                <div class="hero-buttons">

                    <Link
                        v-if="canRegister"
                        href="/register"
                        class="primary-button"
                    >
                        Mulai Sekarang
                        <span>→</span>
                    </Link>

                    <Link
                        v-if="canLogin"
                        href="/login"
                        class="secondary-button"
                    >
                        Masuk ke Akun
                    </Link>

                </div>

                <div class="tech">
                    <span>Laravel</span>
                    <i>•</i>
                    <span>Inertia</span>
                    <i>•</i>
                    <span>Vue</span>
                </div>

            </div>

            <!-- ORBIT VISUAL -->
            <div class="hero-visual">

                <div class="orbit orbit-1"></div>
                <div class="orbit orbit-2"></div>
                <div class="orbit orbit-3"></div>

                <div class="planet">
                    <div class="planet-core"></div>
                </div>

                <div class="floating-card card-one">
                    <span>⚡</span>
                    <div>
                        <small>PERFORMA</small>
                        <strong>99.9%</strong>
                    </div>
                </div>

                <div class="floating-card card-two">
                    <span>✦</span>
                    <div>
                        <small>TEKNOLOGI</small>
                        <strong>MODERN</strong>
                    </div>
                </div>

            </div>

        </section>

        <!-- FEATURES -->
        <section id="fitur" class="features">

            <div class="section-title">
                <span>KENAPA MEMILIH KAMI</span>
                <h2>Dibuat untuk pengalaman<br>yang lebih baik.</h2>
            </div>

            <div class="feature-grid">

                <div class="feature">
                    <div class="feature-icon">⚡</div>
                    <h3>Cepat & Responsif</h3>
                    <p>
                        Website dirancang agar tetap nyaman
                        digunakan pada berbagai ukuran layar.
                    </p>
                    <div class="number">01</div>
                </div>

                <div class="feature active">
                    <div class="feature-icon">◈</div>
                    <h3>Desain Modern</h3>
                    <p>
                        Tampilan elegan dengan nuansa gelap
                        dan aksen ungu yang futuristik.
                    </p>
                    <div class="number">02</div>
                </div>

                <div class="feature">
                    <div class="feature-icon">⌘</div>
                    <h3>Teknologi Modern</h3>
                    <p>
                        Menggunakan Laravel, Inertia.js,
                        dan Vue untuk membangun aplikasi.
                    </p>
                    <div class="number">03</div>
                </div>

            </div>

        </section>

        <!-- ABOUT -->
        <section id="tentang" class="about">

            <div class="about-box">

                <div class="about-circle">
                    <span>✦</span>
                </div>

                <div>
                    <span class="mini-title">TENTANG PLATFORM</span>

                    <h2>
                        Sederhana di luar,
                        <span>kuat di dalam.</span>
                    </h2>

                    <p>
                        Aplikasi ini dikembangkan menggunakan
                        ekosistem Laravel dengan Inertia.js dan Vue.
                        Struktur yang terorganisir membuat aplikasi
                        lebih mudah dikembangkan di masa depan.
                    </p>

                    <div class="version">
                        <span>Laravel {{ laravelVersion }}</span>
                        <span>PHP {{ phpVersion }}</span>
                    </div>
                </div>

            </div>

        </section>

        <!-- CTA -->
        <section class="cta">

            <div class="cta-content">
                <span class="mini-title">MULAI PERJALANANMU</span>

                <h2>
                    Siap membuat sesuatu
                    <span>yang berbeda?</span>
                </h2>

                <p>
                    Buat akun sekarang dan mulai menjelajahi
                    platform ini.
                </p>

                <Link
                    v-if="canRegister"
                    href="/register"
                    class="primary-button"
                >
                    Buat Akun Sekarang →
                </Link>
            </div>

        </section>

        <!-- FOOTER -->
        <footer>
            <div class="footer-logo">
                <span>✦</span> NEXORA
            </div>

            <p>
                © 2026 Nexora. Dibangun dengan Laravel & Vue.
            </p>

            <div class="footer-tech">
                Laravel · Inertia · Vue
            </div>
        </footer>

    </div>
</template>

<style scoped>

* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

.page {
    min-height: 100vh;
    background:
        radial-gradient(circle at 50% 10%, #241044 0%, #0d0718 32%, #05030a 75%);
    color: #fff;
    overflow: hidden;
    font-family: Inter, ui-sans-serif, system-ui, sans-serif;
    position: relative;
}

/* STARS */

.stars,
.stars-2 {
    position: fixed;
    inset: 0;
    pointer-events: none;
    background-image:
        radial-gradient(circle, rgba(255,255,255,.8) 1px, transparent 1px);
    background-size: 90px 90px;
    opacity: .22;
    z-index: 0;
}

.stars-2 {
    background-size: 150px 150px;
    opacity: .12;
    transform: rotate(15deg);
}

/* GLOW */

.glow {
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    pointer-events: none;
}

.glow-1 {
    width: 400px;
    height: 400px;
    background: #7c3aed;
    opacity: .16;
    top: 100px;
    left: -150px;
}

.glow-2 {
    width: 350px;
    height: 350px;
    background: #c026d3;
    opacity: .13;
    top: 300px;
    right: -100px;
}

.glow-3 {
    width: 500px;
    height: 300px;
    background: #4c1d95;
    opacity: .15;
    bottom: 0;
    left: 30%;
}

/* NAVBAR */

.navbar {
    width: min(1150px, calc(100% - 40px));
    margin: 25px auto;
    padding: 16px 20px;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;

    position: relative;
    z-index: 20;

    background: rgba(13, 7, 24, .72);
    border: 1px solid rgba(168, 85, 247, .18);
    border-radius: 18px;

    backdrop-filter: blur(20px);
    box-shadow: 0 15px 50px rgba(0,0,0,.25);
}

.logo {
    font-weight: 800;
    letter-spacing: 2px;
    font-size: 18px;
}

.logo span,
.footer-logo span {
    color: #c084fc;
}

.nav-links {
    display: flex;
    gap: 30px;
}

.nav-links a {
    color: #9f98aa;
    text-decoration: none;
    font-size: 14px;
    transition: .3s;
}

.nav-links a:hover {
    color: #d8b4fe;
}

.nav-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
}

.login,
.register {
    text-decoration: none;
    padding: 9px 17px;
    border-radius: 10px;
    font-size: 14px;
}

.login {
    color: #c4b5fd;
}

.register {
    background: #7c3aed;
    color: white;
    box-shadow: 0 8px 25px rgba(124,58,237,.3);
}

/* HERO */

.hero {
    width: min(1150px, calc(100% - 40px));
    min-height: 650px;
    margin: auto;

    display: grid;
    grid-template-columns: 1.05fr .95fr;
    align-items: center;
    gap: 40px;

    position: relative;
    z-index: 2;
}

.hero-content {
    padding: 60px 0;
}

.badge,
.mini-title {
    color: #c084fc;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
}

.badge {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    padding: 9px 14px;
    border-radius: 100px;

    background: rgba(168,85,247,.08);
    border: 1px solid rgba(168,85,247,.18);
}

.badge span {
    width: 7px;
    height: 7px;
    background: #c084fc;
    border-radius: 50%;
    box-shadow: 0 0 12px #c084fc;
}

.hero h1 {
    font-size: clamp(48px, 6vw, 78px);
    line-height: .98;
    letter-spacing: -4px;
    margin: 25px 0;
    font-weight: 850;
}

.hero h1 span {
    background: linear-gradient(90deg, #a78bfa, #e879f9, #c084fc);
    -webkit-background-clip: text;
    color: transparent;
}

.hero p {
    max-width: 560px;
    color: #938b9e;
    line-height: 1.8;
    font-size: 16px;
}

.hero-buttons {
    display: flex;
    gap: 12px;
    margin-top: 35px;
    flex-wrap: wrap;
}

.primary-button,
.secondary-button {
    display: inline-flex;
    align-items: center;
    gap: 12px;

    padding: 14px 22px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: .3s;
}

.primary-button {
    background: linear-gradient(135deg, #7c3aed, #a855f7);
    color: white;
    box-shadow: 0 15px 40px rgba(124,58,237,.25);
}

.primary-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 50px rgba(168,85,247,.35);
}

.secondary-button {
    color: #c4b5fd;
    border: 1px solid rgba(168,85,247,.2);
    background: rgba(255,255,255,.025);
}

.secondary-button:hover {
    background: rgba(168,85,247,.08);
}

.tech {
    display: flex;
    gap: 12px;
    margin-top: 25px;
    color: #57505f;
    font-size: 12px;
}

/* ORBIT */

.hero-visual {
    height: 520px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.planet {
    width: 190px;
    height: 190px;
    border-radius: 50%;
    background:
        radial-gradient(circle at 35% 30%, #d8b4fe, #9333ea 30%, #4c1d95 60%, #17072b 100%);
    box-shadow:
        0 0 40px rgba(168,85,247,.5),
        0 0 100px rgba(124,58,237,.25);

    position: relative;
    z-index: 4;
}

.planet-core {
    position: absolute;
    width: 70px;
    height: 25px;
    border-radius: 50%;
    background: rgba(255,255,255,.12);
    filter: blur(10px);
    top: 45px;
    left: 45px;
}

.orbit {
    position: absolute;
    border: 1px solid rgba(192,132,252,.22);
    border-radius: 50%;
    transform: rotate(-25deg);
}

.orbit-1 {
    width: 310px;
    height: 150px;
}

.orbit-2 {
    width: 410px;
    height: 200px;
}

.orbit-3 {
    width: 510px;
    height: 250px;
}

.floating-card {
    position: absolute;
    z-index: 7;

    display: flex;
    align-items: center;
    gap: 12px;

    padding: 14px 17px;

    background: rgba(20,10,35,.75);
    border: 1px solid rgba(192,132,252,.2);
    border-radius: 15px;

    backdrop-filter: blur(20px);
    box-shadow: 0 15px 40px rgba(0,0,0,.3);
}

.floating-card span {
    font-size: 20px;
    color: #c084fc;
}

.floating-card small {
    display: block;
    color: #777080;
    font-size: 8px;
    letter-spacing: 1px;
}

.floating-card strong {
    font-size: 13px;
}

.card-one {
    top: 70px;
    right: 10px;
}

.card-two {
    bottom: 75px;
    left: 0;
}

/* FEATURES */

.features,
.about,
.cta {
    width: min(1150px, calc(100% - 40px));
    margin: auto;
    position: relative;
    z-index: 2;
}

.features {
    padding: 100px 0;
}

.section-title {
    margin-bottom: 45px;
}

.section-title span {
    color: #a78bfa;
    font-size: 11px;
    letter-spacing: 2px;
    font-weight: 700;
}

.section-title h2 {
    font-size: 40px;
    line-height: 1.15;
    margin-top: 12px;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}

.feature {
    min-height: 280px;
    padding: 30px;
    position: relative;
    overflow: hidden;

    background: rgba(255,255,255,.025);
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 22px;

    transition: .35s;
}

.feature:hover,
.feature.active {
    transform: translateY(-6px);
    border-color: rgba(168,85,247,.35);
    background: rgba(124,58,237,.07);
}

.feature-icon {
    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(168,85,247,.1);
    color: #c084fc;
    border-radius: 14px;
    font-size: 20px;
}

.feature h3 {
    margin-top: 35px;
    font-size: 20px;
}

.feature p {
    color: #777080;
    line-height: 1.7;
    font-size: 14px;
}

.number {
    position: absolute;
    right: 25px;
    bottom: 20px;
    font-size: 45px;
    color: rgba(255,255,255,.035);
    font-weight: 800;
}

/* ABOUT */

.about {
    padding: 60px 0 120px;
}

.about-box {
    display: grid;
    grid-template-columns: 220px 1fr;
    align-items: center;
    gap: 60px;

    padding: 60px;

    background:
        linear-gradient(120deg,
        rgba(124,58,237,.1),
        rgba(255,255,255,.02));

    border: 1px solid rgba(168,85,247,.15);
    border-radius: 30px;
}

.about-circle {
    width: 180px;
    height: 180px;
    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: radial-gradient(circle, #9333ea, #1e0b32);
    box-shadow: 0 0 70px rgba(168,85,247,.25);
    font-size: 50px;
    color: #e9d5ff;
}

.about h2 {
    font-size: 40px;
    line-height: 1.1;
    margin: 15px 0;
}

.about h2 span {
    color: #c084fc;
}

.about p {
    max-width: 700px;
    color: #807888;
    line-height: 1.8;
}

.version {
    display: flex;
    gap: 10px;
    margin-top: 25px;
    flex-wrap: wrap;
}

.version span {
    padding: 7px 12px;
    border: 1px solid rgba(168,85,247,.15);
    border-radius: 8px;
    color: #a78bfa;
    font-size: 11px;
}

/* CTA */

.cta {
    padding: 80px 0 130px;
    text-align: center;
}

.cta-content {
    padding: 80px 30px;
    border-radius: 30px;

    background:
        radial-gradient(circle at center,
        rgba(124,58,237,.15),
        rgba(255,255,255,.015) 60%);

    border: 1px solid rgba(168,85,247,.13);
}

.cta h2 {
    font-size: clamp(35px, 5vw, 55px);
    margin: 15px 0;
}

.cta h2 span {
    display: block;
    color: #c084fc;
}

.cta p {
    color: #777080;
    margin-bottom: 30px;
}

/* FOOTER */

footer {
    width: min(1150px, calc(100% - 40px));
    margin: auto;

    padding: 25px 0 35px;

    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;

    border-top: 1px solid rgba(255,255,255,.07);

    color: #514a57;
    font-size: 12px;
    position: relative;
    z-index: 2;
}

.footer-logo {
    font-weight: 800;
    letter-spacing: 2px;
    color: #aaa1b2;
}

.footer-tech {
    color: #645b6d;
}

/* RESPONSIVE */

@media (max-width: 850px) {

    .nav-links {
        display: none;
    }

    .hero {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .hero-content {
        padding-top: 70px;
    }

    .hero p {
        margin: auto;
    }

    .hero-buttons,
    .tech {
        justify-content: center;
    }

    .hero-visual {
        height: 400px;
    }

    .feature-grid {
        grid-template-columns: 1fr;
    }

    .about-box {
        grid-template-columns: 1fr;
        text-align: center;
        padding: 40px 25px;
    }

    .about-circle {
        margin: auto;
    }

    .version {
        justify-content: center;
    }

    footer {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 500px) {

    .navbar {
        width: calc(100% - 24px);
        margin: 12px auto;
    }

    .nav-buttons .login {
        display: none;
    }

    .hero,
    .features,
    .about,
    .cta {
        width: calc(100% - 28px);
    }

    .hero h1 {
        font-size: 48px;
        letter-spacing: -3px;
    }

    .hero-visual {
        transform: scale(.75);
        margin: -40px 0;
    }

    .section-title h2,
    .about h2 {
        font-size: 32px;
    }
}

</style>