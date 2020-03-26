<li class={{ (request()->url() == $nav['url']) ? "active" : "" }}>
    <a href="{{ $nav['url'] }}" class="nav-link">{{ $nav['title'] }}</a>
</li>
