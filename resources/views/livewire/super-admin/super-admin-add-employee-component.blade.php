<div class="-mt-[520px] p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
   <div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="mx-4">
        <p class="text-left text-xs text-[#6a767e]"><a href="/" class="uppercase">Home</a> > Admin > Add New Employee</p>
    </div>

    <h1 class="text-center">Adding New Employee</h1>
    <h1 class="text-center underline my-4"><a href="{{route('all.employees')}}">All Products</a></h1>


    <div class="mx-8">
        @if(Session::has('message'))
            <div class="flex items-center justify-center bg-green-200 text-green-700 p-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-semibold">Success! | {{Session::get('message')}}</span>
            </div>
        @endif
        <form class="max-w-md mx-auto" wire:submit.prevent="addProduct">
            <!-- NAMe -->
            <div class="mb-4">
                <label for="name" class="block mb-1">Name</label>
                <input id="name" type="text" name="name" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter name of artPiece" wire:model="name" wire:keyup="generateSlug()">
                @error('name')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- Employee number -->

            <div class="mb-4">
                <label for="employee_no" class="block mb-1">employee number</label>
                <input id="employee_no" type="text" name="employee_no" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder=" employee_number" wire:model="employee_no">
                @error('employee_no')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- Short description -->
            <div class="mb-4">
                <label for="short_description" class="block mb-1">Short Description</label>
                <textarea name="short_description" id="" cols="50" rows="5" placeholder="Enter short Description" wire:model="short_description"></textarea>
                @error('short_description')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>


            <!-- fired-->
            <div class="mb-4">
                <label for="fired" class="block mb-1" >fired</label>
                <select name="fired" wire:model="fired" id="">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                @error('fired')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="campus_id" class="block mb-1">select campus</label>
                <select name="campus_id" id="" wire:model="campus_id">
                    <option value="">Choose campus</option>
                    @foreach($campuses as $campus)
                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                    @endforeach
                </select>
                @error('campus_id')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>
            


            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Submit</button>
        </form>      
        @if(Session::has('message'))
            <div class="flex items-center justify-center bg-green-200 text-green-700 p-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-semibold">Success! | {{Session::get('message')}}</span>
            </div>
        @endif
    </div>
</div>
    </div>
</div>
