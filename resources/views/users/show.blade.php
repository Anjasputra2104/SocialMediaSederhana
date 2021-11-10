<x-app-layout>
    <div class="border-b -mt-8 py-8 bg-white">
        <x-container>
            <x-profile :user='$user'></x-profile>
        </x-container>
    </div>
    <div class="border-b mb-3 bg-white">
        <x-container>
            <x-statistic :user='$user'></x-statistic>
        </x-container>
    </div>
    <x-container>
        <div class="grid grid-cols-2 py-2">
            <div class="space-y-5">
                <x-statuses :statuses='$statuses' />
            </div>
        </div>
    </x-container>
</x-app-layout>
