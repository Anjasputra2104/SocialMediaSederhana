<x-app-layout>
    <x-container>

        <div class="flex">
            <div class="w-full lg:w-1/2">
                <x-card>
                    <h1 class="font-semibold text-xl mb-6">Change Password</h1>
                    <form action="{{ route('password.edit') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-5">
                            <x-label for="oldPassword">Old Password</x-label>
                            <x-input class="mt-1 w-full" value="" placeholder="Type Old Password"
                                autocomplete="new-password" type="Password" id="oldPassword" name="oldPassword" />
                            @error('oldPassword')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="password">New password</x-label>
                            <x-input value="{{ old('password') }}" placeholder="Type New Password"
                                class="mt-1 w-full" type="password" id="password" name="password" />
                            @error('password')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="password_confirmation">Confirm password</x-label>
                            <x-input value="{{ old('password_confirmation') }}" placeholder="Confirm New Password"
                                class="mt-1 w-full" type="password" id="password_confirmation"
                                name="password_confirmation" />
                            @error('password_confirmation')
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
