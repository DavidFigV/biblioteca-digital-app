@php
    $links = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'href' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'header' => 'Gestión',
        ],
        [
            'name' => 'Roles',
            'icon' => 'fa-solid fa-shield-halved',
            'href' => route('admin.roles.index'),
            'active' => request()->routeIs('admin.roles.*'),
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'href' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
        ],
        [
            'name' => 'Categorías',
            'icon' => 'fa-solid fa-folder-tree',
            'href' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*'),
        ],
        [
            'name' => 'Ebooks',
            'icon' => 'fa-solid fa-book',
            'href' => route('admin.ebooks.index'),
            'active' => request()->routeIs('admin.ebooks.*'),
        ],
    ];
@endphp

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            @foreach($links as $link)
                <li>
                    @isset($link['header'])
                        <div class="px-2 py-2 text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            {{ $link['header'] }}
                        </div>
                    @else
                        <a href="{{ $link['href'] }}" class="flex items-center p-2 transition duration-150 rounded-lg group {{ $link['active'] ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 pl-1.5' : 'text-gray-900 hover:bg-gray-100' }}">
                            <span class="w-6 h-6 inline-flex justify-center items-center {{ $link['active'] ? 'text-blue-600' : 'text-gray-600' }}">
                                <i class="{{ $link['icon'] }}"></i>
                            </span>
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    @endisset
                </li>
            @endforeach
        </ul>
    </div>
</aside>
