<div class="flex justify-between items-center">
    <div class="flex">
        <div class="flex-shrink-none mr-3">
            <img class="rounded-full w-16 h-16 border-2 border-blue-500 p-1" src="{{ $user->gravatar() }}"
                alt="{{ $user->name }}">
        </div>
        <div class="">
            <h1 class="font-semibold mb-3">
                {{ $user->name }}
            </h1>
            <div class="text-sm text-gray-500">
                Joined {{ $user->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
    @if (Auth::User()->isNot($user))
        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
            <div>
                <form action="{{ route('unfollow.store', $user) }}" method="post">
                    @csrf
                    <x-grayButton>
                        Unfollow
                    </x-grayButton>
                </form>
            </div>
        @else
            <div>
                <form action="{{ route('follow.store', $user) }}" method="post">
                    @csrf
                    <x-button>
                        Follow
                    </x-button>
                </form>
            </div>
        @endif
        {{-- <div> --}}
        {{-- <form action="{{ route('following.store', $user) }}" method="post">
                @csrf
                <x-button>
                    @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                        Unfollow
                    @else
                        Follow
                    @endif
                </x-button>
            </form> --}}
        {{-- </div> --}}
    @else
        <a href="{{ route('profile.edit') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl text-sm text-white Capitalize tracking-widest hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear"
                viewBox="0 0 16 16">
                <path
                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                <path
                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
            </svg></a>
    @endif
</div>
