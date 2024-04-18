<x-app-layout>
    @include('role-permission.nav-links')

    <div class="mt-20 ml-32">
        
        <div class="bg-yellow-800 mb-10 mt-4">
            @if (session('success'))
                <div class="text-white p-2"> {{ session('success') }}</div>
            @endif
        </div>


        <div class="">
            <h3>Permissions
                <a  class="bg-blue-800 text-white p-2" href="{{ url('permissions/create') }}">Créer</a>
            </h3>
        </div>

        <div>
            <h1 class="text-center text-2xl font-bold mb-10">Listes of permissions</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
            
                        @forelse ($permissions as $permission)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $permission->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $permission->name }}</td>
            
                            <td class="px-6 py-4 whitespace-nowrap gap-8">
                                <a href="{{ url('permissions/' . $permission->id . '/edit') }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                <form action="{{ url('permissions/' . $permission->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @empty
            
                        <tr>
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">Aucune permission disponible</td>
                        </tr>
            
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            </table>
        </div>
    </div>
</x-app-layout>