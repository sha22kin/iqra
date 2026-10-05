@foreach($items as $item)
    @if($item->subMenus->count() > 0)
    <li class="dropdown-submenu">
        <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{asset($item->menuLink())}}" @if($item->target) target="_blank" @endif>
            {{$item->menuName()}} <i class="fa-solid fa-angle-right ms-2"></i>
        </a>
        <ul class="dropdown-menu">
            @include(welcomeTheme().'layouts.partials.navDropdownItems',['items'=>$item->subMenus])
        </ul>
    </li>
    @else
    <li><a class="dropdown-item" href="{{asset($item->menuLink())}}" @if($item->target) target="_blank" @endif>{{$item->menuName()}}</a></li>
    @endif
@endforeach
