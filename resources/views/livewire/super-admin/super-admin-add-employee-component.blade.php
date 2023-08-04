<div class="-mt-[520px] p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
   <div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="mx-4">
        <p class="text-left text-xs text-[#6a767e]"><a href="/" class="uppercase">Home</a> > Admin > Add New Employee</p>
    </div>

    <h1 class="text-center">Adding New Employee</h1>
    <h1 class="text-center underline my-4"><a href="{{route('all.employees')}}">Go to all Employees</a></h1>


    <div class="mx-8">
        @if(Session::has('message'))
            <div class="flex items-center justify-center bg-green-200 text-green-700 p-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-semibold">Success! | {{Session::get('message')}}</span>
            </div>
        @endif

        <form class="max-w-md mx-auto" wire:submit.prevent="addUser">
            <!-- NAMe -->
            <div class="mb-4">
                <label for="full_name" class="block mb-1">Full Name</label>
                <input id="full_name" type="text" name="full_name" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Full Name of Employee" wire:model="full_name">
                @error('full_name')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- Utype -->
            <div class="mb-4">
                <label for="utype" class="block mb-1">Utype</label>
                <input id="utype" type="text" name="utype" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter user type" wire:model="utype">
                @error('utype')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone_number" class="block mb-1">phone number</label>
                <input id="phone_number" type="text" name="phone_number" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Phone number of employee" wire:model="phone_number">
                @error('phone_number')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- Employee number -->
            <div class="mb-4">
                <label for="employee_no" class="block mb-1">Employee Number</label>

                <input type="text" id="employee_no" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" wire:model="employee_no" readonly>                
                @error('employee_no')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- Email -->

            <div class="mb-4">
                <label for="email" class="block mb-1">email</label>
                
                <input type="email" id="email" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" wire:model="email" placeholder="Generated email will appear here">
                @error('email')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- Start date -->
            <div class="mb-4">
                <label for="start_date" class="block mb-1">Start Date</label>
                <input id="start_date" type="date" name="start_date" class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder=" start_date" wire:model="start_date">
                @error('start_date')
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

            <!-- Campus -->
            <div class="mb-4">
                <label for="campus_id" class="block mb-1">select campus</label>
                <select name="campus_id" id="" wire:model="campus_id" wire:change="changeDepartment">
                    <option value="0">Choose Campus</option>
                    @foreach($campuses as $campus)
                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                    @endforeach
                </select>
                @error('campus_id')
                    <p class="text-white bg-red-300">{{$message}}</p>
                @enderror
            </div>

            <!-- Department -->
            <div class="mb-4">
                <label for="department_id" class="block mb-1">select department</label>
                <select name="department_id" id="" wire:model="department_id">
                    <option value="">Choose Department</option>
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                    @endforeach
                </select>
                @error('department_id')
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
