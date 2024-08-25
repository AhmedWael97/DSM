<x-form.layout title="{{ isset($user) ? 'Edit User, '. $user->name : 'Add New User' }}" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="post">
   <div class="row">
    <div class="col-md-4">
        <x-input name="name" :value="isset($user) ? $user?->name : null" label="Name" type="text" placeholder="Type Name" />
    </div>
    <div class="col-md-4">
        <x-input name="email" :value="isset($user) ? $user?->email : null" label="Email" type="email" placeholder="Type Email" />
    </div>
    <div class="col-md-4">
        <x-input name="mobile" :value="isset($user) ? $user?->mobile : null" label="Mobile" type="tel" placeholder="(+1) XXXXXXXX" />
    </div>
    <div class="col-md-4">
        <x-select  name="role_id" label="Role">
            @foreach($roles as $role)
                <option {{ isset($user) && count($user?->roles) >= 1 ? $user->roles[0]->id == $role->id ? "selected" : "" : "" }} value="{{ $role->id }}">
                    {{ $role->name }}
                </option>
            @endforeach
        </x-select>
    </div>
    <div class="col-md-4">
        <x-input name="password" label="Password" type="password" placeholder="*********" />
    </div>
    <div class="col-md-4">
        <x-input name="password_confirmation" label="Confirm Password" type="password" placeholder="*********" />
    </div>
   </div>
</x-form.layout>
