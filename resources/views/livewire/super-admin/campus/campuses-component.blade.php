<div class="-mt-[520px] p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
<div>
    <div class="mx-4">
        <p class="text-left text-xs text-[#6a767e]"><a href="/" class="uppercase">Home</a> > Campuses</p>
    </div>

    <div>   
      <h1 class="text-center">All Campuses</h1>
    </div>
    <div class="text-right mx-8 my-2">
        <a href="{{ route('superadmin.add.campuses') }}" class="bg-blue-500 cursor-pointer hover:bg-blue-600 text-white py-1 px-2 rounded ">Add New color</a>
    </div>

    <div class="mx-8">
        @if(Session::has('message'))
            <div class="flex items-center justify-center bg-green-200 text-green-700 p-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-semibold">Success! | {{Session::get('message')}}</span>
            </div>
        @endif
        <table class="w-full px-8 border rounded-lg ">
            <thead>
                <tr class="bg-blue-200">
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Slug</th>
                <th class="py-2 px-4">Departments</th>
                <th class="py-2 px-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=($campuses->currentPage()-1)*$campuses->perPage();
                @endphp
                @foreach($campuses as $campus)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td class="py-2 px-4 whitespace-nowrap text-center">{{++$i}}</td>
                        <td class="py-2 px-4  text-center">{{$campus->name}}</td>
                        <td class="py-2 px-4  text-center">{{$campus->slug}}</td>
                        <td class="py-2 px-4  text-center">
                            <ul class="space-y-2">
                                @foreach ($campus->departments as $department)
                                    <li class="">
                                        {{$department->name}} <span class="pl-2">
                                        <a href="{{ route('superadmin.edit.campus',['campus_id'=>$campus->id,'department_id'=>$department->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 rounded">Edit</a>
                                        <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded" onclick="deleteDptConfirmation({{$department->id}})">Delete</button>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="py-2 px-4 whitespace-nowrap text-center">
                            <a href="{{ route('superadmin.edit.campus',['campus_id'=>$campus->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 rounded">Edit</a>
                            <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded" onclick="deleteConfirmation({{$campus->id}})">Delete</button>
                            <!-- {{-- $campus->id --}} -->
                        </td>
                    </tr>

                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
            {{$campuses->links()}}

    </div>

    <div wire:ignore id="deleteConfirmation" class="fixed z-50 inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
      <div class="bg-white w-1/2 rounded-lg p-8">
        <h2 class="text-xl font-semibold mb-4">Delete Confirmation</h2>
        <p class="mb-6">Are you sure you want to delete this Campus? Action can't be undone</p>
        <div class="flex justify-end">
          <button onclick="deleteCampus()"  class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded mr-4">Yes</button>
          <button onclick="cancelDelete()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Cancel</button>
        </div>
      </div>
    </div>

    <div wire:ignore id="deleteDptConfirmation" class="fixed z-50 inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
      <div class="bg-white w-1/2 rounded-lg p-8">
        <h2 class="text-xl font-semibold mb-4">Delete Confirmation</h2>
        <p class="mb-6">Are you sure you want to delete this Department? Action cannot be undone</p>
        <div class="flex justify-end">
          <button onclick="deleteDepartment()"  class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded mr-4">Yes</button>
          <button onclick="cancelDptDelete()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Cancel</button>
        </div>
      </div>
    </div>

</div>

<script>
  function deleteConfirmation(id) {
    // Set the campus ID
    document.getElementById('deleteConfirmation').classList.remove('hidden');
    // Simulate setting the campus_id in a Laravel Livewire component
    console.log("Deleting campus with ID:", id);
    @this.set('campus_id', id);
  }

    function deleteCampus() {
    // Get the campus ID
    @this.call('deleteCampus');
    var campusId = document.getElementById('deleteConfirmation').dataset.id;
    document.getElementById('deleteConfirmation').classList.add('hidden');
  }

  function cancelDelete() {
    document.getElementById('deleteConfirmation').classList.add('hidden');
    console.log("Canceling deleting department ");
  }

  function deleteDptConfirmation(id) {
    // Set the department ID
    document.getElementById('deleteDptConfirmation').classList.remove('hidden');
    // Simulate setting the department_id in a Laravel Livewire component
    console.log("Deleting department with ID:", id);
    @this.set('department_id', id);
  }

  function deleteDepartment() {
    // Get the department ID
    @this.call('deleteDepartment');
    var departmentId = document.getElementById('deleteDptConfirmation').dataset.id;
    document.getElementById('deleteDptConfirmation').classList.add('hidden');
  }


  function cancelDptDelete() {
    document.getElementById('deleteDptConfirmation').classList.add('hidden');
    console.log("Canceling deleting department ");

  }
</script>
</div>
</div>
