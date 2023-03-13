<aside class="main-sidebar sidebar-dark-primary">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('images/pharmacy_logo.pngs') }}" alt="Pharmacy Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MTransit</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/default_avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" id="profile">
                    {{-- {{ auth()->user()->fname }} {{ auth()->user()->lname }} --}}
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php 
                    $routes = Route::getRoutes();
                    $group = null;
                @endphp

                @foreach($routes as $route)
                    @if(isset($route->defaults['sidebar']))
                        @if(in_array(Auth::user()->role ?? "", $route->defaults['roles']) || (isset($route->defaults['sped']) && in_array(auth()->user()->id, $route->defaults['sped'])))
                            
                            @if(isset($route->defaults['group']))
                                @if($group != null && $group != $route->defaults['group'])
                                        </ul>
                                    </li>
                                    @php
                                        $group = null;
                                    @endphp
                                @endif
                                @if($group == null && $group != $route->defaults['group'])
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <p>
                                                {{ $route->defaults['group'] }}
                                                @php
                                                    $group = $route->defaults['group'];
                                                @endphp
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        
                                        <ul class="nav nav-treeview">
                                @endif
                            @endif

                            <li class="nav-item">
                                <a class="nav-link {{ request()->path() == $route->uri ? 'active' : '' }}" href="{{ url($route->defaults['href']) }}">
                                    <i class="nav-icon {{ $route->defaults['icon'] }}"></i> 
                                    <p>{{ $route->defaults['name'] }}</p>
                                </a>
                            </li>
                        @endif
                    @endif
                @endforeach

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                
            </ul>
        </nav>
    </div>
</aside>