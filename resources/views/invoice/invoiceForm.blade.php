<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ __('Create Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Create Invoice') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Enter Invoice Details.') }}
                            </p>
                        </header>


                        <form id="form"
                            action="{{ isset($invoice) ? route('invoices.update', $invoice->id) : route('invoices.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($invoice))
                                @method('PUT')
                            @endif
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input name="name" type="text" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John"
                                        value="{{ old('name', isset($invoice) ? $invoice->name : '') }}" />
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium"></span> {{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-format="yyyy-mm-dd" type="text" name="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date"
                                            value="{{ old('date', isset($invoice) ? $invoice->date : date('Y-m-d')) }}" />
                                        @error('date')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                    class="font-medium"></span> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                        address</label>
                                    <input type="email" id="email" name="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="john.doe@company.com"
                                        value="{{ old('email', isset($invoice) ? $invoice->email : '') }}" />
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium"></span> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="phone"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                    <input type="number" name="amount"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                                        value="{{ old('amount', isset($invoice) ? $invoice->amount : '') }}" />
                                    @error('amount')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium"></span> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="website"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                    <input type="number" name="quantity"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="flowbite.com"
                                        value="{{ old('quantity', isset($invoice) ? $invoice->quantity : '') }}" />
                                    @error('quantity')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium"></span> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tax
                                        Percentage</label>
                                    <select name="percentage"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Select Tax Percentage</option>
                                        <option value="0"
                                            {{ old('percentage', isset($invoice) && $invoice->percentage == 0 ? 'selected' : '') }}>
                                            0%</option>
                                        <option value="5"
                                            {{ old('percentage', isset($invoice) && $invoice->percentage == 5 ? 'selected' : '') }}>
                                            5%</option>
                                        <option value="12"
                                            {{ old('percentage', isset($invoice) && $invoice->percentage == 12 ? 'selected' : '') }}>
                                            12%</option>
                                        <option value="18"
                                            {{ old('percentage', isset($invoice) && $invoice->percentage == 18 ? 'selected' : '') }}>
                                            18%</option>
                                        <option value="28"
                                            {{ old('percentage', isset($invoice) && $invoice->percentage == 28 ? 'selected' : '') }}>
                                            28%</option>
                                    </select>
                                    @error('percentage')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium"></span> {{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-6">

                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload file</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" type="file" name="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG,
                                    JPG or GIF (MAX. 800x400px).</p>
                                @error('file')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>

                    </section>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('../resources/js/validation.js') }}"></script>
    @endpush
</x-app-layout>
