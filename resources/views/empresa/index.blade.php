{{--
    @extends('layouts.app')

    @section('content')
        empresa.index template
    @endsection
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Listado Empresa</h2>
    </x-slot>
    @if ($errors->any())
    <div class="alert alert-danger md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8">
        <ul>
            @foreach ($errors->all() as $error)
                <li   class="mb-1 rounded-lg bg-red-100 py-5 px-6 text-base text-danger-700">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8 bg-white overflow-hidden shadow-xl sm:rounded-lg sm:px-4">
        <livewire:empresa-table-view />
    </div>
</x-app-layout>