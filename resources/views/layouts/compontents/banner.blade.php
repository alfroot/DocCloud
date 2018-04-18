<section id="banner">
    <div class="inner">
        <h2>{{ config('app.name', 'Laravel') }}</h2>
        <p>Busca descarga sube </p>
        <ul class="actions">
            @if (Route::has('login'))

                @auth
                    <li><a href="{{ url('/home') }}" class="button big special">Home</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="button big special">Login</a></li>
                @endauth

            @endif

            <li><a href="#elements" class="button big alt">Learn More</a></li>
        </ul>
    </div>
</section>