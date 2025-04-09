<x-layout>
    <section class="w-full flex justify-center py-5 px-45">
        <div class="flex justify-center items-center">
            <div class="flex">
                {{-- Carousel --}}
                <div class="flex-1 flex justify-center items-center">
                    <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                        class="w-96 rounded-lg shadow-2xl" />
                </div>
                {{-- Content --}}
                <div class="flex-1">
                    {{-- Utiles --}}
                    <div class="flex justify-end items-center w-full gap-2 mb-2">
                        <a href="{{ route('posts.edit.view', $post->id) }}" class="btn btn-info"><svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil">
                                <path
                                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                <path d="m15 5 4 4" />
                            </svg></a>
                        <form method="POST" action="{{ route('posts.destroy.action', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button href="" type=submit class="btn btn-error"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    <line x1="10" x2="10" y1="11" y2="17" />
                                    <line x1="14" x2="14" y1="11" y2="17" />
                                </svg></button>
                        </form>

                    </div>

                    <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
                    <p class="py-6">
                        {{ $post->description }}
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>
    </section>
</x-layout>
