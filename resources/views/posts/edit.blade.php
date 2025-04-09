<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-base-200 p-4 text-[1.1rem]">
        <div class="w-[700px] flex flex-col justify-center">
            <!-- Form Title -->
            <h2 class="text-4xl font-bold text-center mb-8">Edit Product</h2>

            <!-- Form Card -->
            <div class="card bg-base-100 shadow-2xl">
                <div class="card-body space-y-4 space-x-4">
                    <form action="{{ route('posts.update.action') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <fieldset class="fieldset space-y-6">
                            <!-- Title -->
                            <div>
                                <label class="fieldset-label text-lg font-medium" for="title">Title</label>
                                <input type="text" id="title" name="title"
                                    class="input input-bordered w-full text-lg" value="{{ $post->title }}" />
                                @error('title')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="fieldset-label text-lg font-medium" for="description">Description</label>
                                <textarea id="description" name="description" class="textarea textarea-bordered w-full text-lg" rows="4">{{ $post->description }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label class="fieldset-label text-lg font-medium" for="price">Price</label>
                                <input type="number" id="price" name="price"
                                    class="input input-bordered w-full text-lg" value="{{ $post->price }}" />
                                @error('price')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <input type="hidden" name="id" value="{{ $post->id }}">

                            <button type="submit" class="btn btn-neutral w-full text-lg mt-4">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
