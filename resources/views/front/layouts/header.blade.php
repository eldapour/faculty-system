<div class="header p-2">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="link-header">
            @foreach ($university_settings as $university_setting)
                <a class="text-decoration-none" href="{{ $university_setting->facebook_link }}">
                    <i class="fa-brands fa-facebook-f me-3"></i>
                </a>
                <a class="text-decoration-none" href="{{ $university_setting->youtube_link }}">
                    <i class="fa-brands fa-youtube me-3"></i>
                </a>
                <a class="text-decoration-none" href="mailto: {{ $university_setting->email }}">
                    <i class="fa-solid fa-envelope me-3"></i>
                </a>
            @endforeach
        </div>
        <div class="dropdown" style="z-index: 100000;">
            <button class="btn-language" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <i class="fa-solid fa-language"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a hreflang="{{ $localeCode }}" class="dropdown-item btn-language btn-color"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <span dir="{{ $localeCode === 'ar' ? 'rtl' : 'ltr' }}">
                                {{ $properties['native'] }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
