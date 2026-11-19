<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Novo Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 border-t-4 border-indigo-500">

                <!-- Formulário -->
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <!-- Nome -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nome Completo</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-200"
                                   placeholder="Ex: João Silva" required>
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- E-mail -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">E-mail</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       placeholder="joao@email.com">
                            </div>

                            <!-- Telefone -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Telefone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       placeholder="(00) 00000-0000" required>
                            </div>
                        </div>

                        <!-- Tipo de Contato -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Categoria</label>
                            <select name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="Pessoal">Pessoal 🏠</option>
                                <option value="Trabalho">Trabalho 💼</option>
                                <option value="Outros">Outros 📍</option>
                            </select>
                        </div>

                        <!-- Observações -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Observações (Opcional)</label>
                            <textarea name="notes" rows="3"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    <!-- Botões Animados -->
                    <div class="mt-8 flex items-center justify-end space-x-4">
                        <a href="{{ route('contacts.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 active:scale-95">
                            Salvar Contato
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>