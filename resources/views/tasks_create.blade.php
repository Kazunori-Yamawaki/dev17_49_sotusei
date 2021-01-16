<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            <h1>新しく業務を依頼する</h1>
        </div>
        
<!-- 依頼登録フォーム -->
        <form action="{{ url('tasks/store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            
<!-- 依頼日時 -->
            <div class="form-group row">
                <label for="task_date" class="col-md-4 col-form-label text-md-right">業務日時</label>
                <div class="col-md-6">
                    <input id="task_date" type="datetime-local" class="form-control" name="task_date">
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
                    <input id="dep_lat" type="number" step="0.0000000000000001" class="form-control" name="dep_lat" value="dep_lat">
                </div>
            </div>
            
<!-- 出発地（経度） -->
            <div class="form-group row">
                <label for="dep_lon" class="col-md-4 col-form-label text-md-right">出発地（経度）</label>
                <div class="col-md-6">
                    <input id="dep_lon" type="number" step="0.0000000000000001" class="form-control" name="dep_lon">
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
                    <input id="des_lat" type="number" step="0.0000000000000001" class="form-control" name="des_lat">
                </div>
            </div>
            
<!-- 目的地（経度） -->
            <div class="form-group row">
                <label for="des_lon" class="col-md-4 col-form-label text-md-right">目的地（緯度）</label>
                <div class="col-md-6">
                    <input id="des_lon" type="number" step="0.0000000000000001" class="form-control" name="des_lon">
                </div>
            </div>
<!-- 説明 -->
            <div class="form-group row">
                <label for="desc" class="col-md-4 col-form-label text-md-right">説明</label>
                <div class="col-md-6">
                    <textarea name="desc" rows="4" cols="55" style="width:100%">（記入例：【出発地】から【目的地】まで）</textarea>
                </div>
            </div>

<!-- 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        登録
                    </button>
                </div>
            </div>
            
        </form>
    </div>

@endsection
