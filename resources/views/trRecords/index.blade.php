@extends('layouts.app')
@section('title', 'index画面')
@section('content')

<div class="container">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div id="alerts"></div>

    @if (Auth::check())
        <p>ようこそ、{{ Auth::user()->name }}さん</p>
    @endif
    <a class="btn btn-info btn-sm" href="trrecords/create">追加</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Date</td>
                <td>Part</td>
                <td>menu</td>
                <td>set_type</td>
                <td>weight_first</td>
                <td>reps_first</td>
                <td>weight_second</td>
                <td>reps_second</td>
                <td>weight_third</td>
                <td>reps_third</td>
                <td>weight_fourth</td>
                <td>reps_fourth</td>
                <td>weight_fifth</td>
                <td>reps_fifth</td>
                <td>メモ</td>
                <td>詳細</td>
                <td>編集</td>
                <td>削除</td>
            </tr>
        </thead>
        <tbody>
            @foreach($trRecords as $trRecord)
            <tr>
                <td>{{$trRecord->tr_date}}</td>
                <td>{{$trRecord->part}}</td>
                <td>{{$trRecord->menu}}</td>
                <td>{{$trRecord->set_type}}</td>
                <td>{{$trRecord->weight_first}} Kg</td>
                <td>{{$trRecord->reps_first}} reps</td>
                <td>{{$trRecord->weight_second}} Kg</td>
                <td>{{$trRecord->reps_second}} reps</td>
                <td>{{$trRecord->weight_third}} Kg</td>
                <td>{{$trRecord->reps_third}} reps</td>
                <td>{{$trRecord->weight_fourth}} Kg</td>
                <td>{{$trRecord->reps_fourth}} reps</td>
                <td>{{$trRecord->weight_fifth}} Kg</td>
                <td>{{$trRecord->reps_fifth}} reps</td>
                <td>{{$trRecord->memo}}</td>
                <td><a class="btn btn-primary btn-sm" href="{{ url('trrecords/'.$trRecord->id) }}">詳細</a></td>
                @can('update', $trRecord)
                <td><a class="btn btn-info btn-sm" href="{{ url('trrecords/'.$trRecord->id .'/' .'edit') }}">編集</a></td>
                @else <td></td>
                @endcan
                @can('delete', $trRecord)
                <td><button class="btn btn-danger btn-sm delete-post" data-route="{{ route('trrecords.destroy', $trRecord->id) }}">削除</button></td>
                @else <td></td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$trRecords->links()}}
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

