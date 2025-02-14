
<div
    x-data="{
        value: @entangle($attributes->wire('model')),
        formattedValue: ''
    }"
    x-init="
        if (value) {
            let initialDate = new Date(value);
            if (!isNaN(initialDate)) {
                formattedValue = initialDate.toLocaleDateString('en-GB');
            }
        }

        new Pikaday({
            field: $refs.input,
            format: 'DD-MM-YYYY',
            yearRange: [1800, 3000],
            {{-- maxDate : new Date(), --}}
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
>
    <input
        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 font-arial'
        x-ref="input"
        x-model="formattedValue"
        placeholder="DD/MM/YYYY"
        type="text"
    />

</div>



