<x-app-layout>
    <div class="mt-20 ml-32">
        <div class="">
            <h3>Update User
                <a  class="p-2 text-white bg-blue-800" href="{{ url('users') }}">Retour</a>
            </h3>

            <div>
                <form action="{{ url('users/' . $user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}">
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">email</label>
                        <input type="email" name="email" readonly   value="{{ $user->email }}">
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">password</label>
                        <input type="password" name="password"  value="{{ $user->name }}">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="roles" class="block mb-2 text-sm font-medium text-gray-900">Roles</label>
                        
                        <select name="roles[]" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}"
                                    {{ in_array($role, $userRoles) ? 'selected' : ''}}
                                    style="{{ in_array($role, $userRoles) ? 'color: blue;' : '' }}"
                                >{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <span>{{ $message }}</span>
                        @enderror
                        
                    </div>

                    <div>
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>