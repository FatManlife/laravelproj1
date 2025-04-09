<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-base-200 p-4 text-[1.1rem]">
        <div class="w-[700px] flex flex-col justify-center">
            <!-- Form Title -->
            <h2 class="text-4xl font-bold text-center mb-8">Add Product</h2>

            <!-- Form Card -->
            <div class="card bg-base-100 shadow-2xl">
                <div class="card-body space-y-4 space-x-4">
                    <form action="{{ route('posts.store.action') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        {{-- images --}}
                        <x-images-dropzone />
                        <fieldset class="fieldset space-y-6">
                            <!-- Title -->
                            <div>
                                <label class="fieldset-label text-lg font-medium" for="title">Title</label>
                                <input type="text" id="title" name="title"
                                    class="input input-bordered w-full text-lg" placeholder="Enter product title" />
                                @error('title')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="fieldset-label text-lg font-medium" for="description">Description</label>
                                <textarea id="description" name="description" class="textarea textarea-bordered w-full text-lg" rows="4"
                                    placeholder="Enter product description"></textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label class="fieldset-label text-lg font-medium" for="price">Price</label>
                                <input type="number" id="price" name="price"
                                    class="input input-bordered w-full text-lg" placeholder="Enter price" />
                                @error('price')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-neutral w-full text-lg mt-4">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
