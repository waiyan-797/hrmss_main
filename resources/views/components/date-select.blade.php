<div
    x-data="{
        value: @entangle($attributes->wire('model')),
        formattedValue: '',
        parseAndFormatInput(event) {
            let input = event.target.value.replace(/\D/g, ''); // Remove non-numeric characters
            let formatted = '';

            if (input.length > 0) {
                formatted += input.substring(0, 2); // First 2 digits (Day)
            }
            if (input.length > 2) {
                formatted += '/' + input.substring(2, 4); // Next 2 digits (Month)
            }
            if (input.length > 4) {
                formatted += '/' + input.substring(4, 8); // Next 4 digits (Year)
            }

            this.formattedValue = formatted;

            if (input.length === 8) { // Full date entered
                const day = parseInt(input.substring(0, 2), 10);
                const month = parseInt(input.substring(2, 4), 10) - 1; // JS months are 0-based
                const year = parseInt(input.substring(4, 8), 10);
                const date = new Date(year, month, day);

                if (!isNaN(date.getTime())) {
                    this.value = `${year}-${('0' + (month + 1)).slice(-2)}-${('0' + day).slice(-2)}`;
                }
            }
        }
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
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 font-arial"
        x-ref="input"
        x-model="formattedValue"
        placeholder="DD/MM/YYYY"
        type="text"
        maxlength="10"
        @input="parseAndFormatInput"
    />
</div>