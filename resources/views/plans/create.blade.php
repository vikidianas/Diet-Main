<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rencana Mingguan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-normal-form-section :submit="route('plans.store')">
                <x-slot:title>
                    Tambah rencana mingguan
                </x-slot>

                <x-slot:description>
                    Menambahkan rencana mingguan baru
                </x-slot>

                <x-slot:form>
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Nama Rencana') }}" />
                        <x-jet-input id="name" type="text" class="mt-1 block w-full" name="name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                        <!-- Profile Photo File Input -->
                        <input type="file" class="hidden"
                            name="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                        <x-jet-label for="photo" value="{{ __('Foto') }}" />
        
                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                            <span class="block rounded-lg h-32 bg-cover bg-no-repeat bg-center"
                                  x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>
        
                        <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Unggah Foto') }}
                        </x-jet-secondary-button>

                        <x-jet-input-error for="photo" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="description" value="{{ __('Konten rencana') }}" />
                        <x-textarea id="description" class="mt-1 block w-full" name="description" />
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="recipes[]" value="{{ __('Resep') }}" />
                        <div class="prose">
                            <small>
                                Jika resep tidak ditemukan, yuk buat kembali melalui menu <a href="{{ route('categories.index') }}">kategori</a>
                            </small>
                        </div>
                        <x-select id="recipes[]" class="mt-1 block w-full" name="recipes[]" multiple>
                            <x-slot:options>
                                @foreach ($recipes as $recipe)
                                    <option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
                                @endforeach
                            </x-slot>
                        </x-select>
                        <x-jet-input-error for="recipes" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-jet-button>
                        {{ __('Simpan') }}
                    </x-jet-button>
                </x-slot>
            </x-normal-form-section>
        </div>
    </div>
</x-app-layout>
