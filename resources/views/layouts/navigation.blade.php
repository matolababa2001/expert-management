@auth
    @if(Auth::user()->is_admin)
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            Admin Dashboard
        </x-nav-link>
    @endif
@endauth
