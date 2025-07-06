window.addEventListener('close-modal', function() {
    const modal = FlowbiteInstances.getInstance('Modal', 'crud-modal');
    modal.hide();
});

window.addEventListener('show-toast', function(event) {
    const toast = document.getElementById('toast-slide');

    if (event.detail.status == 'success') {
        setTimeout(() => {
            document.getElementById('toast-message').textContent = event.detail.message
            document.getElementById('toast-error-logo').classList.replace('inline-flex', 'hidden')
            toast.classList.add('bg-green-200')
        }, 100)
    } else if (event.detail.status == 'fail') {
        setTimeout(() => {
            document.getElementById('toast-message').textContent = event.detail.message
            document.getElementById('toast-success-logo').classList.replace('inline-flex', 'hidden')
            toast.classList.add('bg-red-200')
        }, 100)
    }

    setTimeout(() => {
        toast.classList.replace('-left-full', 'left-5')
    }, 100)

    setTimeout(() => {
        toast.classList.replace('left-5', '-left-full')
    }, 4000)
});