<div x-data="{ 
    value: @entangle($attributes->wire('model')), 
    formattedValue: '' 
}">
    <input
        x-ref="input"
        x-model="formattedValue" 
        class="block max-w-sm rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 

        x-init="
            new Pikaday({
                field: $refs.input,
                format: 'DD-MM-YYYY',
                yearRange: [1800,3000],
                onSelect: function(date) {
                    const formattedDate = date.toLocaleDateString('en-GB'); // UI format
                    const livewireDate = date.getFullYear() + '-' 
                        + ('0' + (date.getMonth() + 1)).slice(-2) + '-' 
                        + ('0' + date.getDate()).slice(-2); // Local YYYY-MM-DD format
                    formattedValue = formattedDate; // Update UI
                    value = livewireDate; // Update Livewire
                }
            });
        "
        placeholder="{{ now()->format('d-m-Y') }}"
        type="text"
    />
</div>
