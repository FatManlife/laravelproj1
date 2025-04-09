<x-layout>
    <section class="w-full flex justify-center py-5">
        <div class = "grid grid-cols-4 gap-4 w-fit mt-5">
            @foreach ($posts as $post)
                <div class="card bg-base-200 shadow-xl w-96">
                    {{-- Optional image section --}}
                    <div class="p-5">
                        <figure>
                            <img src="{{ asset('storage/' . $post->images[0]->path) }}" alt="Product Image" />
                        </figure>
                    </div>
                    <div class="card-body space-y-3">
                        <a href="{{ route('posts.show.view', $post->id) }}">
                            <h2 class="card-title text-xl font-semibold">
                                {{ strlen($post->title) > 30 ? substr($post->title, 0, 30) . '...' : $post->title }}
                            </h2>
                            <div>
                                <p class="text-base text-gray-600 h-20">
                                    {{ strlen($post->description) > 100 ? substr($post->description, 0, 100) . '...' : $post->description }}
                                </p>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <!-- Price Badge -->
                                <div class="badge badge-outline gap-1 text-sm px-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0
                              1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12
                              12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303
                              0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1
                              1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    {{ number_format((float) $post->price, 2, '.', ',') }}
                                </div>

                                <!-- Views Badge -->
                                <div class="badge badge-outline gap-1 text-sm px-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36
                              4.5 12 4.5c4.638 0 8.573 3.007 9.963
                              7.178.07.207.07.431 0
                              .639C20.577 16.49 16.64 19.5 12 19.5c-4.638
                              0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    {{ $post->views }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
