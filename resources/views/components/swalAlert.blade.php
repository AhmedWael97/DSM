@props([
    'title' => 'Are you sure?',
    'text' => "You will not be able to revert this!",
    'icon' => 'warning',
    'confirmBtnText' => 'Yes, delete it!',
    'successMessage' => 'Your file has been deleted.',
    'successText' => "Deleted!"
])

<script>
    $(document).ready(function() {
        $(document).on('click','.swal',function() {
            Swal.fire({
                title: "{{ $title }}",
                text: "{{ $text }}",
                icon: "{{ $icon }}",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "{{ $confirmBtnText }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: $(this).attr("url"),
                        success: function(result) {
                            Swal.fire({
                                title: "{{ $successText }}",
                                text: "{{ $successMessage }}",
                                icon: "success"
                            });
                            location.reload();
                        },
                        error: function(result) {
                            Swal.fire({
                                title: "{{ translate('failed') }}",
                                text: result.responseText,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    });
</script>
