import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// ---- Import custom UI modules ----

// Theme switching (day/night mode + persistence)
import './theme-switcher';

// Sidebar behaviour
import './sidebar';