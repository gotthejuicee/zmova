// Генерує брендовий favicon (золота розкрита книга на тёмному фоні) у форматах .svg/.ico/.png.
// Запуск: node scripts/make-favicon.mjs
import { Resvg } from '@resvg/resvg-js';
import sharp from 'sharp';
import { writeFileSync } from 'node:fs';
import pngToIco from 'png-to-ico';

const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
  <defs>
    <linearGradient id="bg" x1="0" y1="0" x2="1" y2="1">
      <stop offset="0" stop-color="#4a0902"/>
      <stop offset="1" stop-color="#0a0a0a"/>
    </linearGradient>
  </defs>
  <rect width="512" height="512" rx="108" fill="url(#bg)"/>
  <rect x="16" y="16" width="480" height="480" rx="92" fill="none" stroke="#ffd700" stroke-opacity="0.55" stroke-width="12"/>
  <path d="M256 170 C214 144 150 142 104 160 L104 374 C150 356 214 358 256 384 C298 358 362 356 408 374 L408 160 C362 142 298 144 256 170 Z" fill="none" stroke="#ffd700" stroke-width="24" stroke-linejoin="round" stroke-linecap="round"/>
  <line x1="256" y1="170" x2="256" y2="384" stroke="#ffd700" stroke-width="24" stroke-linecap="round"/>
  <path d="M150 206 C182 198 214 202 240 214" fill="none" stroke="#ffd700" stroke-opacity="0.45" stroke-width="10" stroke-linecap="round"/>
  <path d="M272 214 C298 202 330 198 362 206" fill="none" stroke="#ffd700" stroke-opacity="0.45" stroke-width="10" stroke-linecap="round"/>
</svg>`;

// SVG-favicon (для сучасних браузерів — чіткий на будь-якому розмірі)
writeFileSync('public/favicon.svg', svg);

// Растеризуємо 512px майстер
const master = new Resvg(svg, {
    fitTo: { mode: 'width', value: 512 },
    font: { fontFiles: ['C:/Windows/Fonts/ariblk.ttf'], loadSystemFonts: false, defaultFontFamily: 'Arial' },
}).render().asPng();

const resize = (size) => sharp(master).resize(size, size).png().toBuffer();

writeFileSync('public/apple-touch-icon.png', await resize(180));
writeFileSync('public/favicon-32.png', await resize(32));

// favicon.ico з кількох розмірів (16/32/48) — класичний fallback для Google/браузерів
const ico = await pngToIco([await resize(16), await resize(32), await resize(48)]);
writeFileSync('public/favicon.ico', ico);

console.log('favicon: .svg + .ico + favicon-32.png + apple-touch-icon.png готові');
