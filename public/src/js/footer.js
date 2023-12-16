const siteFooterRight = document.querySelector('.site-footer-right');

// Membuat elemen <a> baru
const newAnchor = document.createElement('a');
newAnchor.href = 'https://elangmerah.com';
newAnchor.textContent = 'Elang Merah Api';

// Mendapatkan elemen <a> yang ada di dalam <li>
const oldAnchor = siteFooterRight.querySelector('a');

// Mengganti elemen <a> yang lama dengan yang baru
siteFooterRight.replaceChild(newAnchor, oldAnchor);