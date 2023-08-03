<nav class="navbar navbar-expand-sm" style="background-color: white;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/favicon/favicon_30px.png') }}" alt="covid-img" width="30" height="24" class="d-inline-block align-text-top">
            COVID-19-API
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            @switch($valueLanguage)
                @case('pt_BR')
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/Brazil_48px.png') }}" alt="" style="width: 24px"> Português
                    </a>
                    @break
                @case('en')
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/USA_48px.png') }}" alt="" style="width: 24px"> English
                    </a>
                    @break

                @default

            @endswitch
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{ route('language.updateLanguage', ['language' => 'pt_BR']) }}">
                    <img src="{{ asset('img/Brazil_48px.png') }}" alt="" style="width: 24px"> Português
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('language.updateLanguage', ['language' => 'en']) }}">
                    <img src="{{ asset('img/USA_48px.png') }}" alt="" style="width: 24px"> English
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
