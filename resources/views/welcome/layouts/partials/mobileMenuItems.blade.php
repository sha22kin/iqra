@foreach($items as $item)
    @if($item->subMenus->count() > 0)
    <li class="{{$level==0?'mobile-menu-item ':''}}has-submenu">
        <div class="mobile-menu-link-wrapper">
            <a href="{{asset($item->menuLink())}}" @if($level==0) class="mobile-menu-link" @endif @if($item->target) target="_blank" @endif>
                {{$item->menuName()}}
            </a>
            <button class="submenu-toggle" type="button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
        <ul class="mobile-submenu">
            @include(welcomeTheme().'layouts.partials.mobileMenuItems',['items'=>$item->subMenus,'level'=>$level+1])
        </ul>
    </li>
    @else
    <li @if($level==0) class="mobile-menu-item" @endif>
        <a href="{{asset($item->menuLink())}}" @if($level==0) class="mobile-menu-link" @endif @if($item->target) target="_blank" @endif>
            {{$item->menuName()}}
        </a>
    </li>
    @endif
@endforeach
