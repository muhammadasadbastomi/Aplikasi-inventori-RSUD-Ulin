<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text"> Dashboard </span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-notebook menu-icon"></i><span class="nav-text"> Master Data </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('merkIndex')}}" aria-expanded="false">Data Merk</a></li>
                    <li><a href="{{route('satuanIndex')}}" aria-expanded="false">Data Satuan</a></li>
                    <li><a href="{{route('barangIndex')}}" aria-expanded="false">Data Barang</a></li>
                    <li><a href="{{route('unitIndex')}}" aria-expanded="false">Data Unit</a></li>
                    <li><a href="{{route('supplierIndex')}}" aria-expanded="false">Data Suplier</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="icon-user menu-icon"></i><span class="nav-text"> Admin </span>
                </a>
            </li>
        </ul>
    </div>
</div>