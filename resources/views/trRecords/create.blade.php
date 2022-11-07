@extends('layouts.app')
@section('title', '作成画面')
@section('content')

<div class="container">
    <h4>トレーニングを登録する</h4>
    <div class="border rounded p-5">
        <form method="post" action="{{ url('/trrecords') }}" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- CSRF対策 -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="tr_date" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Part</label>
                <div class="col-sm-10">
                    <select class="form-control" name="part" id="" value="{{ old('part')}}">
                        <option selected="selected">胸</option>
                        <option>脚</option>
                        <option>肩</option>
                        <option>背中</option>
                        <option>二頭</option>
                        <option>三頭</option>
                        <option>腹</option>
                    </select>
                    @error('part')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Set_type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="set_type" id="" value="{{ old('set_type')}}">
                        <option selected="selected">ノーマルセット</option>
                        <option>スーパーセット</option>
                        <option>ドロップセット</option>
                        <option>ジャイアントセット</option>
                        <option>その他(メモ欄へ)</option>
                    </select>
                    @error('set_type')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Menu</label>
                <div class="col-sm-10">
                    <input type="text" name="menu" class="form-control" value="{{ old('menu')}}" placeholder="メニューを入力ください">
                    @error('menu')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <!-- 1set 必須は1セットのみ-->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">WeightFirst</label>
                <div class="col-sm-10">
                    <input type="number" name="weight_first" class="form-control" value="{{ old('weight_first')}}" placeholder="重量を入力ください" min="0">
                    @error('weight_first')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">RepsFirst</label>
                <div class="col-sm-10">
                    <input type="number" name="reps_first" class="form-control" value="{{ old('reps_first')}}" placeholder="回数を入力ください" min="0">
                    @error('reps_first')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <!-- 2set -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">WeightSecond</label>
                <div class="col-sm-10">
                    <input type="number" name="weight_second" class="form-control" value="{{ old('weight_second')}}" placeholder="重量を入力ください" min="0">
                    @error('weight_second')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">RepsSecond</label>
                <div class="col-sm-10">
                    <input type="number" name="reps_second" class="form-control" value="{{ old('reps_second')}}" placeholder="回数を入力ください" min="0">
                    @error('reps_second')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <!-- 3set -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">WeightThird</label>
                <div class="col-sm-10">
                    <input type="number" name="weight_third" class="form-control" value="{{ old('weight_third')}}" placeholder="重量を入力ください" min="0">
                    @error('weight_third')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">RepsThird</label>
                <div class="col-sm-10">
                    <input type="number" name="reps_third" class="form-control" value="{{ old('reps_third')}}" placeholder="回数を入力ください" min="0">
                    @error('reps_third')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <!-- 4set -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">WeightFourth</label>
                <div class="col-sm-10">
                    <input type="number" name="weight_fourth" class="form-control" value="{{ old('weight_fourth')}}" placeholder="重量を入力ください" min="0">
                    @error('weight_fourth')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">RepsFourth</label>
                <div class="col-sm-10">
                    <input type="number" name="reps_fourth" class="form-control" value="{{ old('reps_fourth')}}" placeholder="回数を入力ください" min="0">
                    @error('reps_fourth')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <!-- 5set -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">WeightFifth</label>
                <div class="col-sm-10">
                    <input type="number" name="weight_fifth" class="form-control" value="{{ old('weight_fifth')}}" placeholder="重量を入力ください" min="0">
                    @error('weight_fifth')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">RepsFifth</label>
                <div class="col-sm-10">
                    <input type="number" name="reps_fifth" class="form-control" value="{{ old('reps_fifth')}}" placeholder="回数を入力ください" min="0">
                    @error('reps_fifth')
                    <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Memo</label>
                <div class="col-sm-10">
                    <input type="text" name="memo" class="form-control" value="{{ old('memo')}}" placeholder="メモ">
                    @error('memo')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>


            <input class="btn btn-info btn-sm" type="submit" value="送信">
            <a class="btn btn-success btn-sm" href="/trrecords">戻る</a>
        </form>
    </div>
</div>

@endsection
