<x-guest-layout>
    <div class="min-h-screen bg-gray-50 px-4 p-20 py-16">
        <div class="container mx-auto max-w-3xl">

            <a href="{{ route('checkin') }}" class="inline-flex items-center text-[#006838] mb-6 hover:underline">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Beranda
            </a>

            <div class="shadow-lg rounded-lg overflow-hidden bg-white">
                <div class="bg-[#006838] text-white p-6 rounded-t-lg">
                    <h2 class="text-2xl font-semibold">Pendaftaran Magang/PKL</h2>
                    <p class="text-white">Silakan isi data diri Anda untuk mendaftar program magang atau praktik kerja
                        lapangan</p>
                </div>

                <form action="#" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf

                    {{-- Data Diri --}}
                    <div class="bg-[#e6f0e9] p-4 rounded-lg border border-[#a3c4a1] mb-6">
                        <h3 class="font-medium text-lg mb-2">Data Diri Peserta</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            @include('components.input', ['id' => 'name', 'label' => 'Nama Lengkap', 'type' => 'text',
                            'required' => true])
                            @include('components.input', ['id' => 'nik', 'label' => 'NIK / No. Identitas', 'type' =>
                            'text', 'required' => true])
                            @include('components.input', ['id' => 'institution', 'label' => 'Institusi Pendidikan',
                            'type' => 'text', 'required' => true])
                            @include('components.input', ['id' => 'phone', 'label' => 'Nomor Telepon', 'type' => 'tel',
                            'required' => true])
                            @include('components.input', ['id' => 'email', 'label' => 'Email', 'type' => 'email',
                            'required' => true])

                            <div class="space-y-2 col-span-2">
                                <label class="block text-sm font-medium">Foto Diri</label>
                                <div class="border-2 border-dashed border-[#a3c4a1] rounded-lg p-4 text-center">
                                    <i class="fa-solid fa-upload mx-auto h-8 w-8 text-gray-400"></i>

                                    <p class="mt-2 text-xs text-gray-500">Klik untuk mengambil foto atau unggah foto
                                        Anda</p>
                                    <input type="file" name="photo"
                                        class="mt-2 text-xs h-8 w-full border border-gray-300 rounded"
                                        accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Informasi Magang --}}
                    <div class="bg-[#e6f0e9] p-4 rounded-lg border border-[#a3c4a1] mb-6">
                        <h3 class="font-medium text-lg mb-2">Informasi Magang</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="periode" class="block text-sm font-medium">Periode Magang</label>
                                <input type="text" name="periode" id="periode" placeholder="Misal: Juni - Agustus 2025"
                                    class="w-full border border-gray-300 rounded px-3 py-2" required>
                            </div>

                            <div class="space-y-2">
                                <label for="department" class="block text-sm font-medium">Departemen yang Dituju</label>
                                <select name="department" id="department"
                                    class="w-full border border-gray-300 rounded px-3 py-2" required>
                                    <option value="">Pilih departemen</option>
                                    <option value="production">Produksi</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="hrd">HRD</option>
                                    <option value="finance">Keuangan</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="it">IT</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>

                            @include('components.input', ['id' => 'supervisor', 'label' => 'Pembimbing (jika sudah
                            ada)', 'type' => 'text'])

                            <div class="space-y-2 col-span-2">
                                <label class="block text-sm font-medium">Surat Pengantar</label>
                                <div class="border-2 border-dashed border-[#a3c4a1] rounded-lg p-4 text-center">
                                    <i class="fa-solid fa-upload mx-auto h-8 w-8 text-gray-400"></i>
                                    <p class="mt-2 text-xs text-gray-500">Unggah surat pengantar dari institusi
                                        pendidikan</p>
                                    <input type="file" name="recommendation_letter"
                                        class="mt-2 text-xs h-8 w-full border border-gray-300 rounded" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Kontak Darurat --}}
                    <div class="bg-[#e6f0e9] p-4 rounded-lg border border-[#a3c4a1] mb-6">
                        <h3 class="font-medium text-lg mb-2">Kontak Darurat</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            @include('components.input', ['id' => 'emergencyContact', 'label' => 'Nama Kontak Darurat',
                            'type' => 'text', 'required' => true])
                            @include('components.input', ['id' => 'emergencyPhone', 'label' => 'Nomor Telepon Darurat',
                            'type' => 'text', 'required' => true])

                            <div class="space-y-2">
                                <label for="relationship" class="block text-sm font-medium">Hubungan</label>
                                <select name="relationship" id="relationship"
                                    class="w-full border border-gray-300 rounded px-3 py-2" required>
                                    <option value="">Pilih hubungan</option>
                                    <option value="parent">Orang Tua</option>
                                    <option value="sibling">Saudara</option>
                                    <option value="relative">Kerabat</option>
                                    <option value="spouse">Pasangan</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Info Tambahan --}}
                    <div class="space-y-2 mb-6">
                        <label for="additionalInfo" class="block text-sm font-medium">Informasi Tambahan
                            (opsional)</label>
                        <textarea name="additionalInfo" id="additionalInfo"
                            class="w-full border border-gray-300 rounded px-3 py-2 min-h-[80px]"
                            placeholder="Masukkan informasi tambahan jika diperlukan"></textarea>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end gap-4">
                        <a href="{{ url('/') }}"
                            class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-[#006838] text-white rounded hover:bg-[#004d29]">Daftar Magang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
