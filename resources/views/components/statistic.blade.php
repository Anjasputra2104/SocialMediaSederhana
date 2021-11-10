<div class="flex">
    <a href="{{ route('profile', $user->username) }}" class="px-10 py-3 text-center border-r border-l">
        <div class="text-2xl font-semibold mb-1">{{ $user->statuses->count() }}</div>
        <div class="uppercase text-xs text-gray-600">Status</div>
    </a>
    <a href="{{ route('following.index', [$user->username, 'following']) }}" class="px-10 py-3 text-center border-r">
        <div class="text-2xl font-semibold mb-1">{{ $user->follows->count() }}</div>
        <div class="uppercase text-xs text-gray-600">Following</div>
    </a>
    <a href="{{ route('following.index', [$user->username, 'follower']) }}" class="px-10 py-3 text-center border-r">
        <div class="text-2xl font-semibold mb-1">{{ $user->follower->count() }}</div>
        <div class="uppercase text-xs text-gray-600">Follower</div>
    </a>
</div>
