@extends('components.frontend')


@section('content')
            <a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4 mb-40">
                <div class="bg-gray-50 border border-gray-200 rounded p-10">
                    <div class="flex flex-col items-center justify-center text-center">
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{asset('images/yello.jpg')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{ $posts->title }}</h3>
                        <div class="text-xl font-bold mb-4">{{ $posts->created_at }}</div>
                    
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Blog Content
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>{{ $posts->content }}</p>

                                <a
                                    href="#"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Button</a
                                >
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endsection