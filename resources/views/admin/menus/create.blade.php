<x-guest-layout>
    <div class="max-w-md mx-auto">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <h1 class="text-2xl font-bold mb-4">Créer un nouveau menu</h1>

        <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nom du menu -->
            <div>
                <x-input-label for="nom" :value="__('Nom du menu')" />
                <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>

            <!-- Catégorie -->
            <div class="mt-4">
                <x-input-label for="category" :value="__('Catégorie')" />
                <select id="category" name="category" class="block mt-1 w-full" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" rows="6" class="form-textarea mt-1 block w-full" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Prix -->
            <div class="mt-4">
                <x-input-label for="prix" :value="__('Prix')" />
                <x-text-input id="prix" class="block mt-1 w-full" type="number" name="prix" :value="old('prix')" required />
                <x-input-error :messages="$errors->get('prix')" class="mt-2" />
            </div>

            <!-- Image -->
            <div class="mt-4">
                <x-input-label for="image" :value="__('Image')" />
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    Créer le menu
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
