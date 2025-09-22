<div>
    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Monthly Contribution</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ $member->monthly_contribution }}</dd>
        </div>
        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Retirement Age</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ $member->retirement_age }}</dd>
        </div>
    </dl>
</div>
