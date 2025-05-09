<x-guest-layout>
    

    <div class="relative min-h-screen flex items-center justify-center text-center overflow-hidden">

        <!-- Background image centered -->
        <div class="absolute inset-0 z-0 flex items-center justify-center">
            <img
                src="{{ asset('assets/images/pt-pupuk-kujang-building.png') }}"
                alt="PT Pupuk Kujang Building"
                class="w-full h-full object-cover"
            />
            <!-- Overlay gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#006838]/10 to-[#006838]/30"></div>
            <!-- Overlay blur + dark -->
            <div class="absolute inset-0 bg-black bg-opacity-80 "></div>
        </div>


        <!-- Content -->
        <main class="relative z-10 px-4">
            <div class="max-w-5xl mx-auto space-y-6 text-white">
            <x-animated-welcome-text />
                <p class="text-xl font-semibold drop-shadow-md">
                    Silakan register sebagai tamu untuk memulai kunjungan Anda.
                </p>

                <div class="flex flex-wrap justify-center gap-6">
                    <a href="/check-in">
                        <button class="bg-[#006838] hover:bg-[#005028] text-white px-6 py-3 rounded-lg transition transform hover:scale-105">
                            Register Tamu
                        </button>
                    </a>
                </div>
            </div>
        </main>
    </div>
</x-guest-layout>
