<div class="grid grid-cols-3 gap-4">
    <div class="mb-4">
        <x-jet-label value="Código interno"/>
        <x-jet-input type="text" class="w-full" wire:model="title"></x-jet-input>
        <x-jet-input-error for="title"/>
    </div>
    <div class="mb-4">
        <x-jet-label value="Tipo Doc."/>
        <select name="" id="" class="form-control w-full">
            @foreach ($identity_document_types as $identity_document_type)
                <option value="{{ $identity_document_type->id }}">{{ $identity_document_type->description }}</option>
            @endforeach
        </select>
        <x-jet-input-error for="title"/>
    </div>
    <div class="mb-4">
        <x-jet-label value="Número"/>
        <x-jet-input type="text" class="w-full" wire:model="title"></x-jet-input>
        <x-jet-input-error for="title"/>
    </div>
</div>