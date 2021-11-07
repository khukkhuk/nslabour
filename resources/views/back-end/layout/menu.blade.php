<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">เมนูทั่วไป</li>
        <li>
            <a href="{{url("webpanel")}}" class=" waves-effect">
                <i class="bx bx-home-circle"></i>
                <span>หนัาหลัก</span>
            </a>
        </li>

        <li class="menu-title">เมนูการจัดการ</li>
        @php $menu = \App\Models\Backend\MenuModel::where(['position'=>'main','status'=>'on'])->orderBy('sort','desc')->get(); @endphp
        @php $user_data = \App\Models\Backend\User::find(Auth::guard()->id()); @endphp
        @foreach($menu as $i => $m)

            <?php if(($m->name=="จัดการราคา")&&($user_data->role!="admin")) goto a; ?>
                @php $second = \App\Models\Backend\MenuModel::where('_id',$m->id)->where('status','on')->get(); @endphp
                <li>
                    <a href="@if(count($second) > 0) javascript:void(0); @else webpanel{!!$m->url!!} @endif" class="@if(count($second) > 0) has-arrow @endif  waves-effect">
                        <i class="{!!$m->icon!!}"></i>
                        <span>{{$m->name}}</span>
                    </a>
                    @if(count($second)>0)
                    <ul class="sub-menu" aria-expanded="false">
                        @foreach($second as $i => $s)
                        <li><a href="webpanel{{$s->url}}">{{$s->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif     
                </li>
                <?php a:; ?>
        @endforeach

        <?php if($user_data->role!="admin") goto b; ?>
        <li class="menu-title">เมนูผู้ดูแลระบบ</li>
        <li>
            <a href="{{url("$segment/menu/icon")}}" class=" waves-effect">
                <i class="bx bxs-cube-alt"></i>
                <span>Icon</span>
            </a>
        </li>
        <li>
            <a href="{{url("$segment/menu")}}" class=" waves-effect">
                <i class="bx bx-menu-alt-right"></i>
                <span>รายการเมนู</span>
            </a>
        </li>
        <li>
            <a href="{{url("$segment/user")}}" class=" waves-effect">
                <i class="bx bx-user"></i>
                <span>รายการผู้ใช้งานระบบ</span>
            </a>
        </li>
        <?php b:; ?>
    </ul>

    
</div>
