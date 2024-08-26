<x-form.layout title="{{ isset($role) ? 'Edit role, ' . $role->name : 'Add New role' }}"
    action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}" method="post">
    <div class="row">
        <div class="col-md-4">
            <x-input name="name" :value="isset($role) ? $role?->name : null" label="Name" type="text" placeholder="Type Name" />
        </div>
        <div class="col-md-12">
            <label class="mb-4">
                {{ translate('Permissions') }}
            </label>
            <div class="row m-0 p-0">
                @foreach($permissions as $permission)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <x-checkbox :checked="isset($role) && $role->hasPermissionTo($permission->name) ? true: false" name="permissions[]" label="{{ $permission->name }}" value="{{ $permission->id }}"></x-checkbox>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</x-form.layout>
