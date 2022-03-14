<div class="bg-white shadow">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 sm:block">
            <div id="nav" class="bg-white padding">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
            <a href="{{ url('/carts') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><img style="width: 60px; height: 60px"
                                                                                       src="https://media.istockphoto.com/vectors/shopping-cart-line-icon-fast-buy-vector-logo-vector-id1184670036?k=20&m=1184670036&s=612x612&w=0&h=FpKQukhJ4X8WQkucHPbCqANJROKYB2v3k9ov3x-3vdI="
                                                                                       alt="carts"/></a>
        </div>
    </div>
    @endif

<div id="header">
    <div class="start_menu">
        <div>
            <a href="{{ route('mainpage') }}"><img style=" display: block;margin: 0px auto;"
                                                   src="{{URL::asset('Images/LOGO.png')}}"
                                                   alt="Shop"/></a>
        </div>
    </div>
</div>
<hr/>
<div class="flex-parent jc-center">
    <a class="button" href="{{route('products.women')}}">Women</a>
    <a class="button2" href="{{route('products.men')}}">Men</a>
</div>
<hr/>
</div>

