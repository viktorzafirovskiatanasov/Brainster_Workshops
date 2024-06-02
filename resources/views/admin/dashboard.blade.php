<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <input type="text" id="search" placeholder="search">
            </div>
            <div>
                <a href="{{route('admin.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create new Student</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border-collapse border border-slate-400">
                        <thead>
                          <tr>
                            <th class="border border-slate-300">#</th>
                            <th class="border border-slate-300">Name</th>
                            <th class="border border-slate-300">Email</th>
                            <th class="border border-slate-300">Role</th>
                            <th class="border border-slate-300">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr id='{{$user->id}}'>
                                <td class="border border-slate-300">{{$user->id}}</td>
                                <td class="border border-slate-300">{{$user->name}}</td>
                                <td class="border border-slate-300">{{$user->email}}</td>
                                <td class="border border-slate-300">{{$user->role->name}}</td>
                                <td class="border border-slate-300">
                                   @if ($user->role->name == 'student')
                                   <button data-user-id="{{$user->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded deleteBtn">Delete</button>
                                   @else
                                   'N/a'
                                   @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(() => {
            $('.deleteBtn').on('click', destroy);
            $('#search').on('keyup', search);

            function search(e){
                console.log(e.target.value)
                const searchValue = $('#search').val();

                axios.get(`/api/users?search=${searchValue}`).then(data => {
                    console.log(data);
                    if(data.data.success){
                        $('tbody').html('');
                        const users = data.data.users;
                        let columns = '';
                        // console.dir(data);
                        users.forEach(user => {
                            // console.dir(user.name)
                            
                                columns += `<tr>
                                                <td class="border border-slate-300">${user.id}</td>
                                                <td class="border border-slate-300">${user.name}</td>
                                                <td class="border border-slate-300">${user.email}</td>
                                                <td class="border border-slate-300">${user.role.name}</td>
                                                <td class="border border-slate-300">N/a</td>
                                            </tr>`
                            
                        })
                        $('tbody').append(columns);
                    }
                  
                }).catch(err => {
                    console.log(err);
                })
            }

            function destroy(e){
                const userId = $(e.target).data('user-id');
                console.log(userId);

                axios.delete(`/api/user/${userId}`).then(data => {
                    console.log(data.data.success);
                    if(data.data.success){
                        $(`#${userId}`).remove();
                    }    
                }).catch(err => {
                    console.log(err);
                })
            }
        })
    </script>
</x-app-layout>
