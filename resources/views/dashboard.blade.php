<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Total Income Card -->
                <div class="p-6 bg-white rounded-lg shadow-sm  flex flex-col items-center justify-center text-center">
                    <p class="text-lg font-bold text-gray-900">Total Income</p>
                    <p class="text-2xl font-bold text-green-500 mt-2">2000</p>
                    <a href="{{ route('transaction.index') }}?type=income" class="mt-4 self-end inline-block text-blue-500 hover:text-blue-700">
                        View All Incomes
                    </a>
                </div>
    
                <!-- Total Expense Card -->
                <div class="p-6 bg-white rounded-lg shadow-sm flex flex-col items-center justify-center text-center">
                    <p class="text-lg font-bold text-gray-900">Total Expense</p>
                    <p class="text-2xl font-bold text-red-500 mt-2">1000</p>
                    <a href="{{ route('transaction.index') }}?type=expense" class="mt-4 inline-block text-blue-500 self-end hover:text-blue-700">
                        View All Expenses
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
