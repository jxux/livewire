<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="image" class="w-full mb-4 bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold">Imagen cargando</p>
                        <p class="text-sm">Espere un momento porfavor, la imagen se esta procesando.</p>
                    </div>
                </div>
            </div>
            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}" alt="">
            @endif
            <div class="mb-4" >
                <x-jet-label value="Título del post"/>
                <x-jet-input type="text" class="w-full" wire:model="title"></x-jet-input>
                <x-jet-input-error for="title"/>
            </div>
            <div class="mb-4" >
                <x-jet-label value="Contenido del post"/>
                <textarea type="text" class="form-control w-full" wire:model.defer="content" rows="6"></textarea>
                <x-jet-input-error for="content"/>
            </div>

            <div>
                <input type="file" wire:model="image" id="{{$identidicador}}">
                <x-jet-input-error for="image"/>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save()" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Crear post
            </x-jet-danger-button>
            
        </x-slot>
    </x-jet-dialog-modal>
</div>
