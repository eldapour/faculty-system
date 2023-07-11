<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('/') }}">
            <img src="{{ logo() }}" alt="no logo">
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
                            {{ $category->getTranslation('category_name', app()->getLocale()) }} <span class="icon-nav"><i

                                    class="fa-solid fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if ($category->id == 1)
                                <li><a class="dropdown-item"
                                       href="{{ route('index.presentation') }}">{{  trans('admin.presentations') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                       href="{{ route('dean_speech.index') }}">{{  trans('admin.wordManager') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @elseif($category->id == 6)
                                <li><a class="dropdown-item"
                                       href="{{ route('index.new_blog') }}">{{  trans('admin.ads') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                       href="{{ route('index.event') }}">{{  trans('admin.events') }}</a></li>

                            @elseif($category->id == 7)
                                <li><a class="dropdown-item"
                                       href="{{ route('index.time_uses') }}">{{  trans('admin.Usage schedules') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                            @if($category->id == 8)
                                <li><a class="dropdown-item"
                                       href="{{ route('student.login') }}">{{  trans('admin.Digital Student Platform') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                       href="#">{{  trans('admin.Colleges Digital Platform') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                       href="#">{{  trans('admin.Colleges Digital Magazine') }}</a>
                                </li>
                            @endif
                            @foreach ($category->pages as $page)
                                <li><a class="dropdown-item"

                                       href="{{ route('page', $page->id) }}">{{ $page->getTranslation('title', app()->getLocale()) }}</a>
                                </li>
                                @if (!$loop->last)
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
