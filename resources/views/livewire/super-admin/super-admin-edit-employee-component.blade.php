<div class="-mt-[520px] p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
   <div class="h-fit">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="mx-4">
        <p class="text-left text-xs text-[#6a767e]"><a href="/" class="uppercase">Home</a> > Admin > Edit user details</p>
    </div>

    <h1 class="text-center">Editing Employee </h1>
    <h1 class="text-center underline my-4"><a href="{{route('all.employees')}}">All Users</a></h1>


    <div class="mx-8">
        <!-- <form>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter name of category" >
            </div>
            <div>
                <label for="slug">Slug</label>
                <input type="text" name="slug" placeholder="Enter name of category" >
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 rounded ">Submit</button>
        </form> -->
        @if(Session::has('message'))
            <div class="flex items-center justify-center bg-green-200 text-green-700 p-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-semibold">Success! | {{Session::get('message')}}</span>
            </div>
        @endif
        <form class="max-w-md mx-auto" wire:submit.prevent="updateUser">
            <div class="mb-4">
                <label for="full_name" class="block mb-1">full name</label>
                <input id="full_name" type="text" full_name="full_name" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  wire:model="full_name">
                @error('full_name')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>
            


campus
campus_id

job_grade
salary

department
department_id

suspended
password
            <div class="mb-4">
                <label for="email" class="block mb-1">Email</label>
                <input id="email" type="text" name="email" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  wire:model="email">
                @error('email')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="utype" class="block mb-1">U-type</label>
                <input id="utype" type="text" name="utype" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Utype ADM or USR" wire:model="utype">
                @error('utype')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            

            <div class="mb-4">
                <label for="phone_number" class="block mb-1">Phone Number</label>
                <input id="phone_number" type="text" name="phone_number" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  wire:model="phone_number">
                @error('phone_number')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone_number2" class="block mb-1">phone_number2</label>
                <input id="phone_number2" type="text" name="phone_number2" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  wire:model="phone_number2">
                @error('phone_number2')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="salary" class="block mb-1">Salary</label>
                
                <input id="salary" type="number" name="salary" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  wire:model="salary">
                @error('salary')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="job_grade" class="block mb-1">Job Grade</label>
                <input id="job_grade" type="text" name="job_grade" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  wire:model="job_grade">
                @error('job_grade')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

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
                <label for="start_date" class="block mb-1">Start Date</label>
                
                <input id="start_date" type="date" name="start_date" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  wire:model="start_date">
                @error('start_date')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- <div class="mb-4">
                <label for="password" class="block mb-1">Password</label>
                <input id="password" type="text" name="password" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  wire:model="password">
                @error('password')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div> -->

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Submit</button>
        </form>      
    </div>
</div>

    </div>
</div>
