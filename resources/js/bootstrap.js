import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Pikaday from 'pikaday';
window.Pikaday = Pikaday; 

document.addEventListener('livewire:load', function () {
    // Initialize Pikaday on all elements with class 'pikaday-date'
    document.querySelectorAll('.pikaday-date').forEach(function (element) {
        new Pikaday({
            field: element,
            format: 'DD/MM/YYYY', // Set to dd/mm/yyyy
            yearRange: [1900, new Date().getFullYear() + 10], // Optional: set year range
            onSelect: function (date) {
                // Trigger Livewire update when date is selected
                element.dispatchEvent(new Event('input'));
            }
        });
    });
});

// Re-initialize Pikaday after Livewire updates the DOM
Livewire.hook('element.updated', (el, component) => {
    if (el.classList.contains('pikaday-date')) {
        new Pikaday({
            field: el,
            format: 'DD/MM/YYYY',
            yearRange: [1900, new Date().getFullYear() + 10],
            onSelect: function (date) {
                el.dispatchEvent(new Event('input'));
            }
        });
    }
});

import moment from 'moment';
window.moment = moment; //

import 'livewire-sortable';


import '@wotz/livewire-sortablejs';
