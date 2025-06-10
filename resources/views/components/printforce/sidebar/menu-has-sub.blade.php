<div class="menu-item has-sub {{ $is_active ? 'active' : '' }}" id="">

    <a href="#" class="menu-link">
        @if ($iconType === 'fa')
            <i class="fas fa-{{ $menuIcon }} menu-icon"></i>
        @elseif ($iconType === 'fi')
            <i class="fi fi-rr-{{ $menuIcon }} menu-icon"></i>
        @endif
        <span class="menu-text"> {{ $menuText }} </span>
        <span class="menu-care">
            <b class="caret"></b>
        </span>
    </a>

    <div class="menu-submenu ml-4">
        @foreach ($submenus as $submenu)
            <a href="{{ $submenu['route'] }}" class="menu-link {{ $submenu['route'] === url()->current() ? 'active active-menu-item' : '' }}" id="">
                <span class="menu-text"> {{ $submenu['menuText'] }} </span> </a>
        @endforeach
    </div>
</div>
