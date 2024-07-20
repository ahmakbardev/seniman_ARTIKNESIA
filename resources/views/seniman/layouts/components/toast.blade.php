<div id="toast-container" class="fixed bottom-4 right-4 z-50 flex flex-col gap-2"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showToast = (message, type = 'success', delay = 0) => {
            setTimeout(() => {
                const toastContainer = document.getElementById('toast-container');

                const toast = document.createElement('div');
                toast.className =
                    `transition-all duration-500 transform translate-y-4 opacity-0 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white p-4 rounded shadow-md flex items-center`;

                const icon = document.createElement('i');
                icon.setAttribute('data-feather', type === 'success' ? 'check-circle' :
                    'alert-circle');
                icon.className = 'mr-2';

                const text = document.createElement('span');
                text.innerText = message;

                toast.appendChild(icon);
                toast.appendChild(text);

                toastContainer.appendChild(toast);
                feather.replace();

                setTimeout(() => {
                    toast.classList.remove('translate-y-4', 'opacity-0');
                    toast.classList.add('translate-y-0', 'opacity-100');
                }, 100);

                setTimeout(() => {
                    toast.classList.remove('translate-y-0', 'opacity-100');
                    toast.classList.add('translate-y-4', 'opacity-0');

                    setTimeout(() => {
                        toast.remove();
                    }, 500);
                }, 3000);
            }, delay);
        };

        const showToastsSequentially = (messages, type = 'success') => {
            messages.forEach((message, index) => {
                showToast(message, type, index * 200); // Delay each toast by 2.1 seconds
            });
        };

        @if (session('success'))
            showToast("{{ session('success') }}", 'success');
        @endif

        @if (session('error'))
            showToast("{{ session('error') }}", 'error');
        @endif

        @if ($errors->any())
            const errors = @json($errors->all());
            showToastsSequentially(errors, 'error');
        @endif
    });
</script>
