<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Simple PHP Crud Operations</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Update Product</h2>
        <form enctype="multipart/form-data" action="{{route('products.update', $product->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Product Name</label>
                <input value="{{ old('name', $product->name) }}" type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="sku" class="block text-gray-700 font-bold mb-2">SKU</label>
                <input value="{{ old('sku', $product->sku) }}" type="text" id="sku" name="sku" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-start leading-tight focus:outline-none focus:shadow-outline" rows="4">
                {{ old('description', $product->description) }}
                </textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                <input value="{{ old('price', $product->price) }}" type="number" id="price" name="price" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image URL</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($product-> image != null)
                <img class="w-[50px]" src="{{ asset('uploads/products/'.$product-> image) }}" alt="">
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Product
                </button>
            </div>
        </form>
    </div>

</body>

</html>