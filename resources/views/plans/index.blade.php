<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rencana Mingguan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                {{-- <x-jet-welcome /> --}}
                @can('create', \App\Models\Plan::class)
                    <div class="flex justify-end">
                        <a href="{{ route('plans.create') }}">
                            <x-jet-button>
                                Tambah
                            </x-jet-button>
                        </a>
                    </div>
                @endcan

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 mt-4 gap-8">
                    @forelse ($plans as $plan)
                        <a href="{{ route('plans.show', $plan) }}">
                            <div class="border p-4 text-center rounded-lg flex items-center justify-center bg-cover h-32 text-white" style="background: url('{{ $plan->profile_photo_url }}') no-repeat center;">
                                <h2 class="font-bold text-lg">{{ $plan->name }}</h2>
                            </div>
                        </a>
                    @empty
                        <div class="border p-4 col-span-4 rounded-lg">Tidak ada data rencana mingguan tersedia</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
