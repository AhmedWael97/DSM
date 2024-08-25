@extends('admin.layout.app')
@section('page-title')
    DSM | Roles and persmissions
@endsection
@section('content')
    <x-tables.container title="Manage Roles and permission" createTitle="Create New Role" :createUrl=" route('roles.create') ">
       <table class="table table-bordered" id="roles">
            <thead>
                <th>
                    #
                </th>
                <th>
                    {{ translate("Name") }}
                </th>
                <th>
                    {{ translate("Permissions") }}
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
      var table = $('#roles').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('roles.ajax') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'permissions', name: 'permissions'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });  
    });
</script>

<x-swalAlert></x-swalAlert>
@endsection