<nav class="navigation">
    <div class="navigation__menu" data-id="nav">
        <div class="burger is-close" data-id="close-nav"></div>
        <ul class="mmMenu">
            <li><a href="https://yahsin888.com/#about" class="mmMenu__link" target="_blank">{{ __('user.navigation.1') }}</a></li>
            <li><a class="mmMenu__link" href="#flow" data-js-item="anchor">{{ __('user.navigation.2') }}</a></li>
            <li><a class="mmMenu__link" href="#landing" data-js-item="anchor">{{ __('user.navigation.3') }}</a></li>
            <li><a class="mmMenu__link" href="#faq" data-js-item="anchor">{{ __('user.navigation.4') }}</a></li>
            <li><a href="https://yahsin888.com/#contact" class="mmMenu__link" target="_blank">{{ __('user.navigation.5') }}</a></li>
        </ul>
    </div>
    <div class="navigation__language">
        <div class="fancyWrap fancyWrap--language">
            <select name="language" id="language" class="fancySelect fancySelect--language">
                @foreach(config('lang.languages') as $key => $name)
                    <option
                        value="{{ url()->current() }}?lang={{ $key }}"
                        {{ session()->get('webLanguage') === $key ? 'selected' : '' }}
                    >{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="burger is-default" data-id="open-nav"></div>
</nav>