<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            <h1>依頼修正／削除</h1>
        </div>
        
    <div>
        <a href="/tasks/index_r">一覧に戻る</a>
    </div>

{{$id}}

<!-- 依頼修正フォーム -->
        <form action="{{ url('tasks/update') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            
<!-- 依頼日時 -->
            <div class="form-group row">
                <label for="task_date" class="col-md-4 col-form-label text-md-right">業務日時</label>
                <div class="col-md-6">
                    <input id="task_date" type="datetime" class="form-control" name="task_date" value="{{$task->task_date}}">
                </div>
            </div>

<!-- 出発地 -->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">出発地</label>
                <div class="col-md-6">
                    <div id="myMap_dep" style='width:100%;height:300px;margin-left:auto;margin-right:auto;'></div>
                </div>
            </div>

<!-- 出発地（緯度） -->
            <div class="form-group row">
                <label for="dep_lat" class="col-md-4 col-form-label text-md-right">出発地（緯度）</label>
                <div class="col-md-6">
                    <input id="dep_lat" type="number" step="0.0000000000000001" class="form-control" name="dep_lat" value="{{$task['dep_lat']}}">
                </div>
            </div>
            
<!-- 出発地（経度） -->
            <div class="form-group row">
                <label for="dep_lon" class="col-md-4 col-form-label text-md-right">出発地（経度）</label>
                <div class="col-md-6">
                    <input id="dep_lon" type="number" step="0.0000000000000001" class="form-control" name="dep_lon" value="{{$task['dep_lon']}}">
                </div>
            </div>

<!-- 目的地 -->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">目的地</label>
                <div class="col-md-6">
                    <div id="myMap_des" style='width:100%;height:300px;margin-left:auto;margin-right:auto;'></div>
                </div>
            </div>

<!-- 目的地（緯度） -->
            <div class="form-group row">
                <label for="des_lat" class="col-md-4 col-form-label text-md-right">目的地（緯度）</label>
                <div class="col-md-6">
                    <input id="des_lat" type="number" step="0.0000000000000001" class="form-control" name="des_lat" value="{{$task['des_lat']}}">
                </div>
            </div>
            
<!-- 目的地（経度） -->
            <div class="form-group row">
                <label for="des_lon" class="col-md-4 col-form-label text-md-right">目的地（緯度）</label>
                <div class="col-md-6">
                    <input id="des_lon" type="number" step="0.0000000000000001" class="form-control" name="des_lon" value="{{$task['des_lon']}}">
                </div>
            </div>



<!-- 説明 -->
            <div class="form-group row">
                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('desc') }}</label>
                <div class="col-md-6">
                    <textarea name="desc" rows="4" cols="55" style="width:100%">{{$task['desc']}}</textarea>
                </div>
            </div>


<!-- ID値 -->
            <input type="hidden" name="id" value="{{$task['id']}}" />
<!-- 依頼修正ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary" onclick='return confirm("この内容で修正しますか？");'>
                        修正
                    </button>
                </div>
            </div>
        </form>

<!-- 依頼削除ボタン ※実装されない！ -->
            <div class="col-sm-offset-3 col-sm-6">
                <form action="{{ url('tasks/destroy/'.$task->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" onclick='return confirm("依頼を削除しますか？");'>
                        削除
                    </button>
                </form>
            </div>

    </div>

@endsection
