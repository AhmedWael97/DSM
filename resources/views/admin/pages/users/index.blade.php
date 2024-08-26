@extends('admin.layout.app')
@section('page-title')
    DSM | Users and employees
@endsection
@section('content')
    <x-tables.container title="Manage Users" createRoleName="Users_Create" createTitle="Create New User" :createUrl="route('users.create') ">
       <table class="table table-bordered" id="users">
            <thead>
                <th>
                    #
                </th>
                <th>
                    {{ translate("Name") }}
                </th>
                <th>
                    {{ translate("E-mail") }}
                </th>
                <th>
                    {{ translate("Mobile") }}
                </th>
                <th>
                    {{ translate("Role") }}
                </th>
                <th>
                    {{ translate("Actions") }}
                </th>
            </thead>
       </table>
    </x-tables.container>
@endsection

@section('script')
<script type="text/javascript">
    $(function () {   
      var table = $('#users').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('users.ajax') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'mobile', name: 'mobile'},
              {data: 'role', name: 'role'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });  
    });
</script>

<x-swalAlert></x-swalAlert>
@endsection