@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'options' => [],
    'selected' => '',
    'attributes' => ''
])
<label for="" class="form-label">{{ $label }}</label>
<select id="hs-search-inside-dropdown" data-hs-select='{
  "hasSearch": true,
  "searchPlaceholder": "Search...",
  "searchClasses": "block w-full sm:text-sm bg-transparent border-gray-200 rounded-lg text-gray-800 placeholder:text-gray-500 focus:border-blue-700 focus:ring-blue-700 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
  "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
  "placeholder": "Select",
  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800\" data-title></span></button>",
  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 text-gray-800 rounded-lg text-start text-sm hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50",
  "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-transparent rounded-lg shadow-xl overflow-hidden overflow-y-auto focus:outline-hidden [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
  "optionClasses": "hs-selected:bg-gray-100 py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
  "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800\" data-title></div></div></div>",
  "extraMarkup": "<div class=\"absolute top-1/2 inset-e-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
}' {{ $attributes->merge(['class'=> 'hidden']) }} wire:ignore.self>

    <option value="">Choose</option>

    @foreach($options ?? [] as $key => $value)
        <option value="{{ $key }}">
            {{ $value }}
        </option>
    @endforeach


</select>
