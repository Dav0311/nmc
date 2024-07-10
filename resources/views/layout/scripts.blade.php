
<script>
        $(document).ready(function () {
            // $('#ajaxform').click(function () {
            //     $('#createForm').show();
            // });

            console.log("testing...");
        });
   
        document.addEventListener("DOMContentLoaded", function() {
            var successAlert = document.getElementById('trigger');
            if (successAlert) {
                // Refresh the page
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            }

        });
       
        $(document).ready(function () {
            $('.cp_link').on('click', function () {
                var value = $(this).attr('data-link');
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(value).select();
                document.execCommand("copy");
                $temp.remove();
                toast("Link copied to Clipboard", "bg-success");
            });
        });

        function toast(message, className) {
            alert(message); 
        }

        
</script>