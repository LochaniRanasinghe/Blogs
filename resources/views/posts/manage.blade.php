@extends('components.frontend')

@section('content')
<div class="bg-gray-50 border border-gray-300 rounded p-10 mb-40">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Blogs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($posts->isEmpty())
                    @foreach ($posts as $post)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="#">
                                    {{ $post->id }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="#">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="#" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p>You have no gigs yet.</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
@endsection    