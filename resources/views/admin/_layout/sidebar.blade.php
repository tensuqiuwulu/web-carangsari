<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.sejarah.index') ? '' : 'collapsed' }}" href="{{ route('admin.sejarah.index') }}">
                <i class="bi bi-grid"></i>
                <span>Sejarah</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.denah.index') ? '' : 'collapsed' }}" href="{{ route('admin.denah.index') }}">
                <i class="bi bi-grid"></i>
                <span>Denah</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.berita.index') ? '' : 'collapsed' }}" href="{{ route('admin.berita.index') }}">
                <i class="bi bi-grid"></i>
                <span>Berita</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.html">
                <i class="bi bi-grid"></i>
                <span>Gallery</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.html">
                <i class="bi bi-grid"></i>
                <span>Peninggalan Kuno</span>
            </a>
        </li>

    </ul>

</aside>