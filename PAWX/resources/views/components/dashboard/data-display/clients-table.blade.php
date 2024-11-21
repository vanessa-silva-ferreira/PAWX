@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-10 my-10 bg-white">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-10 uppercase" style="color: #81C784">Clientes</h1>

        <div class="flex items-center justify-between mb-10 space-x-4">
            <form method="GET" action="{{ route($rolePrefix . '.clients.index') }}" class="flex w-full max-w-full">
                <div class="relative flex-grow">
                    <input
                        type="text"
                        name="search"
                        placeholder="Procure por nome, username, email, contacto, nif, morada..."
                        class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        value="{{ request('search') }}"
                    />
                    <button
                        type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-stone-400 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" x2="16.65" y1="21" y2="16.65"/>
                        </svg>
                    </button>
                </div>
            </form>

            <a
                href="{{ route($rolePrefix . '.clients.create') }}"
                class="px-4 py-2 text-white font-semibold rounded-lg focus:ring-2 focus:ring-blue-400"
                style="background-color: #81C784">
                Adicionar
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                <tr class="bg-white-100 text-stone-400">
                    <th>#</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>CONTACTO</th>
                    <th>MORADA</th>
                    <th></th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                @foreach ($clients as $client)
                    <tr class="hover:bg-stone-100 text-stone-700">
                        <th>{{ $client->client->id }}</th>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone_number }}</td>
                        <td>{{ $client->address }}</td>
                        <td class="px-2">
                            <a href="{{ route($rolePrefix . '.clients.edit', $client->client->id) }}" class="text-stone-400 hover:text-blue-800" title="View">
                                <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8067 6.62361L18.1842 5.54352C17.6577 4.6296 16.4907 4.31432 15.5755 4.83872C15.1399 5.09534 14.6201 5.16815 14.1307 5.04109C13.6413 4.91402 13.2226 4.59752 12.9668 4.16137C12.8023 3.88415 12.7139 3.56839 12.7105 3.24604C12.7254 2.72922 12.5304 2.2284 12.17 1.85767C11.8096 1.48694 11.3145 1.27786 10.7975 1.27808H9.5435C9.03697 1.27808 8.55131 1.47991 8.194 1.83895C7.83669 2.19798 7.63717 2.68459 7.63961 3.19112C7.6246 4.23693 6.77248 5.07681 5.72657 5.0767C5.40421 5.07336 5.08846 4.98494 4.81123 4.82041C3.89606 4.29601 2.72911 4.61129 2.20254 5.52522L1.53435 6.62361C1.00841 7.53639 1.3194 8.70261 2.23 9.23231C2.8219 9.57404 3.18653 10.2056 3.18653 10.8891C3.18653 11.5725 2.8219 12.2041 2.23 12.5458C1.32056 13.0719 1.00923 14.2353 1.53435 15.1454L2.16593 16.2346C2.41265 16.6798 2.8266 17.0083 3.31619 17.1474C3.80578 17.2866 4.33064 17.2249 4.77462 16.976C5.21108 16.7213 5.73119 16.6516 6.21934 16.7822C6.70749 16.9128 7.12324 17.233 7.37416 17.6717C7.5387 17.9489 7.62711 18.2646 7.63046 18.587C7.63046 19.6435 8.48695 20.5 9.5435 20.5H10.7975C11.8505 20.5 12.7055 19.6491 12.7105 18.5962C12.7081 18.088 12.9089 17.6 13.2682 17.2407C13.6275 16.8814 14.1155 16.6807 14.6236 16.6831C14.9452 16.6917 15.2596 16.7798 15.5389 16.9394C16.4517 17.4653 17.6179 17.1544 18.1476 16.2438L18.8067 15.1454C19.0618 14.7075 19.1318 14.186 19.0012 13.6964C18.8706 13.2067 18.5502 12.7894 18.111 12.5367C17.6718 12.284 17.3514 11.8666 17.2208 11.3769C17.0902 10.8873 17.1603 10.3658 17.4154 9.92796C17.5812 9.63834 17.8214 9.3982 18.111 9.23231C19.0161 8.70289 19.3264 7.54349 18.8067 6.63277V6.62361Z"
                                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.175 13.5252C11.6309 13.5252 12.8111 12.345 12.8111 10.8891C12.8111 9.43318 11.6309 8.25293 10.175 8.25293C8.71907 8.25293 7.53882 9.43318 7.53882 10.8891C7.53882 12.345 8.71907 13.5252 10.175 13.5252Z"
                                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </td>
                        <td class="px-2">
                        <a href="{{ route($rolePrefix . '.clients.show', $client->client->id) }}" class="text-stone-400 hover:text-yellow-800" title="Edit">
                                <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 1L8.5 8L1.5 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
</div>
