<x-app-layout>
    <div class="mt-20 ml-32">
        <div class="">
            <h3>Edit Permissions
                <a  class="bg-blue-800 text-white p-2" href="{{ url('permissions') }}">Retour</a>
            </h3>

            <div>
                <form action="{{ url('permissions/' . $permission->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                        <input type="text" name="name" value="{{ $permission->name }}">
                    </div>

                    <div>
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>