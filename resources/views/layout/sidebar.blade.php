@if (Auth::user()->isAdministrator())

    @include('layout.sidebars.admin-sidebar')

@elseif (Auth::user()->isReceptionist())

    @include('layout.sidebars.receptionist-sidebar')

@elseif (Auth::user()->isPrintTechnician())

    @include('layout.sidebars.technician-sidebar')

@endif
