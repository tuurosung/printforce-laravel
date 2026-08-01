@props([
    'label' => 'Action'
])

 <div class="hs-dropdown relative inline-flex">
     <a href="javascript:void(0)" id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-2 inline-flex items-center gap-x-2">
         <span class="leading-tight">{{ $label }}</span>
         <i class="fi fi-rr-angle-small-down text-base leading-tight font-medium hs-dropdown-open:rotate-180"></i>
</a>
     <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10" aria-labelledby="hs-dropdown-default">

        {{ $menuItems }}

     </div>
 </div>
