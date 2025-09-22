<div>
    <h3 class="text-lg font-medium text-gray-900">Share Products</h3>

    @foreach($share_products as $product)
        <div class="mt-4">
            <label for="share_{{ $product->id }}" class="block text-sm font-medium text-gray-700">{{ $product->name }} (Min: {{ $product->minimum_shares ?? 'N/A' }})</label>
            <input type="number" wire:model.defer="shares.{{ $product->id }}.quantity" id="share_{{ $product->id }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <input type="hidden" wire:model.defer="shares.{{ $product->id }}.product_id" value="{{ $product->id }}">
        </div>
    @endforeach
</div>
