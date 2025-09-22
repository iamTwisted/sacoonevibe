<div>
    <ul class="divide-y divide-gray-200">
        @forelse ($member->products as $product)
            <li class="py-4 flex">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">{{ $product->name }}</p>
                    <p class="text-sm text-gray-500">{{ $product->description }}</p>
                </div>
            </li>
        @empty
            <li>No shares found.</li>
        @endforelse
    </ul>
</div>
