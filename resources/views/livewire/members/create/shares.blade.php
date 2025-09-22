<div class="card">
    <div class="card-header">
        <h4 class="card-title">Shares Information</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-xl-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="product_{{ $product->id }}" wire:model="selectedProducts" value="{{ $product->id }}">
                                    <label class="form-check-label" for="product_{{ $product->id }}">
                                        {{ $product->name }}
                                    </label>
                                </div>
                                <p class="text-muted">{{ $product->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
