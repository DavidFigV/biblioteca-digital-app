@php
    $items = $breadcrumbs ?: [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => $title ?? ''],
    ];
@endphp

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 text-sm text-gray-600">
        @foreach ($items as $index => $item)
            <li class="inline-flex items-center">
                @if (!empty($item['href']) && $index !== count($items) - 1)
                    <a href="{{ $item['href'] }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                        @if ($index === 0)
                            <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M10.707 2.293a1 1 0 0 0-1.414 0l-7 7a1 1 0 1 0 1.414 1.414L4 10.414V17a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-6.586l.293.293a1 1 0 0 0 1.414-1.414l-7-7Z" />
                            </svg>
                        @endif
                        {{ $item['name'] }}
                    </a>
                @else
                    <span class="inline-flex items-center text-gray-700 font-semibold">
                        {{ $item['name'] }}
                    </span>
                @endif
            </li>
            @if ($index !== count($items) - 1)
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7.293 14.707a1 1 0 0 1 0-1.414L10.586 10 7.293 6.707a1 1 0 1 1 1.414-1.414l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414 0Z" />
                    </path></svg>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
