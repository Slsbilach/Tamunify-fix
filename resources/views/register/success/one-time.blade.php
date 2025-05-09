@section('title', 'Pendaftaran Berhasil')

<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 p-4 py-16">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg">
            @if(session('data'))
            @php
            $data = session('data');
            @endphp

            <div class="text-center p-6">
                <i class="fa-solid fa-circle-check mx-auto h-16 w-16 text-green-600 mb-4"></i>

                <h2 class="text-2xl font-semibold">Pendaftaran Berhasil!</h2>
            </div>

            <div class="text-center p-6">
                <p class="text-gray-600 mb-6">
                    Data kunjungan Anda telah terdaftar. QR Code untuk akses telah dikirim ke email Anda.
                </p>

                <div class="bg-white border rounded-lg p-4 mb-6">
                    <div class="flex items-center justify-center mb-4">
                        {{-- Disini QR Code nya --}}
                        {!! $data['qrCode'] !!}
                    </div>
                    <div class="text-sm text-green-700">
                        <p class="font-medium mb-2">Informasi Kunjungan:</p>
                        <div class="flex items-center justify-center gap-2 mb-1">
                            <i class="fa-solid fa-calendar w-4 h-4 text-green-700"></i>
                            <p>{{ $data['visitor']->general->visit_date->format('d-m-Y') }}</p>
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-clock w-4 h-4 text-green-700"></i>
                            <p>{{ $data['visitor']->general->visit_time }}</p>
                        </div>
                    </div>
                </div>

                <div class="text-sm text-gray-600 text-left space-y-2">
                    <p class="font-medium">Petunjuk:</p>
                    <ul class="list-disc list-outside pl-5 space-y-1">
                        <li>Tunjukkan QR Code ini kepada petugas keamanan di gerbang</li>
                        <li>QR Code hanya berlaku untuk satu kali kunjungan pada tanggal yang ditentukan</li>
                        <li>Bawa identitas diri (KTP/SIM) untuk verifikasi</li>
                        <li>Kartu akses magang akan aktif selama periode magang yang disetujui</li>
                        <li>Patuhi semua peraturan keselamatan dan keamanan perusahaan</li>
                    </ul>
                </div>

            </div>

            <div class="flex flex-col gap-2 p-6 border-t">
                <a href="{{ $data['qrCodePath'] }}" download="QR_{{ $data['visitor']->name }}.png"
                    class="w-full inline-flex justify-center items-center px-4 py-2 bg-[#006838] hover:bg-[#004d29] text-white rounded-md">
                    <i class="fa-solid fa-qrcode mr-2 h-4 w-4"></i>
                    Simpan QR Code
                </a>
                <a href="{{ route('home') }}" class="w-full mt-2">
                    <button class="w-full text-gray-700 hover:underline py-2">Kembali ke Beranda</button>
                </a>
            </div>
            @else
            <div class="text-center p-6 border-b">
                <i class="fa-solid fa-circle-check mx-auto h-16 w-16 text-green-600 mb-4"></i>

                <h2 class="text-2xl font-semibold">Uppss Anda Belum Melakukan Pendaftaran!</h2>
            </div>
            <div class="flex flex-col gap-2 p-6 border-t">
                <a href="{{ route('home') }}" class="w-full mt-2">
                    <button class="w-full text-gray-700 hover:underline py-2">Kembali ke Beranda</button>
                </a>
            </div>
            @endif
        </div>
    </div>

</x-guest-layout>