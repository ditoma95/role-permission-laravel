<x-app-layout>
    <div class="mt-20 ml-32">
        <div class="">
            <h3>Create Roles
                <a  class="p-2 text-white bg-blue-800" href="{{ url('roles') }}">Retour</a>
            </h3>

            <div>
                <form action="{{ url('roles')}}" method="post">
                    @csrf
                    @method('post')
                    
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                        <input type="text" name="name">
                    </div>

                    <div>
                        <button type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>