<div>
    <table class="table p-4 mb-0 align-middle table-hover table-shrink">
        <!-- Table head -->
        <thead class="table-light">
            <tr>
                <th scope="col" class="border-0 rounded-start">
                    <a wire:click="sortBy('id')" href="#">#</a>
                </th>
                <th scope="col" class="border-0">
                    <a wire:click="sortBy('property.name')" href="#">Name</a>
                </th>
                <th scope="col" class="border-0">
                    <a wire:click="sortBy('type_of_payment')" href="#">Type</a>
                </th>
                <th scope="col" class="border-0">
                    <a wire:click="sortBy('created_at')" href="#">Date</a>
                </th>
                <th scope="col" class="border-0">
                    <a wire:click="sortBy('status')" href="#">Status</a>
                </th>
                <th scope="col" class="border-0">
                    <a wire:click="sortBy('amount')" href="#">Payment</a>
                </th>
                <th scope="col" class="border-0 rounded-end">
                    Action
                </th>
            </tr>
        </thead>

        <!-- Table body START -->
        <tbody class="border-top-0">
            @foreach($rentPayments as $payment)
            <!-- Table item -->
            <tr>
                <td>
                    <h6 class="mb-0">{{ $payment->id }}</h6>
                </td>
                <td>
                    <h6 class="mb-0">
                        <a href="#">{{ $payment->property->name }}</a>
                    </h6>
                </td>
                <td>{{ $payment->type_of_payment }}</td>
                <td>{{ $payment->created_at->format('M d, Y') }}</td>
                <td>
                    <div class="badge text-bg-success">
                        {{ $payment->status }}
                    </div>
                </td>
                <td>
                    <div class="badge bg-success bg-opacity-10 text-success">
                        {{ $payment->amount }}
                    </div>
                </td>
                <td>
                    <a href="#" class="mb-0 btn btn-sm btn-light">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <!-- Table body END -->
    </table>

    <p class="text-center mb-sm-0 text-sm-start">
        Showing {{ $rentPayments->firstItem() }} to {{ $rentPayments->lastItem() }} of {{ $rentPayments->total() }} entries
    </p>

    <nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
        {{ $rentPayments->links() }}
    </nav>
</div>
