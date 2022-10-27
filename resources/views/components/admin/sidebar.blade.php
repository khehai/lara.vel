<nav>
    @can('user-list')
    <x-jet-responsive-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
      {{ __('Users') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('brand-list')
    <x-jet-responsive-nav-link href="{{ route('admin.brands.index') }}" :active="request()->routeIs('admin.brands.index')">
      {{ __('Brands') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('category-list')
    <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
      {{ __('Categories') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('product-list')
    <x-jet-responsive-nav-link href="{{ route('admin.products.index') }}" :active="request()->routeIs('admin.products.index')">
      {{ __('Products') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('role-list')
    <x-jet-responsive-nav-link href="{{ route('admin.roles.index') }}" :active="request()->routeIs('admin.roles.index')">
      {{ __('Roles') }}
    </x-jet-responsive-nav-link>
    @endcan
  </nav>
    