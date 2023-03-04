<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jenis Makanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-normal-form-section :submit="route('types.store')">
                <x-slot:title>
                    Tambah jenis makanan
                </x-slot>

                <x-slot:description>
                    Menambahkan jenis makanan baru
                </x-slot>

                <x-slot:form>
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Nama Jenis Makanan') }}" />
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

                    <div class="col-span-6 sm:col-span-4" x-data="{
                        foods: []
                    }" x-init="
                    append = () => {
                        foods.push('')
                    }
                    remove = (i) => {
                        foods.splice(i, 1)
                    }
                    ">
                        <span class="flex items-center gap-x-4">
                            <x-jet-label for="description" value="{{ __('Makanan terkait') }}" />
                            <i class="mdi mdi-plus text-green-400 cursor-pointer" @click="append()"></i>
                        </span>
                        <template x-for="(food, i) in foods" :key="i">
                            <div class="flex items-center justify-between gap-4 mb-4">
                                <x-jet-input type="text" class="mt-1 block w-full" name="food[]" />
                                <i class="mdi mdi-trash-can mdi-24px text-red-600 cursor-pointer" @click="remove(i)"></i>
                            </div>
                        </template>
                        <x-jet-input-error for="foods" class="mt-2" />
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
