<x-app-layout>
    <x-container>

        <div class="flex">
            <div class="w-full lg:w-1/2">
                <x-card>
                    <h1 class="font-semibold text-xl mb-6">Edit Your Profile</h1>
                    <form action="{{ route('profile.update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-5">
                            <x-label for="nama">Nama</x-label>
                            <x-input value="{{ old('name', Auth::user()->name) }}" class="mt-1 w-full" type="text"
                                id="nama" name="name" />
                            @error('name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="username">Username</x-label>
                            <x-input value="{{ old('username', Auth::user()->username) }}" class="mt-1 w-full"
                                type="text" id="username" name="username" />
                            @error('username')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="email">Email</x-label>
                            <x-input value="{{ old('email', Auth::user()->email) }}" class="mt-1 w-full"
                                type="email" id="email" name="email" />
                            @error('email')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <x-button>Update</x-button>
                    </form>
                </x-card>


            </div>
        </div>


    </x-container>

</x-app-layout>
