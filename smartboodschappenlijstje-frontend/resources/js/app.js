

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const themeToggle = document.querySelector('[data-theme-toggle]');
const themeLabel = document.querySelector('[data-theme-label]');

function updateThemeToggle() {
    const darkMode = document.documentElement.classList.contains('dark');

    themeToggle?.setAttribute('aria-pressed', String(darkMode));

    if (themeLabel) {
        themeLabel.textContent = darkMode ? 'Lichte modus' : 'Donkere modus';
    }
}

themeToggle?.addEventListener('click', () => {
    const darkMode = document.documentElement.classList.toggle('dark');
    localStorage.setItem('smart-groceries-theme', darkMode ? 'dark' : 'light');
    updateThemeToggle();
});

updateThemeToggle();
