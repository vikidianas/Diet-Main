<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $category->name }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">
                <h1 class="h-32 bg-cover bg-no-repeat bg-center flex items-end p-6 text-white font-bold text-2xl"
                style="background-image: url({{ $category->profile_photo_url }});">
                    {{ $category->name }}
                </h1>

                <div class="bg-white p-6">
                    <div class="flex justify-end gap-x-4">
                        @can('update', $category)
                        <a href="{{ route('categories.edit', $category) }}">
                            <x-jet-button>
                                Edit
                            </x-jet-button>
                        </a>
                        @endcan
                        
                        @can('create', \App\Models\Recipe::class)
                        <a href="{{ route('categories.recipes.create', $category) }}">
                            <x-jet-button>
                                Tambah Resep
                            </x-jet-button>
                        </a>
                        @endcan

                        @can('delete', $category)    
                        <form method="POST" action="{{ route('categories.destroy', $category) }}">
                            @csrf
                            @method('DELETE')
                            <x-jet-danger-button type="submit">
                                Hapus
                            </x-jet-danger-button>
                        </form>
                        @endcan
                    </div>
    
                    <div class="prose">
                        {{ $category->description }}
                    </div>
    
                    <x-recipes :recipes="$category->recipes" />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
