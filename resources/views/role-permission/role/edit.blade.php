<x-app-layout>
    <div class="mt-20 ml-32">
        <div class="">
            <h3>Edit Roles
                <a  class="bg-blue-800 text-white p-2" href="{{ url('roles') }}">Retour</a>
            </h3>

            <div>
                <form action="{{ url('roles/' . $role->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                        <input type="text" name="name" value="{{ $role->name }}">
                    </div>

                    <div>
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>