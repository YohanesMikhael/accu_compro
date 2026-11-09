import './bootstrap';

import Alpine from 'alpinejs';
import '@fortawesome/fontawesome-free/css/all.min.css';
import * as solidIcons from '@fortawesome/free-solid-svg-icons';

window.Alpine = Alpine;

Alpine.start();

window.fontAwesomeSolidIcons = Object.values(solidIcons)
    .filter(icon => icon && icon.iconName)
    .map(icon => ({
        name: icon.iconName,
        className: `fa-solid fa-${icon.iconName}`,
    }))
    .sort((a, b) => a.name.localeCompare(b.name));