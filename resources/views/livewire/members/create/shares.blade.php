<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($products as $product)
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="product_{{ $product->id }}" wire:model="selectedProducts" value="{{ $product->id }}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                    <label for="product_{{ $product->id }}" class="font-medium text-gray-700">{{ $product->name }}</label>
                    <p class="text-gray-500">{{ $product->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
