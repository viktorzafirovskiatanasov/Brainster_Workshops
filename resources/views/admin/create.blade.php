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
                    <form style="display: flex;flex-direction: column">

                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(() => {
            $('form').on('submit', e => {
                e.preventDefault();

                const form = e.target;
                // console.dir(form);
                // const name = form[0].value;
                // const email = form[1].value;
                // const password = form[2].value;

                // const data = {
                //     name: name,
                //     email: email,
                //     password: password
                // }
                
                const data = new FormData(form);

                axios.post('/api/user', data).then(data => {
                    console.log(data)
                    if(data.data.success){
                        alert(data.data.message);
                        window.location.href = '/admin/dashboard';
                    } 
                    $('#name').val('');
                    $('#email').val('');
                    $('#password').val('');
                })
                .catch(err => {console.log(err)})
            })
        })


    </script>
</x-app-layout>
