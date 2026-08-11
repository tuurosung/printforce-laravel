import './preline.js';
import '../../node_modules/preline/preline.js';
import './app.init.js';
import './theme.js';

import Swal from 'sweetalert2'



// import "@preline/select";
// HSSelect.autoInit();


import "@preline/datepicker"
import HSDatepicker from "@preline/datepicker"
import HSSelect from '@preline/select';
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.csp.esm.js';
// HSDatepicker.autoInit();


window.Swal = Swal

Livewire.on(
    'notify',
    (
        {
            message,
            type
        }
    ) => swalAlert(message, type)
);

Livewire.on('open-overlay', ({ id }) => {
    window.HSOverlay.open(document.querySelector('#' + id))
})

Livewire.on('close-overlay', ({ id }) => {
    window.HSOverlay.close(document.querySelector('#' + id));
    setTimeout(() => {
        document.querySelectorAll('.hs-overlay-backdrop').forEach(b => b.remove());
        document.documentElement.classList.remove('hs-overlay-body-open');
        document.body.style.removeProperty('overflow');
    }, 200);
});


function swalAlert(message, type) {
    Swal.fire({
        title: type === 'success' ? 'Success!' : "Error",
        text: message,
        icon: type,
        confirmButtonText: 'Okay'
    })
    .then(() => {
        if (type === 'success') {
            window.location.reload()
        }
    })
}
