@use(App\Enums\TransactionTypeEnum)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl flex flex-col mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <p class="font-bold text-lg">Create Trasaction</p>
                </div>
            <x-primary-button class="mb-4 " onclick="window.location='{{ route('transaction.index') }}'">
                {{ __('Back') }}
            </x-primary-button>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8">
               
                <form method="post" action="{{ route('transaction.store') }}" class="mt-6 space-y-6">
                    @csrf
            
                    <div>
                        <x-input-label for="amount" :value="__('Amount')" :required="true" />
                        <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" :value="old('amount')" required autofocus autocomplete="amount" />
                        <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                    </div>
            
                    <div>
                        <x-input-label for="description" :value="__('Description')" :required="true" />
                        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description')" required autocomplete="description" />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-2">Select Transaction Type <x-required />:</p>
                        
                        <div class="flex flex-wrap items-center gap-6">
                            @foreach(TransactionTypeEnum::cases() as $type)
                                <label for="type_{{ $type->value }}" class="flex items-center space-x-2 cursor-pointer">
                                    <input
                                        id="type_{{ $type->value }}"
                                        name="type"
                                        type="radio"
                                        value="{{ $type->value }}"
                                        {{ old('type') === $type->value ? 'checked' : '' }}
                                        class="text-blue-600 focus:ring-blue-500"
                                        required
                                    >
                                    <span class="text-gray-800 text-sm">{{ $type->value }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    

                    <div>
                        <x-input-label for="transaction_date" :value="__('Transaction Date')" :required="true" />
                        <x-text-input id="transaction_date" name="transaction_date" type="date" class="mt-1 block w-full" :value="old('transaction_date',date('Y-m-d'))" required autocomplete="description" />
                        <x-input-error class="mt-2" :messages="$errors->get('transaction_date')" />
                    </div>
            
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>