@extends('components.frontend')

@section('content')
 <div class="mb-60">
        
       
            
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <div class="flex flex-col items-center justify-center text-center">
                <div class="text-lg space-y-6">
                    <a href="{{ route('post.create') }}" class="flex centered-link mr-60 ml-60 bg-black text-white py-2 px-5 ">
                            Post a Blog
                    </a>
                    
                </div>               
            </div>
        </div>
           
                @foreach ($posts as $post)
                    <div class="flex bg-gray-50 border border-gray-200 rounded p-6 ">
                        <img
                            class="hidden w-48 mr-60 ml-60 md:block"
                            src="{{ asset('images/yello.jpg') }}"
                            
                        />
                        <div>
                            <h3 class="text-3xl">
                                <a href="{{ route('post.show',$post->id) }}">{{ $post->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $post->content }}</div>

                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{ $post->created_at }}
                            </div>
                        </div>
                    </div>
                @endforeach       

        
    </div>

@endsection

