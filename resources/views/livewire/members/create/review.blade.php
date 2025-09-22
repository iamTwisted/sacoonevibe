<div class="card">
    <div class="card-header">
        <h4 class="card-title">Review</h4>
    </div>
    <div class="card-body">
        <div class="p-4 border rounded">
            <h5 class="text-primary">Personal Information</h5>
            <dl class="row mt-3">
                <dt class="col-sm-3">Branch</dt>
                <dd class="col-sm-9">{{ $branch_id ? \App\Models\Branch::find($branch_id)->name : '' }}</dd>

                <dt class="col-sm-3">Member Type</dt>
                <dd class="col-sm-9">{{ $member_type }}</dd>

                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $name }}</dd>

                <dt class="col-sm-3">ID Number</dt>
                <dd class="col-sm-9">{{ $id_number }}</dd>

                <dt class="col-sm-3">Phone</dt>
                <dd class="col-sm-9">{{ $phone }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $email }}</dd>

                <dt class="col-sm-3">Date of Birth</dt>
                <dd class="col-sm-9">{{ $dob }}</dd>

                <dt class="col-sm-3">Gender</dt>
                <dd class="col-sm-9">{{ $gender }}</dd>
            </dl>
        </div>

        <div class="p-4 border rounded mt-4">
            <h5 class="text-primary">Savings</h5>
            <dl class="row mt-3">
                <dt class="col-sm-3">Monthly Contribution</dt>
                <dd class="col-sm-9">{{ $monthly_contribution }}</dd>

                <dt class="col-sm-3">Retirement Age</dt>
                <dd class="col-sm-9">{{ $retirement_age }}</dd>
            </dl>
        </div>

        <div class="p-4 border rounded mt-4">
            <h5 class="text-primary">Shares</h5>
            <ul class="list-group list-group-flush">
                @foreach ($selectedProducts as $productId)
                    <li class="list-group-item">{{ \App\Models\Product::find($productId)->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="p-4 border rounded mt-4">
            <h5 class="text-primary">Beneficiaries</h5>
            @foreach ($beneficiaries as $index => $beneficiary)
                <div class="border-bottom pt-3 mt-3">
                    <h6>Beneficiary {{ $index + 1 }}</h6>
                    <dl class="row mt-3">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $beneficiary['name'] }}</dd>

                        <dt class="col-sm-3">Relationship</dt>
                        <dd class="col-sm-9">{{ $beneficiary['relationship'] }}</dd>

                        <dt class="col-sm-3">Phone</dt>
                        <dd class="col-sm-9">{{ $beneficiary['phone'] }}</dd>

                        <dt class="col-sm-3">ID Number</dt>
                        <dd class="col-sm-9">{{ $beneficiary['id_number'] }}</dd>

                        <dt class="col-sm-3">Allocation (%)</dt>
                        <dd class="col-sm-9">{{ $beneficiary['allocation'] }}</dd>
                    </dl>
                </div>
            @endforeach
        </div>
    </div>
</div>
