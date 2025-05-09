<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-50 p-4 py-16">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg">
        <div class="text-center p-6 border-b">
        <i class="fa-solid fa-circle-check mx-auto h-16 w-16 text-green-600 mb-4"></i>
            
            <h2 class="text-2xl font-semibold">Pendaftaran Magang Berhasil!</h2>
        </div>

        <div class="text-center p-6">
            <p class="text-gray-600 mb-6">
                Data pendaftaran magang Anda telah berhasil disubmit. Tim kami akan memproses pendaftaran Anda.
            </p>

            <div class="bg-[#006838] border border-[#006838] rounded-lg p-4 mb-6 text-green-100 ">
                <div class="flex items-center justify-center gap-2 mb-4">
                    
                    <h3 class="font-medium text-green-100 text-lg">Status Pendaftaran: Menunggu Persetujuan</h3>
                </div>

                <div class="flex items-center justify-center gap-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-100 -mt-6 -ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M5 8h14M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8" />
                    </svg>
                    <p class="text-sm mb-4 text-green-100 ">
                    Pendaftaran anda sedang dalam proses review oleh departemen terkait. Kami akan mengirimkan email konfirmasi dalam 24 jam kerja.
                </p>
                </div>
                
                <div class="flex items-center justify-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8m-18 8h18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H3a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2z" />
                    </svg>
                    <span class="text-green-100 ">Cek email Anda secara berkala untuk informasi selanjutnya</span>
                </div>
            </div>

            <div class="text-sm text-gray-600 text-left space-y-2">
    <p class="font-medium">Langkah Selanjutnya:</p>
    <ul class="list-disc list-outside pl-5 space-y-1">
        <li>Tim kami akan mereview pendaftaran Anda</li>
        <li>Jika disetujui, Anda akan menerima email konfirmasi dengan detail selanjutnya</li>
        <li>Anda akan diminta untuk mengambil kartu akses magang pada hari pertama</li>
        <li>Kartu akses magang akan aktif selama periode magang yang disetujui</li>
        <li>Orang tua/wali yang akan mengantar-jemput dapat mendaftar sebagai tamu berulang</li>
    </ul>
</div>

        </div>

        <div class="flex flex-col gap-2 p-6 border-t">
            <a href="#" class="w-full inline-flex justify-center items-center px-4 py-2 bg-[#006838] hover:bg-[#004d29] text-white rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 4H8m2-10h4m1 18a9 9 0 1 1 0 -18a9 9 0 0 1 0 18z" />
                </svg>
                Cek Status via Email
            </a>
            <a href="#" class="w-full">
                <button class="w-full border border-gray-300 hover:bg-gray-100 py-2 rounded-md">Daftar Akses untuk Orang Tua/Wali</button>
            </a>
            <a href="#" class="w-full mt-2">
                <button class="w-full text-gray-700 hover:underline py-2">Kembali ke Beranda</button>
            </a>
        </div>
    </div>
</div>

</x-guest-layout>