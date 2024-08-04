
<li class="menu-header">MAIN MENU</li>
<li class="nav-item {{request()->is('karyawan/dataLaundryMember')? 'active' : ''}}">
    <a href="{{url('karyawan/dataLaundryMember')}}"><i class="fas fa-chess-queen"></i><span>Laundry Member</span></a>
</li>
<li class="nav-item {{request()->is('karyawan/dataLaundryNonMember')? 'active' : ''}}">
    <a href="{{url('karyawan/dataLaundryNonMember')}}"><i class="fas fa-chess-pawn"></i><span>Laundry Non-Member</span></a>
</li>
