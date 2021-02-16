<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="{{url('/')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
          </li>
          @if(count(generateMenu()) > 0)
          @foreach(generateMenu() as $sl=>$menu)
            <li class="nav-item {{ (isset($menu['subMenu']) && !empty($menu['subMenu']) && count($menu['subMenu']) > 0) ? 'has-treeview' : '' }}">
              
                <a href="{{ (isset($menu['subMenu']) && !empty ($menu['subMenu'])) ? '#': (($menu['route_name'])? Route::has($menu['route_name']) ? Route($menu['route_name']) : '#' :'#') }}" 
                    class="nav-link" >
                    <i class="nav-icon fas {{ $menu['icon'] }}"></i>
                    <span class="menu-title" data-i18n="nav.cards.main">
                      {{ $menu['name'] }}
                      {!! (isset($menu['subMenu']) && !empty($menu['subMenu']) && count($menu['subMenu']) > 0) ? '<i class="fas fa-angle-left right"></i>' : '' !!}
                    </span>
                </a>
                @if(isset($menu['subMenu']) && !empty($menu['subMenu']))
                <ul class="menu-content">
                    @foreach($menu['subMenu'] as $sl=>$sub_menu)
                        @php
                            $explode_route = explode("_",$sub_menu['route_name']);
                            $action_route = $explode_route[count($explode_route)-1];
                        @endphp
                        @if($action_route !='action')
                              <li class ="{{ (Route::current()->getName() == $sub_menu['route_name']) ? 'active' : '' }}" >

                                <a href="{{ ($sub_menu['route_name'])? Route::has($sub_menu['route_name']) ? Route($sub_menu['route_name']) : '#' :'' }}" class="menu-item"><i class="{{$sub_menu['icon'] ?? ''}}"></i>{{$sub_menu['name']}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @endif
            </li>
          @endforeach
         @endif
        </ul>
      </div>
    </div>