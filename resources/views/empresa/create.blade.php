{{--
    @extends('layouts.app')

    @section('content')
        empresa.create template
    @endsection
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ingresar Empresa</h2>
    </x-slot>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li   class="mb-4 rounded-lg bg-red-100 py-5 px-6 text-base text-danger-700">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
        <div
  class="mb-4 rounded-lg bg-danger-100 py-5 px-6 text-base text-danger-700"
  role="alert">
  A simple danger alert—check it out!
</div>
    </div>
@endif
    <div class="md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8">
        <form action="{{route('empresa.store')}}" method="POST">
          @csrf
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <h2 class="font-semibold text-lg text-gray-800 leading-tight">Empresa</h2>
                    <hr class="mt-4">
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Tipo</label>
                    <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" >
                        <option>Frabricante</option>
                        <option>Importador</option>
                        <option>Expendedor</option>
                        <option>Distribuidor</option>
                    </select></div>
                <div class="col-span-6 sm:col-span-4">
                    <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                    <input type="text" name="nombre" id="nombre" autocomplete="nombre" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="cuit" class="form-label inline-block mb-2 text-gray-700">CUIT</label>
                    <input type="text" name="cuit" id="cuit" autocomplete="cuit" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <label for="domicilio_empresa" class="form-label inline-block mb-2 text-gray-700">Domicilio</label>
                    <input type="text" name="domicilio_empresa" id="domicilio_empresa" autocomplete="domicilio_empresa" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="telefono_empresa" class="form-label inline-block mb-2 text-gray-700">Telefono</label>
                    <input type="text" name="telefono_empresa" id="telefono_empresa" autocomplete="telefono_empresa" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <label for="titular" class="form-label inline-block mb-2 text-gray-700">Titular</label>
                    <input type="text" name="titular" id="titular" autocomplete="titular" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="dni_titular" class="form-label inline-block mb-2 text-gray-700">DNI</label>
                    <input type="text" name="dni_titular" id="dni_titular" autocomplete="dni_titular" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <h2 class="font-semibold text-lg text-gray-800 leading-tight">Asesor</h2>
                    <hr class="mt-4">
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                    <input type="text" name="nombre" id="nombre" autocomplete="nombre" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="matricula" class="form-label inline-block mb-2 text-gray-700">Matricula</label>
                    <input type="text" name="matricula" id="matricula" autocomplete="matricula" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <label for="domicilio_asesor" class="form-label inline-block mb-2 text-gray-700">Domicilio</label>
                    <input type="text" name="domicilio_asesor" id="domicilio_asesor" autocomplete="domicilio_asesor" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="telefono_asesor" class="form-label inline-block mb-2 text-gray-700">Telefono</label>
                    <input type="text" name="telefono_asesor" id="telefono_asesor" autocomplete="telefono_asesor" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <label for="dni_asesor" class="form-label inline-block mb-2 text-gray-700">DNI</label>
                    <input type="text" name="dni_asesor" id="dni_asesor" autocomplete="dni_asesor" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-checkbox class="m-3"/>
                    <label for="dni_asesor" class="form-label inline-block mb-2 text-gray-700">Declaracion Jurada</label>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Inscribir</button>
            </div>
          </div>
        </form>
      </div>
</x-app-layout>