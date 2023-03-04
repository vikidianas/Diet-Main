<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->name }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">
                <h1 class="h-32 bg-cover bg-no-repeat bg-center flex items-end p-6 text-white font-bold text-2xl"
                style="background-image: url({{ $recipe->profile_photo_url }});">
                    {{ $recipe->name }}
                </h1>

                <div class="bg-white p-6">
                    <div class="flex gap-4 justify-end">
                        @can('update', $recipe)
                        <a href="{{ route('recipes.edit', $recipe) }}">
                            <x-jet-button>
                                Edit
                            </x-jet-button>
                        </a>
                        @endcan

                        @can('delete', $recipe)    
                        <form method="POST" action="{{ route('recipes.destroy', $recipe) }}">
                            @csrf
                            @method('DELETE')
                            <x-jet-danger-button type="submit">
                                Hapus
                            </x-jet-danger-button>
                        </form>
                        @endcan
                    </div>
    
                    <div class="prose">
                        {{ $recipe->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
