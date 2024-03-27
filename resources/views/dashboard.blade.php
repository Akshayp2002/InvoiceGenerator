<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('invoices.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Invoice Data') }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-gray-900 dark:text-gray-100">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tax %
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Net Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($invoice))
                                @foreach ($invoice as $invoice)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $invoice->name ?? 'name' }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $invoice->email ?? 'Email' }}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $invoice->date ?? 'date' }}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $invoice->quantity ?? 'quantity' }}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $invoice->amount ?? 'amount' }}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $invoice->tax_amount ?? 'tax' }}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $invoice->net_amount ?? 'tax' }}

                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('invoices.edit', $invoice->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <form method="POST" action="{{ route('invoices.destroy', $invoice->id) }}"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirmDelete()"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this invoice?');
        }
    </script>
</x-app-layout>
