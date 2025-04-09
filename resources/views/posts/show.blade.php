<x-layout>
    <section class="w-full py-8 px-4 md:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="rounded-lg shadow-lg overflow-hidden">
                <!-- Main content container -->
                <div class="md:flex md:space-x-6 p-6">
                    <!-- Carousel Section -->
                    <div class="md:w-1/2">
                        <div class="carousel w-full rounded-lg overflow-hidden shadow-md">
                            @foreach ($post->images as $image)
                                <div id="slide{{ $loop->iteration }}" class="carousel-item relative w-full">
                                    <img src="{{ asset('storage/' . $image->path) }}" class="w-full object-cover" />
                                    <div
                                        class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                        <a href="#slide{{ $loop->iteration != 1 ? $loop->iteration - 1 : $loop->count }}"
                                            class="btn btn-circle bg-opacity-80 hover:bg-opacity-100 shadow-lg p-2 rounded-full">❮</a>
                                        <a href="#slide{{ $loop->iteration != $loop->count ? $loop->iteration + 1 : 1 }}"
                                            class="btn btn-circle bg-opacity-80 hover:bg-opacity-100 shadow-lg p-2 rounded-full">❯</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="md:w-1/2 mt-6 md:mt-0">
                        <!-- Utilities -->
                        <div class="flex justify-end items-center w-full gap-3 mb-4">
                            <a href="{{ route('posts.edit.view', $post->id) }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                    <path d="m15 5 4 4" />
                                </svg>
                                Edit
                            </a>

                            <form method="POST" action="{{ route('posts.destroy.action', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>

                        <!-- Title and Description -->
                        <h1 class="text-3xl font-bold text-gray-300 mb-4">{{ $post->title }}</h1>
                        <div class="overflow-auto max-h-96 pr-2">
                            <p class="text-gray-400 leading-relaxed break-words">
                                {{ $post->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
