<!-- Mobile Nav Button -->
<div class="flex sm:hidden items-center">
    <button id="mobileNavButton" class="flex-none focus:outline-none">
        <i class="fa-solid fa-bars h-fit"></i>
    </button>
</div>

<!-- Mobile Nav Menu -->
<div id="mobileNavMenu"
    class="fixed inset-0 bg-gray-100 z-50 hidden transition-transform duration-300 transform translate-y-full">
    <div class="flex flex-col h-full">
        <div class="flex justify-between border-b p-5 bg-white">
            <h1 class="font-semibold">Menu Utama</h1>
            <button id="closeMobileNavButton" class=" focus:outline-none">
                <i class="fa-solid fa-times h-fit"></i>
            </button>
        </div>
        <div class="px-5 py-3 grid grid-cols-2 gap-3 bg-white">
            <button class="btn-color-outline py-2 rounded-md text-sm">Masuk</button>
            <button class="btn-color-fill py-2 rounded-md text-sm">Daftar</button>
        </div>
        <div class="mt-3 bg-white flex flex-col gap-3 p-5">
            <a href="#" class="flex gap-3 items-center">
                Beranda
            </a>
            <a href="#" class="flex gap-3 items-center">
                Benefit
            </a>
            <a href="#" class="flex gap-3 items-center">
                Promo
            </a>
            <a href="#" class="flex gap-3 items-center">
                Testimoni
            </a>
        </div>
    </div>
</div>

<script>
    document.getElementById('mobileNavButton').addEventListener('click', function() {
        var mobileNavMenu = document.getElementById('mobileNavMenu');
        if (mobileNavMenu.classList.contains('hidden')) {
            mobileNavMenu.classList.remove('hidden');
            setTimeout(function() {
                mobileNavMenu.classList.remove('translate-y-full');
            }, 10); // A small delay for smooth transition
        } else {
            mobileNavMenu.classList.add('translate-y-full');
            setTimeout(function() {
                mobileNavMenu.classList.add('hidden');
            }, 300); // Match the duration of the transition
        }
    });

    document.getElementById('closeMobileNavButton').addEventListener('click', function() {
        var mobileNavMenu = document.getElementById('mobileNavMenu');
        mobileNavMenu.classList.add('translate-y-full');
        setTimeout(function() {
            mobileNavMenu.classList.add('hidden');
        }, 300); // Match the duration of the transition
    });
</script>
