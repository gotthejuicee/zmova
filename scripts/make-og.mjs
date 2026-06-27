// Генерує OG-картинку 1200×630 (public/images/og.png) через resvg.
// Запуск: node scripts/make-og.mjs
import { Resvg } from '@resvg/resvg-js';
import { writeFileSync } from 'node:fs';
import sharp from 'sharp';

// resvg не декодить webp → конвертуємо обкладинку в PNG (з альфою), обрізаємо порожні поля
const coverPng = await sharp('public/images/Змова_MockUp5.webp').trim().png().toBuffer();
const coverUri = `data:image/png;base64,${coverPng.toString('base64')}`;

const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630" viewBox="0 0 1200 630">
  <defs>
    <linearGradient id="bg" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0" stop-color="#2a0d08"/>
      <stop offset="1" stop-color="#0a0a0a"/>
    </linearGradient>
    <linearGradient id="gold" x1="0" y1="0" x2="1" y2="0">
      <stop offset="0" stop-color="#fc8375"/>
      <stop offset="0.55" stop-color="#ffd700"/>
      <stop offset="1" stop-color="#fff3b0"/>
    </linearGradient>
    <radialGradient id="glow" cx="0.5" cy="0.5" r="0.5">
      <stop offset="0" stop-color="#ffd700" stop-opacity="0.20"/>
      <stop offset="1" stop-color="#ffd700" stop-opacity="0"/>
    </radialGradient>
  </defs>

  <rect width="1200" height="630" fill="url(#bg)"/>
  <ellipse cx="930" cy="300" rx="430" ry="430" fill="url(#glow)"/>
  <rect x="22" y="22" width="1156" height="586" fill="none" stroke="#ffd700" stroke-opacity="0.35" stroke-width="2" rx="16"/>

  <!-- Обкладинка -->
  <image href="${coverUri}" x="700" y="70" width="460" height="490" preserveAspectRatio="xMidYMid meet"/>

  <!-- Текст -->
  <text x="80" y="150" font-family="Arial" font-weight="bold" font-size="26" letter-spacing="6" fill="#ffd700">РОМАН-ТРИЛЕР</text>
  <text x="74" y="300" font-family="Arial Black" font-size="150" fill="url(#gold)">ЗМОВА</text>
  <text x="80" y="362" font-family="Arial" font-style="italic" font-size="35" fill="#f3f3f3">День, коли зло переможе...</text>
  <text x="80" y="430" font-family="Arial" font-size="25" fill="#cdbf9a">Манана Магомедова  ·  Петро Крижанівський</text>

  <rect x="80" y="468" width="340" height="74" rx="37" fill="url(#gold)"/>
  <text x="250" y="516" font-family="Arial Black" font-size="29" fill="#1a0a0a" text-anchor="middle">ЗАМОВИТИ КНИГУ</text>

  <text x="450" y="517" font-family="Arial" font-weight="bold" font-size="24" fill="#ffd700">zmova.com.ua</text>
</svg>`;

const resvg = new Resvg(svg, {
  fitTo: { mode: 'width', value: 1200 },
  font: {
    loadSystemFonts: false,
    fontFiles: [
      'C:/Windows/Fonts/ariblk.ttf',
      'C:/Windows/Fonts/arialbd.ttf',
      'C:/Windows/Fonts/ariali.ttf',
      'C:/Windows/Fonts/arial.ttf',
    ],
    defaultFontFamily: 'Arial',
  },
  background: '#0a0a0a',
});

const png = resvg.render().asPng();
writeFileSync('public/images/og.png', png);
console.log('OG written:', (png.length / 1024).toFixed(0), 'KB');
