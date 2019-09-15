<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center"><img
                    src="{{asset('images/admin_icon.png')}}" alt="..." width="62"
                    class="mr-3 rounded-circle img-thumbnail shadow-sm">
            <div class="media-body">
                <h4 class="m-0">{{ Auth::user()->name }}</h4>
                <p class="font-weight-light text-muted mb-0">Administrateur</p>
            </div>
        </div>
    </div>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="{{url('administration/accueil')}}"
               class="nav-link text-dark font-italic <?php echo (Str::contains(url()->current(), 'administration/accueil')) ? 'bg-light' : ''; ?>">
                <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                Accueil
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('administration/questionnaire')}}"
               class="nav-link text-dark font-italic  <?php echo (Str::contains(url()->current(), 'administration/questionnaire')) ? 'bg-light' : ''; ?> ">
                <i class="fa fa-question mr-3 text-primary fa-fw"></i>
                Questionnaire
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('administration/reponses')}}"
               class="nav-link text-dark font-italic <?php echo (Str::contains(url()->current(), 'administration/reponses')) ? 'bg-light' : ''; ?>">
                <i class="fa fa-comment-dots mr-3 text-primary fa-fw"></i>
                Réponses
            </a>
        </li>
    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Profile</p>

    <ul class="nav flex-column bg-white mb-0">
        @if(Auth::check())
            <li>
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="fa fa-sign-out-alt mr-3 text-primary fa-fw"></i>{{ __('Logout') }}
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </ul>
</div>
<!-- End vertical navbar -->