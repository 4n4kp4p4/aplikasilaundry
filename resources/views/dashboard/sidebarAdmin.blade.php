
<li class="menu-header">MAIN MENU</li>
<li class="nav-item {{request()->is('admin/user')? 'active' : ''}}">
    <a href="{{url('admin/user')}}"><i class="fas fa-user"></i><span>Users</span></a>
</li>
<li class="nav-item {{request()->is('admin/pegawai')? 'active' : ''}}">
    <a href="{{url('admin/pegawai')}}"><i class="fas fa-id-card"></i><span>Pegawai</span></a>
</li>
<li class="nav-item {{request()->is('admin/member')? 'active' : ''}}">
    <a href="{{url('admin/member')}}"><i class="fas fa-crown"></i><span>Member</span></a>
</li>
<li class="nav-item {{request()->is('admin/pembelian')? 'active' : ''}}">
    <a href="{{url('admin/pembelian')}}"><i class="fas fa-cart-arrow-down"></i><span>Pembelian</span></a>
</li>
<li class="nav-item {{request()->is('admin/dataLaundryMember')? 'active' : ''}}">
    <a href="{{url('admin/dataLaundryMember')}}"><i class="fas fa-chess-queen"></i><span>Laundry Member</span></a>
</li>
<li class="nav-item {{request()->is('admin/dataLaundryNonMember')? 'active' : ''}}">
    <a href="{{url('admin/dataLaundryNonMember')}}"><i class="fas fa-chess-pawn"></i><span>Laundry Non-Member</span></a>
</li>
<li class="nav-item {{request()->is('admin/barang')? 'active' : ''}}">
    <a href="{{url('admin/barang')}}"><i class="fas fa-toolbox"></i><span>Barang</span></a>
</li>
