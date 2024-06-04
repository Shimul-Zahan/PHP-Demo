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

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-indigo-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/products" class="text-white text-lg font-boldsemibold">Product Management</a>
            <div>
                <a href="/products" class="text-white px-4">Home</a>
                <a href="/products" class="text-white px-4">Products</a>
                <a href="/products/create" class="text-white px-4">Create Product</a>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="bg-indigo-500 text-white text-center py-10">
        <h1 class="text-4xl font-boldbold">Welcome to Product Management</h1>
        <p class="mt-2">Manage your products efficiently and effectively</p>
    </div>

    <!-- Main Content -->
    @if (Session::has('success'))
    <div>
        {{Session::get('success')}}
    </div>
    @endif
    <div class="overflow-x-auto min-h-[58vh]">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right text-start">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Product Image</th>
                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Product Name</th>
                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Product SKU Number</th>
                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Product Price</th>
                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Product Addeded Date</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>

            @if ($products-> isNotEmpty())
            <tbody class="divide-y divide-gray-200 text-center">
                @foreach ($products as $product)
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 bg-gray-100 justify-center items-center flex">
                        @if ($product-> image != null)
                        <img width="50" src="{{ asset('uploads/products/'.$product-> image) }}" alt="">
                        @endif
                    </td>
                    <td class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">{{$product->name}}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 bg-gray-100">{{$product->sku}}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 font-bold">{{$product->price}}$</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 bg-gray-100">
                        {{\Carbon\Carbon::parse($product->created_at)->format('d M, Y')}}
                    </td>
                    <td class="whitespace-nowrap px-4 py-2">
                        <a href="{{route('products.edit', $product->id)}}" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-bold text-white hover:bg-indigo-700">
                            Edit
                        </a>
                        <a href="{{route('products.details', $product->id)}}" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-bold text-white hover:bg-indigo-700">
                            Details
                        </a>
                        <!-- for delete here -->
                        <a href="#" onclick="deleteProduct('{{ $product->id }}')" class=" inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-bold text-white
                                hover:bg-indigo-700">
                            Delete
                        </a>
                        <form id="delete-product-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
    </div>

    <!-- Footer -->
    <footer class="bg-indigo-600 text-white text-center py-4">
        <p>&copy; 2024 Product Management. All rights reserved.</p>
    </footer>

</body>

</html>

<script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            document.getElementById("delete-product-form-" + id).submit();
        }
    }
</script>