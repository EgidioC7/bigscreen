<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center"><img
                src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65"
                class="mr-3 rounded-circle img-thumbnail shadow-sm">
            <div class="media-body">
                <h4 class="m-0">Jason Doe</h4>
                <p class="font-weight-light text-muted mb-0">Web developer</p>
            </div>
        </div>
    </div>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic <?php echo ( Str::contains(url()->current(), 'administration/dashboard') ) ? 'bg-light' : ''; ?>">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('administration/home')}}" class="nav-link text-dark font-italic <?php echo ( Str::contains(url()->current(), 'administration/home') ) ? 'bg-light' : ''; ?>">
                <i class="fa fa-chart-bar mr-3 text-primary fa-fw"></i>
                Accueil
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic ">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Questionnaire
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                Réponses
            </a>
        </li>
    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Profile</p>

    <ul class="nav flex-column bg-white mb-0">
    @if(Auth::check())
                <li>
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
      @endif
    </ul>
</div>
<!-- End vertical navbar -->