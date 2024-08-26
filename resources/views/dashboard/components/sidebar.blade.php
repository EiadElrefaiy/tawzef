    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ URL::asset('images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./">H</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Management</h3>
                    <li>
                        <a href="{{ route('edit', ['table' => 'users', 'view' => 'dashboard.sections.profile', 'id' => auth()->user()->id]) }}">My Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'users', 'view' => 'dashboard.sections.admins']) }}">Admins</a>
                    </li>
                    <h3 class="menu-title">Website dashboard</h3>
                    <li>
                        <a href="{{ route('index', ['table' => 'companies', 'view' => 'dashboard.sections.companies']) }}">Companies</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'degree', 'view' => 'dashboard.sections.degree']) }}">Degrees</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'educations', 'view' => 'dashboard.sections.educations']) }}">Educations</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'experiences', 'view' => 'dashboard.sections.experiences']) }}">Experience</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'faculty', 'view' => 'dashboard.sections.faculties']) }}">faculties</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'fields', 'view' => 'dashboard.sections.fields']) }}">Fields</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'graduations', 'view' => 'dashboard.sections.graduations']) }}">Graduations</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'jobs', 'view' => 'dashboard.sections.jobs']) }}">Jobs</a>
                    </li>
                    <li>
                        <a href="{{ route('index', ['table' => 'Job_applications', 'view' => 'dashboard.sections.Job_applications']) }}">Job applications</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
