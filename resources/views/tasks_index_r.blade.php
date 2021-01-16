@extends('layouts.app')

@section('content')

<h1>依頼一覧（自分が依頼した業務を見る／修正する／削除する）</h1>

@if (count($tasks) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <tr>
                            <th>業務日時</th>
                            <th>依頼者</th>
                            <th>説明</th>
                            <th>状態</th>
                            <th>請負者</th>
                            <th>詳細表示</th>
                        </tr>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->task_date }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->r_user->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->desc }}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                @if($task->task_status_id==1)
                                    依頼中（請負可）
                                @elseif($task->task_status_id==2)
                                    請負済
                                @elseif($task->task_status_id==3)
                                    完了確認依頼中
                                @elseif($task->task_status_id==4)
                                    完了確認済
                                @endif
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->u_user->name }}</div>
                            </td>
                            <td class="table-text">
                                <a href="/tasks/show_r/{{ $task->id }}">詳細</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif
    
    @endsection
