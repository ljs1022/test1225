<script src="{{ asset('js/jquery.js')}}"></script>

<form id="main-form">
    @method('post')
    @csrf
    內容:<textarea name="content">{{ $MessageBorad->content }}</textarea>
    <button id="submit_button">送出</button>
</form>

<script>
        let post_url = "{{ route('message_borads.update' , ['id' => $id]) }}";

        $( document ).ready(function() {

            // $('#submit_button').click(function () {
            //
            //     $.post(post_url, $('form').serializeArray(), function(response){
            //
            //         console.log(response);
            //         return false;
            //     }, 'json');
            //
            //     return false;
            // });

            $('#submit_button').click(function(){

                $.post(post_url, $("#main-form").serializeArray(), function(response){

                    //location.href = response.url;
                });

                return false;
            });

        });

</script>
