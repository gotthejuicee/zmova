// Генерує брендовий favicon (золота «З» на тёмному фоні) у форматах .svg/.ico/.png.
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
  <text x="256" y="388" font-family="Arial Black" font-size="400" fill="#ffd700" text-anchor="middle">З</text>
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
