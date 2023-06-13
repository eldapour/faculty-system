<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('/') }}">
            @foreach ($university_settings as $university_setting)
                <img src="{{ asset($university_setting->logo) }}" alt="no logo">
            @endforeach
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-white pe-3 ps-3" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('/') }}">{{ trans('admin.home') }}</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $category->category_name[lang()] }} <span class="icon-nav"><i
                                    class="fa-solid fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if ($category->id == 1)
                                <li><a class="dropdown-item" href="{{ route('index.presentation') }}">presentation</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('dean_speech.index') }}">Deans speech</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @elseif($category->id == 6)
                                <li><a class="dropdown-item" href="{{ route('index.new_blog') }}">New Blog</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('index.event') }}">Event</a></li>
                                <li>

                                </li>
                            @elseif($category->id == 7)
                                <li><a class="dropdown-item" href="{{ route('index.time_uses') }}">Time Uses</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif

                            @foreach ($category->pages as $page)
                                <li><a class="dropdown-item"
                                        href="{{ route('page', $page->id) }}">{{ $page->title[lang()] }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endforeach
                        </ul </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
