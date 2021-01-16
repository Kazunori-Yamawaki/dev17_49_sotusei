@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h1>メインメニュー</h1>
                </div>

                <div class="links">
                    <h2>【依頼用メニュー】</h2>
                    <ul>
                        <li><a href="/tasks/create">新しく業務を依頼する</a></li>
                        <li><a href="/tasks/index_r">自分が依頼した業務を見る／修正する／削除する</a></li>
                    </ul>
                    
                    <h2>【請負用メニュー】</h2>
                    <ul>
                        <li><a href="/tasks/index_u">請け負うことができる業務を見る／請け負う</a></li>
                        <li><a href="/tasks/index_u_2">自分が請け負った業務を見る／請負を取り下げる</a></li>
                    </ul>
                    
                    <h2>【その他メニュー】</h2>
                    <ul>
                        <li><a href="/users/edit">自分の利用者情報を更新する／退会する（未実装）</a></li>
                    </ul>
                    
                    @if(Auth::user()->auth_id==2)
                        <h2>【管理用メニュー】</h2>
                        <ul>
                            <li><a href="/tasks/index">全ての業務の一覧を見る</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
@endsection
