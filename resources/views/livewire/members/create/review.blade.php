<div>
    <h3 class="text-lg font-medium text-gray-900">Review Details</h3>

    <div class="mt-4">
        <p><strong>First Name:</strong> {{ $first_name }}</p>
        <p><strong>Last Name:</strong> {{ $last_name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Phone:</strong> {{ $phone }}</p>
    </div>

    <div class="mt-4">
        <h4 class="font-medium text-gray-800">Shares</h4>
        <ul>
            @foreach($shares as $share)
                @php
                    $product = $share_products->firstWhere('id', $share['product_id']);
                @endphp
                <li>{{ $product->name }}: {{ $share['quantity'] }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        <h4 class="font-medium text-gray-800">Beneficiaries</h4>
        <ul>
            @foreach($beneficiaries as $beneficiary)
                <li>{{ $beneficiary['name'] }} ({{ $beneficiary['allocation'] }}%)</li>
            @endforeach
        </ul>
    </div>
</div>
