<div class="container mx-auto">
    <p class="mb-4">Invoice Date: {{ $invoiceDate }}</p>
    <p class="mb-4">Tax Amount: {{ $taxAmount }}</p>
    <p class="mb-4">Invoice Amount: {{ $invoiceAmount }}</p>
    @if ($filename)
        <a href="{{ $filename }}" target="_blank"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Open Invoice File</a>
    @endif
</div>
