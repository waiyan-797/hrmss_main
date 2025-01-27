<div class="fixed w-screen h-screen inset-0 flex items-center justify-center bg-gray-600 bg-opacity-75 z-50">
    {{-- @dd('d') --}}
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-lg font-semibold mb-4">Please enter your input:</h2>
        <textarea
            wire:model="comment" type="text" class="border p-2 w-full h-32 mb-4 rounded-md focus:ring focus:ring-blue-500" placeholder="Enter something...">
        </textarea>
        <div class="flex justify-end space-x-4">
            <button wire:click="closeModal" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Cancel</button>
            <button wire:click="submitCondition({{$staff_status_id}})" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
        </div>
    </div>
</div>
