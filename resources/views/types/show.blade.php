<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $type->name }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">
                <h1 class="h-32 bg-cover bg-no-repeat bg-center flex items-end p-6 text-white font-bold text-2xl"
                style="background-image: url({{ $type->profile_photo_url }});">
                    {{ $type->name }}
                </h1>

                <div class="bg-white p-6">
                    <div class="flex gap-4 justify-end">
                        @can('update', $type)
                        <a href="{{ route('types.edit', $type) }}">
                            <x-jet-button>
                                Edit
                            </x-jet-button>
                        </a>
                        @endcan

                        @can('delete', $type)    
                        <form method="POST" action="{{ route('types.destroy', $type) }}">
                            @csrf
                            @method('DELETE')
                            <x-jet-danger-button type="submit">
                                Hapus
                            </x-jet-danger-button>
                        </form>
                        @endcan
                    </div>
    
                    <div class="prose">
                        <ul>
                            @forelse ($type->food as $food)
                                <li>{{ $food->name }}</li>
                            @empty
                                Tidak ada data terkait
                            @endforelse
                        </ul>
                        {{ $type->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
