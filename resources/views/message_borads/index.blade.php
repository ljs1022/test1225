<script src="{{ asset('js/jquery.js')}}"></script>
<a href="{{ route('message_borads.create') }}">新增</a>

<table border="1">
    <thead>
        <tr>
            <td>ID</td>
            <td>content</td>
            <td>created_at</td>
            <td>del</td>
            <td>edit</td>
        </tr>
    </thead>
    <tbody>
        @foreach($contents as $content)
        <tr>
            <td>{{ $content->id }}</td>
            <td>{!! nl2br(htmlspecialchars($content->content)) !!}</td>
            <td>{{ $content->created_at }}</td>
            <td><button data-url="{{ route('message_borads.delete',['id'=>$content->id]) }}">刪除</button></td>
            <td><a href="{{ route('message_borads.edit',['id'=>$content->id]) }}">編輯</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    let post_url = "{{ route('message_borads.store') }}";

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

        $('button').click(function(){

            if(!confirm('確定刪除')){
                return false;
            }

            let post_url = $(this).data('url');
            let params = {
                "_token": "{{ csrf_token() }}"
            };

            $.post(post_url, params, function(response){

                alert(response.message);

                if(response.status){
                    location.href = response.url;
                }
            });

            return false;
        });

    });

</script>
