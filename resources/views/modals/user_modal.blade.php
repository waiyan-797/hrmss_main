<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left " wire:ignore.self>
   
    <div class="bg-white w-1/2 dark:bg-gray-800 rounded-lg shadow-xl p-4 h-auto overflow-y-auto">
     
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">
            <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial text-sm">Name</label>
                <input required type="text" wire:model="user_name" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('user_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>


            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial text-sm">Email</label>
                <input required type="email" wire:model="email" id="email" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('email') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>



            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial text-sm">Password</label>
                <input required type="password" wire:model="password" id="password" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('password') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">

    <label for="status_code" class="block mb-1 text-gray-600 dark:text-green-500 font-arial text-sm">Status</label>

        <select
            wire:model.live='status' id="status_code"
            class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
        >
            <option value="1">
                Active
            </option>
            <option value="0">
                Inactive
            </option>
        </select>
    </div>
            <div class="mb-4">
                <label for="role_id" class="block mb-1 text-gray-600 dark:text-green-500 font-arial text-sm">Role</label>

                <select wire:model="role_id" id="role_id"  class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
                </select>
            </div>


            <div class="mb-4">
                <label for="division_id" class="block mb-1 text-gray-600 dark:text-green-500 font-arial text-sm">Division</label>

                <select wire:model="division_id" id="division_id"  class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                    @foreach ($divisions as $division)
                        <option value="{{$division->id}}">{{$division->name}}</option>
                @endforeach
                </select>
            </div>
          
            <div class="mb-4">
                <label for="section_id" class="block mb-1 text-gray-600 dark:text-green-500 font-arial text-sm">Section</label>
                <select wire:model="section_id" id="section_id"  class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                    @foreach ($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                @endforeach
                </select>
            </div>
            
        </div>
        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div>