<div>
    <h2 class="my-4 font-bold">{{ __('Resep Terkait') }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse ($recipes as $recipe)
            <a href="{{ route('recipes.show', $recipe) }}" class="flex justify-between items-center">
                <div class="flex gap-x-4 items-center">
                    <img src="{{ $recipe->profile_photo_url }}" alt="Image" class="block rounded-full w-20 h-20">
                    <div>
                        <h2 class="text-lg font-bold">{{ $recipe->name }}</h2>
                        <p>{{ $recipe->foodType->name }}</p>
                    </div>
                </div>
                <i class="mdi mdi-chevron-right"></i>
            </a>
        @empty
            <p class="col-span-2">Tidak ada resep terkait</p>
        @endforelse
    </div>
</div>