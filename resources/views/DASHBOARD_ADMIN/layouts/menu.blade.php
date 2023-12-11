



@if (session('level') == 1)
<li class="nav-item">
    <a href="{{ route('product_files.index') }}"
       class="nav-link {{ Request::is('admin/product_files*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-cog"></i>
        <p>จัดการรายการสินค้า - Product Files</p>
    </a>
</li>
{{-- <li class="nav-item">
    <a href="{{ route('ordersummaryreportbydate.index') }}"
       class="nav-link {{ Request::is('admin/ordersummaryreportbydate*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>รายงานการซื้อประจำวัน</p>
    </a>
</li> --}}
<li class="nav-item">
    <a href="{{ route('summaryreportbyproduct.index') }}"
       class="nav-link {{ Request::is('admin/summaryreportbyproduct*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>รายงานสรุปการซื้อ/ตามสินค้า</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('summaryreportbydate.index') }}"
       class="nav-link {{ Request::is('admin/summaryreportbydate*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>รายงานสรุปการซื้อ/ตามวันที่</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('ordersummaryreportbynumber.index') }}"
       class="nav-link {{ Request::is('admin/ordersummaryreportbynumber*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>รายงานสรุปการซื้อประจำวัน/ตามเลขที่</p>
    </a>
</li>
{{--

<li class="nav-item">
    <a href="{{ route('ordersummaryreportbynumber.index') }}"
       class="nav-link {{ Request::is('admin/purchasesummary*') ? 'active' : '' }}">
       <i class="nav-icon fa fa-desktop"></i>
        <p>ภาพรวมการซื้อประจำวัน</p>
    </a>
</li> --}}
@endif

