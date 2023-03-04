<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                {{-- <x-jet-welcome /> --}}
                @can('create', \App\Models\Category::class)
                    <div class="flex justify-end">
                        <a href="{{ route('categories.create') }}">
                            <x-jet-button>
                                Tambah
                            </x-jet-button>
                        </a>
                    </div>
                @endcan

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 mt-4 gap-8">
                    @forelse ($categories as $category)
                        <a href="{{ route('categories.show', $category) }}">
                            <div class="border p-4 text-center rounded-lg flex items-center justify-center bg-cover h-32 text-white" style="background: url('{{ $category->profile_photo_url }}') no-repeat center;">
                                <h2 class="font-bold text-lg">{{ $category->name }}</h2>
                            </div>
                        </a>
                    @empty
                        <div class="border p-4 col-span-4 rounded-lg">Tidak ada data kategori tersedia</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
