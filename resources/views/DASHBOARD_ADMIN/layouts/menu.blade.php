



@if (session('level') == 1)
<li class="nav-item">
    <a href="{{ route('product_files.index') }}"
       class="nav-link {{ Request::is('admin/product_files*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>รายชื่อสินค้า - Product Files</p>
    </a>
</li>
@endif

