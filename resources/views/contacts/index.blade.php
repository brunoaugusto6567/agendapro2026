<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Minha Agenda') }}
            </h2>
            <a href="{{ route('contacts.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 transform hover:scale-110 active:scale-95 shadow-lg">
                + Novo Contato
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm animate-bounce">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Grid de Contatos - Responsivo -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($contacts as $contact)
                    <div class="bg-white overflow-hidden shadow-md rounded-xl border border-gray-100 hover:shadow-2xl transition-shadow duration-300 group">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center font-bold text-xl uppercase group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                    {{ substr($contact->name, 0, 1) }}
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-gray-800">{{ $contact->name }}</h3>
                                    <span class="text-xs font-semibold px-2 py-1 bg-gray-100 text-gray-600 rounded-md uppercase tracking-wider">
                                        {{ $contact->type }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <p class="text-gray-600 flex items-center">
                                    <span class="mr-2">📞</span> {{ $contact->phone }}
                                </p>
                                @if($contact->email)
                                <p class="text-gray-600 flex items-center">
                                    <span class="mr-2">✉️</span> {{ $contact->email }}
                                </p>
                                @endif
                            </div>

                            <div class="mt-6 flex justify-end space-x-3 border-t pt-4">
                                <button class="text-blue-500 hover:text-blue-700 transition-transform hover:scale-125">
                                    ✏️
                                </button>
                                <button class="text-red-500 hover:text-red-700 transition-transform hover:scale-125">
                                    🗑️
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 bg-white rounded-xl shadow">
                        <p class="text-gray-500 text-lg">Nenhum contato encontrado. Que tal adicionar o primeiro?</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>