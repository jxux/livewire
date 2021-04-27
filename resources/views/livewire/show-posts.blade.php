<div>
    <div class="px-6 py-4 flex items-center">
        <x-jet-input type="text" wire:model="search" class="flex-1 mr-4" placeholder="Indique que esta buscando"></x-input>
        @livewire('create-post')
    </div>
    <x-table>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    wire:click="order('id')">
                        ID
                        {{-- sort--}}
                        @if ($sort == 'id') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    wire:click="order('title')">
                        Title
                        {{-- sort--}}
                        @if ($sort == 'title') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    wire:click="order('content')">
                        Content
                        {{-- sort--}}
                        @if ($sort == 'content') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Editar</span>
                        {{-- <span class="sr-only">Eliminar</span> --}}
                    </th>
                </tr>
            </thead>
            @if ($posts->count())
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)               
                        <tr>
                            <td class="px-6 py-4">
                                {{$post->id}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$post->title}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$post->content}}
                                </div>
                            </td>
                            <td class="px-4 py-2 text-sm font-medium">
                                @livewire('edit-post', ['post' => $post], key($post->id))
                                {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            @else
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 text-center" colspan="4">
                            No existe ningun registro coincidente
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </x-table>
    <div class="my-5">
        {{$posts->links()}}
    </div>
</div>