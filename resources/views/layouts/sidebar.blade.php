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
                    <i class="icon-layers menu-icon"></i><span class="nav-text"> Data Master</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('unitIndex')}}" aria-expanded="false">Data Unit</a></li>
                    <li><a href="{{route('satuanIndex')}}" aria-expanded="false">Data Satuan</a></li>
                    <li><a href="{{route('merkIndex')}}" aria-expanded="false">Data Merk</a></li>
                    <li><a href="{{route('barangIndex')}}" aria-expanded="false">Data Barang</a></li>
                    <li><a href="{{route('supplierIndex')}}" aria-expanded="false">Data Suplier</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-calculator menu-icon"></i><span class="nav-text"> Transaksi </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('pemesananIndex')}}" aria-expanded="false">Pemesanan</a></li>
                    <li><a href="{{route('masukIndex')}}" aria-expanded="false">Barang Masuk</a></li>
                    <li><a href="{{route('keluarIndex')}}" aria-expanded="false">Barang Keluar</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('stokIndex')}}">
                    <i class="icon-briefcase menu-icon"></i><span class="nav-text"> Stok Barang </span>
                </a>
            </li>
            <li>
                <a href="{{route('userIndex')}}">
                    <i class="icon-settings menu-icon"></i><span class="nav-text"> Setting </span>
                </a>
            </li>
        </ul>
    </div>
</div>
