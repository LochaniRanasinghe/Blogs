              
    @extends('components.frontend')
      
    @section('content')
          
              <div class="bg-green-50 border border-gray-300 rounded p-10 max-w-lg mx-auto mt-24 mb-60">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Edit a Post
                        </h2>
                        <p class="mb-4">Post your thoughts here</p>
                    </header>
                    
                    <form method="POST"  action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label
                                for="title"
                                class="inline-block text-lg mb-2"
                                >Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                {{-- when an error occurs, the old input is displayed in the input field --}}
                                value="{{ $post->title }}"
                            />
                            {{-- The {{$message}} syntax is used to display the error message associated with the specific input field --}}
                            @error('title')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="content" class="inline-block text-lg mb-2"
                                >Content</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="content"
                                placeholder="Your content"
                                value="{{ $post->content }}"
                            />
                            @error('content')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        
                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                              Edit
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </div>

    @endsection