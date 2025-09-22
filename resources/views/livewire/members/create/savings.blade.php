<div>
    <h3 class="text-lg font-medium text-gray-900">Savings Products</h3>

    @foreach($savings_products as $product)
        <div class="mt-4">
            <label for="savings_{{ $product->id }}" class="block text-sm font-medium text-gray-700">{{ $product->name }}</label>
            <input type="checkbox" wire:model.defer="savings.{{ $product->id }}.selected" id="savings_{{ $product->id }}" class="mt-1 focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
        </div>
    @endforeach
</div>
