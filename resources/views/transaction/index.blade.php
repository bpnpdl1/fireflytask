@use(App\Enums\TransactionTypeEnum)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <span class="hidden bg-green-500"></span>
        <span class="hidden bg-red-500"></span>
        <div class="max-w-7xl flex flex-col mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <p class="font-bold text-lg">Transaction Lists</p>
                </div>
               
                <div class="flex gap-2 items-center">
                    <div>
                        <form action="{{ route('transaction.index') }}" method="GET" class="flex items-center gap-2">
                            <select name="type" id="type" class="border border-gray-300 w-32 rounded-md p-2">
                                <option value="">All</option>
                                @foreach (TransactionTypeEnum::cases() as $type)
                                    <option value="{{ $type->value }}" {{ request('type') == $type->value ? 'selected' : '' }}>{{ $type->value }}</option>
                                @endforeach
                            </select>
                            <x-primary-button type="submit">{{ __('Filter') }}</x-primary-button>
                        </form>
                    </div>
                    <x-primary-button  onclick="window.location='{{ route('transaction.create') }}'">
                        {{ __('Add Transaction') }}
                    </x-primary-button>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-200">
                            <tr>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SN</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($transactions as $transaction)
                                <tr class="text-sm">
                                    <td class="px-4 py-2 whitespace-nowrap text-gray-900">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-gray-900">{{ $transaction->description }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-gray-900">{{ $transaction->amount }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-gray-900">
                                        @php
                                            $typeEnum = TransactionTypeEnum::from($transaction->type);
                                        @endphp
                                        <span class="{{ $typeEnum->getBgColor() }} text-white px-2 py-1 rounded text-xs font-semibold">
                                            {{ $transaction->type }} 
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-gray-900">{{ $transaction->transaction_date }}</td>
                                    <td class="px-4 py-2  whitespace-nowrap text-sm font-medium flex flex-col gap-2 sm:flex-row">
                                        <x-primary-button 
                                            onclick="window.location.href='{{ route('transaction.edit', $transaction) }}'" 
                                            class="text-blue-600 hover:text-blue-900 w-full sm:w-auto">
                                            {{ __('Edit') }}
                                        </x-primary-button>
                
                                        <x-danger-button 
                                            onclick="deleteTransaction({{ $transaction->id }})" 
                                            class="w-full sm:w-auto">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <x-modal name="confirm-transaction-deletion" focusable>
        <form id="deleteConfirmationForm" method="POST" class="p-6" data-route="{{ route('transaction.destroy', ':id') }}">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure want to delete this transaction?') }}
            </h2>
        
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Transaction') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    @push('scripts')
    <script>
        function deleteTransaction(transactionId) {
            let deleteConfirmationForm = document.getElementById('deleteConfirmationForm');
            const baseRoute = deleteConfirmationForm.getAttribute('data-route');
            const finalRoute = baseRoute.replace(':id', transactionId);
            deleteConfirmationForm.setAttribute('action', finalRoute);

            window.dispatchEvent(new CustomEvent('open-modal', {
                detail: 'confirm-transaction-deletion'
            }));
        }
    </script>
    @endpush
</x-app-layout>