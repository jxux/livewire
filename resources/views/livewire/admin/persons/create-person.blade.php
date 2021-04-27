<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Nuevo Cliente
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo cliente
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-3 gap-4">
                <div class="mb-4">
                    <x-jet-label value="Código interno" />
                    <x-jet-input type="text" class="w-full" wire:model="internal_code"></x-jet-input>
                    <x-jet-input-error for="internal_code"/>
                </div>

                <div class="mb-4">
                    <x-jet-label value="Tipo Doc." />
                    <select name="identity_document_type" id="identity_document_type" class="identity_document_type form-control w-full" wire:model="identity_document_type_id">
                        @foreach ($identity_document_types as $identity_document_type)
                            <option value="{{ $identity_document_type->id }}">{{ $identity_document_type->id }} - {{ $identity_document_type->description }}
                    </option>
                    @endforeach
                    </select>

                    {{-- <x-input.select class="form-control" wire:model="identity_document_type_id" prettyname="modelprettyname" :options="$identity_document_types->pluck('description')->toArray()"/>
                        {{ $identity_document_type_id }} --}}
                    <x-jet-input-error for="identity_document_type_id"/>
                </div>

                <div class="mb-4">
                    <x-jet-label value="Número" />
                    <x-jet-input type="text" class="w-full" wire:model="number"></x-jet-input>
                    <x-jet-input-error for="number"/>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <x-jet-label value="Nombre " />
                    <x-jet-input type="text" class="w-full" wire:model="name"></x-jet-input>
                    <x-jet-input-error for="name"/>
                </div>

                <div class="mb-4">
                    <x-jet-label value="Nombre comercial" />
                    <x-jet-input type="text" class="w-full" wire:model="trade_name"></x-jet-input>
                    <x-jet-input-error for="trade_name"/>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4">
                <div class="mb-4">
                    <x-jet-label value="Pais"/>
                    <select name="countrie" id="countrie" class="form-control w-full" wire:model="countrie_id">
                        @foreach ($countries as $countrie)
                        <option value="{{ $countrie->id }}">{{ $countrie->description }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="countrie_id" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="Departamento" />
                    <select name="" id="" class="form-control w-full" wire:model="department_id">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->description }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="department_id"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Provincia" />
                    <select name="" id="" class="form-control w-full" wire:model="province_id">
                        @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->description }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="province_id" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="Distrito" />
                    <select name="" id="" class="form-control w-full" wire:model="district_id">
                        @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->description }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="district_id"/>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            {{-- <x-jet-danger-button wire:click="save()" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Crear post
            </x-jet-danger-button> --}}
        </x-slot>
    </x-jet-dialog-modal>
</div>


<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>


{{-- @push('scripts') --}}
<script>
    $(document).ready(function() {
        $('.identity_document_type').select2();
    });
</script>
{{-- @endpush --}}