@foreach ($users as $user)
    <x-card>
        <a href="{{ route('profile', $user->username) }}" class="flex items-center">
            <div class="flex-shrink-0 mr-3">
                <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
            </div>
            <div class="">
                <div class="font-semibold">
                    {{ $user->name }}
                </div>
                <div class="text-sm text-gray-500">
                    @if ($user->pivot)
                        {{ $user->pivot->created_at->diffForHumans() }}
                    @endif
                </div>
            </div>
        </a>
    </x-card>
@endforeach
