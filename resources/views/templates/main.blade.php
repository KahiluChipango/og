<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>{{config('app.name', 'User Managment System')}}</title>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <script src="{{ asset('js/app/js') }}" defer></script>

    </head>
    <body>

    {{--First Navigation Bar--}}
        <nav class="navbar navbar-expand-lg">
           <div class="container">

                <a class="navbar-brand" href="#">{{config('app.name', 'User Managment System')}}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                    <div class="d-flex">
                        @if (Route::has('login'))
                            <div>
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                    <a href="{{ url('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Log out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('login') }}">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>


           </div>
        </nav>

    {{-- Second Navigation Bar--}}
    @can('logged-in')
        <nav class="navbar sub-nav navbar-expand-lg">

                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('super-admin.users.index')}}">Users</a>
                            </li>

                        </ul>
                    </div>
                </div>

        </nav>
    @endcan




         <main class="container">
             @include('parts.alerts')
             @yield('content')
         </main>

    </body>
</html>
