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

<body class="bg-gray-100 h-screen mx-auto">

    @if (Session::has('success'))
    <div>
        {{Session::get('success')}}
    </div>
    @endif

    <div class="p-8 rounded-lg w-full max-w-7xl mx-auto py-4">
        <h2 class="text-2xl font-bold mb-6 text-center">All Products</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date of Birth</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Role</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Salary</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>

                @if ($products-> isNotEmpty())
                <tbody class="divide-y divide-gray-200">
                    @foreach ($products as $product)
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            @if ($product-> image != null)
                            <img width="50" src="{{ asset('uploads/products/'.$product-> image) }}" alt="">
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$product->name}}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$product->sku}}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$product->price}}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            {{\Carbon\Carbon::parse($product->created_at)->format('d M, Y')}}
                        </td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a href="{{route('products.edit', $product->id)}}" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                Edit
                            </a>
                            <a href="#" onclick="deleteProduct('{{ $product->id }}')" class=" inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white
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

</body>

</html>

<script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            document.getElementById("delete-product-form-" + id).submit();
        }
    }
</script>