



@if (session('level') == 1)
<li class="nav-item">
    <a href="{{ route('product_files.index') }}"
       class="nav-link {{ Request::is('admin/product_files*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>รายชื่อสินค้า - Product Files</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('ordersummaryreportbydate.index') }}"
       class="nav-link {{ Request::is('admin/ordersummaryreportbydate*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>รายงานการซื้อประจำวัน</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('purchasesummary.index') }}"
       class="nav-link {{ Request::is('admin/purchasesummary*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>รายงานสรุปการซื้อ</p>
    </a>
</li>
@endif

