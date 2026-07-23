@php
    $user = auth()->user();
@endphp

@if ($user->isAdministrator())
    @include('layout.sidebars.admin-sidebar')
@elseif ($user->isReceptionist())
    @include('layout.sidebars.receptionist-sidebar')
@elseif ($user->isPrintTechnician())
    @include('layout.sidebars.technician-sidebar')
@endif


