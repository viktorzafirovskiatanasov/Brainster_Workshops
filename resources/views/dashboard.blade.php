<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    @if (Auth::user()->role->name !== 'admin')
                    <h3>Welcome {{Auth::user()->name}} {{Auth::user()->surname}}!</h3>
                    @else
                    <table class="border-collapse border border-slate-400">
                        <thead>
                          <tr>
                            <th class="border border-slate-300">ID</th>
                            <th class="border border-slate-300">Name</th>
                            <th class="border border-slate-300">Surname</th>
                            <th class="border border-slate-300">Email</th>
                            <th class="border border-slate-300">Role</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            @foreach ($users as $user)
                            <tr>
                                <td class="border border-slate-300">{{$user->id}}</td>
                                <td class="border border-slate-300">{{$user->name}}</td>
                                <td class="border border-slate-300">{{$user->surname}}</td>
                                <td class="border border-slate-300">{{$user->email}}</td>
                                <td class="border border-slate-300">{{$user->role->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
