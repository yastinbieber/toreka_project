@extends('layouts.app')
@section('title', 'index画面')
@section('content')

<div class="container">
    @if (Auth::check())
        <p>ようこそ、{{ Auth::user()->name }}さん</p>
    @endif

    <a class="btn btn-info btn-sm" href="weightrecords/create">追加</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Date</td>
                <td>本日の体重</td>
                <td>体脂肪率</td>
                <td>期待値(体重推移)</td>
                <td>詳細</td>
                <td>編集</td>
                <td>削除</td>
            </tr>
        </thead>
        <tbody>
            @foreach($weightRecords as $weightRecord)
            <tr>
                <td>{{$weightRecord->date}}</td>
                <td>{{$weightRecord->today_weight}} Kg</td>
                <td>{{$weightRecord->body_fat_percentage}} %</td>
                <td>{{$weightRecord->expected_weight}} Kg</td>
                <td><a class="btn btn-primary btn-sm" href="{{ url('weightrecords/'.$weightRecord->id) }}">詳細</a></td>
                @can('update', $weightRecord)
                    <td><a class="btn btn-info btn-sm" href="{{ url('weightrecords/'.$weightRecord->id .'/' .'edit') }}">編集</a></td>
                @else <td></td>
                @endcan
                @can('delete', $weightRecord)
                    <td><button class="btn btn-danger btn-sm delete-post" data-route="{{ route('weightrecords.destroy', $weightRecord->id) }}">削除</button></td>
                @else <td></td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$weightRecords->links()}}
</div>

<script type="text/javascript">
    $(function(){

        $(document).on('click', '.delete-post', function() {

            var deletePost = $(this);

            if(confirm("本当に削除しますか?")) {

                $.ajax({
                    type: 'post',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: $(this).data('route'),
                    data: { '_method': 'delete' },
                    dataType:"json",
                })
                .done(function(data) {
                    deletePost.parents("tr").remove();
                    alertDanger(data.message);
                    console.log(data);
                })
                .fail(function(data) {
                    alert('error');
                });

            }

        })

        function alertDanger(message) {
            $('#alerts').append(
                '<div class="alert alert-danger" role="alert">' + message + '</div>'
            );
        }

    });
</script>

@endsection
