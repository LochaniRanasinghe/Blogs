<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Posts</title>
</head>
 {{-- Nav bar --}}
    <nav class="flex justify-between items-center mb-4">
            <a href="/">
                <img class="w-24" src="{{asset('images/BlogHub-logo.png')}}" alt="" class="logo"/>
            </a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                {{-- //auth checks whether the user is logged in or not --}}
                <li>
                    <span class="font-bold uppercase">
                        Welcome 
                        {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/posts/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Blogs</a
                    >
                </li>
                {{-- //logout is a post request --}}
                {{-- "inline" class allows the form to be displayed inline with other elements, 
                meaning it will only take up as much width as necessary to accommodate its content. --}}
                <li>
                    <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-sign-out"></i> Logout
                    </button>
                    </form>
                </li>
                {{-- if the user is not logged in, display the following links --}}
                @else
                <li>
                    <a href="{{ route('register') }}" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="{{route('login')}}" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
    </nav>

     {{-- Main content --}}
    <section class="relative h-72 bg-green-500 flex flex-col justify-center align-center text-center space-y-4 mb-4">
        
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('images/laravel-logo.png')"
            ></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                   Blog<span class="text-black">Hub</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Post Your Blogs
                </p>
            </div>
    </section>

    @yield('content')

{{-- Footer --}}
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-green-500 text-white h-24 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    </footer>

    <x-flash />
    
</body>
</html>