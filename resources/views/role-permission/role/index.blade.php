<x-app-layout>
    @include('role-permission.nav-links')
    
    <div class="mt-20 ml-32">
        
        <div class="mt-4 mb-10 bg-yellow-800">
            @if (session('success'))
                <div class="p-2 text-white"> {{ session('success') }}</div>
            @endif
        </div>


        <div class="">
            <h3>Roles
                <a  class="p-2 text-white bg-blue-800" href="{{ url('roles/create') }}">Créer</a>
            </h3>
        </div>

        <div>
            <h1 class="mb-10 text-2xl font-bold text-center">Listes of roles</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">ID</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">Name</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
            
                        @forelse ($roles as $role)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $role->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
            
                            <td class="gap-8 px-6 py-4 whitespace-nowrap">
                                <a href="{{ url('roles/' . $role->id . '/give-permissions') }}" class="text-indigo-600 hover:text-indigo-900">Add / Edit Role Permissions</a>
                                <a href="{{ url('roles/' . $role->id . '/edit') }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                <form action="{{ url('roles/' . $role->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @empty
            
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-sm font-medium text-center text-gray-500 whitespace-nowrap">Aucune role disponible</td>
                        </tr>
            
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            </table>
        </div>
    </div>
</x-app-layout>