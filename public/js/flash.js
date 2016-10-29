$('button.btn-danger').on('click', function(e) {
    e.preventDefault();
    var self = $(this);
    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, Cancel delete!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Item has been deleted", "success");
                setTimeout(function() {
                    self.parents("#del").submit();
                }, 1000); //1 second delay (1000 milliseconds = 1 second)
            } else {
                swal("cancelled", "The item is safe", "error");
            }
        });
});
