import { initFlowbite } from 'flowbite';

import './bootstrap';
import './toast';
import './chart';
import './dashboard';

// Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
//     succeed(({ snapshot, effect }) => {
//         setTimeout(() => {
//             initFlowbite();
//         }, 100); // Adjust the delay as needed
//     })
// })

// Livewire.hook('commit', ({ component, succeed }) => {
//     succeed(({ snapshot }) => {
//         // Adjust this to match your component's name or ID
//         if (component.name === 'verifikasi-data') {
//             setTimeout(() => {
//                 initFlowbite();
//             }, 100); // Adjust delay if needed
//         }
//     });
// });


// Livewire.hook('element.init', ({ el }) => {
//     if (el.hasAttribute('data-modal-toggle')) {
//         const targetId = el.getAttribute('data-modal-toggle');
//         const modalEl = document.getElementById(targetId);

//         if (modalEl && !modalEl.dataset.flowbiteBound) {
//             // Prevent re-initializing the same modal
//             new Modal(modalEl);
//             modalEl.dataset.flowbiteBound = "true";
//         }
//     }
// });


// document.addEventListener('livewire:navigated', () => {
//     initFlowbite();
// });