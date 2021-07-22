<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Description</th>
												<th>Price</th>
												<th>Stock</th>
											</tr>
										</thead>
										<tbody>
											@foreach($products as $p)
											<tr>
												<td>{{ $p->id }}</td>
												<td>{{ $p->name }}</td>
												<td>{{ $p->description }}</td>
												<td>{{ $p->price }}</td>
												<td>{{ $p->stok }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
