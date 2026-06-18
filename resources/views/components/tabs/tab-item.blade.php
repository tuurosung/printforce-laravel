@props([
    'isActive' => null,
    'ariaSelected' => null,
    'dataHsTab' => '',
    'id' => null,
    'role' => null,
    'label' => null,
    'icon' => null
])


<button type="button" class="hs-tab-active:bg-white hs-tab-active:text-gray-700 hs-tab-active:dark:bg-gray-800 hs-tab-active:dark:text-gray-400
                                        dark:hs-tab-active:bg-gray-800 py-2 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm text-gray-500
                                        hover:text-gray-700 font-medium rounded-md hover:hover:text-primary disabled:opacity-50 disabled:pointer-events-none
                                        dark:text-gray-400 dark:hover:text-white {{ $ariaSelected ? 'active' : '' }}" id="{{ $id }}"
    data-hs-tab="#{{ $dataHsTab }}" aria-controls="{{ $dataHsTab }}" role="tab" aria-selected="{{ $ariaSelected }}">
    <i class="fi fi-rr-{{ $icon }}"></i>
    {{ $label }}
</button>