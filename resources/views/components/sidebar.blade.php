<div class="w-64 h-screen px-4 py-8 overflow-y-auto border-r">
    <h2 class="text-3xl font-semibold text-center text-blue-800">Logo</h2>
    <nav>
      <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        <div class="flex justify-between items-center py-2 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg> {{ __('Dashboard') }}
        </div>
      </x-jet-responsive-nav-link>
    </nav>
    <x-profile.profile-sidebar />
    <x-admin.sidebar />
  </div>
