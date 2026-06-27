// Перестискає важкі фонові зображення (вони затемнені/розмиті в дизайні).
// Запуск: node scripts/optimize-images.mjs
import sharp from 'sharp';
import { readFileSync, writeFileSync, statSync } from 'node:fs';

const jobs = [
    { f: 'День2.webp', w: 1920, enc: (s) => s.webp({ quality: 84 }) },
    { f: 'old_lib.webp', w: 1600, enc: (s) => s.webp({ quality: 70 }) },
    { f: 'Royal.jpg', w: 1080, enc: (s) => s.jpeg({ quality: 72, mozjpeg: true }) },
    { f: 'lib3.jpg', w: 900, enc: (s) => s.jpeg({ quality: 74, mozjpeg: true }) },
    { f: 'magaz.avif', w: 1200, enc: (s) => s.avif({ quality: 50 }) },
    { f: 'books-photo.jpg', w: 1600, enc: (s) => s.jpeg({ quality: 74, mozjpeg: true }) },
];

for (const j of jobs) {
    const p = 'public/images/' + j.f;
    const before = statSync(p).size;
    const input = readFileSync(p); // у буфер, щоб sharp не тримав хендл файлу під час запису
    const buf = await j.enc(sharp(input).resize({ width: j.w, withoutEnlargement: true })).toBuffer();
    writeFileSync(p, buf);
    const after = statSync(p).size;
    console.log(j.f.padEnd(20), (before / 1024).toFixed(0) + 'KB -> ' + (after / 1024).toFixed(0) + 'KB');
}
