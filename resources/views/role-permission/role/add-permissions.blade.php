<x-app-layout> 
    <div class="mt-20 ml-32">
        <div class="mt-4 mb-10 bg-yellow-800">
            @if (session('success'))
                <div class="p-2 text-white"> {{ session('success') }}</div>
            @endif
        </div>


        <div class="">
            <h3> Role : {{ $role->name }}
                <a  class="p-2 text-white bg-blue-800" href="{{ url('roles') }}">Retour</a>
            </h3>

            <div>
                <form action="{{ url('roles/' . $role->id . '/give-permissions')}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="error">
                        @error('permission')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="name" class="block mt-8 mb-8 text-sm font-medium text-gray-900">Permissions</label>
                        
                        @foreach($permissions as $permission)
                            <div class="items-center inline-block p-2 mb-4 bg-blue-100 border-2 rounded-lg shadow-lg border-blue-950">
                                <label for="{{ $permission->name }}" class="ml-2 text-sm font-medium text-gray-900 cursor-pointer">{{ $permission->name }}</label>
                                <input type="checkbox" name="permission[]" value="{{ $permission->name }}" id="{{ $permission->name }}" class="cursor-pointer " 
                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : ''}}
                                >
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>