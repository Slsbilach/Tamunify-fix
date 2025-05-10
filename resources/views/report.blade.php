@section('title', 'Laporan')
@section('header', 'Laporan')

<x-app-layout>
    <div class="p-6 flex-grow">
        @if (session()->has('success'))
        <x-alert.success :message="session('success')" />
        @endif


    </div>
</x-app-layout>