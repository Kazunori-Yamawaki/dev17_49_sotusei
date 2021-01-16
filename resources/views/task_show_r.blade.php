@extends('layouts.app')

@section('content')
<div>
    <a href="/tasks/index_r">一覧に戻る</a>
</div>

{{$id}}

<div>
    <table class="table table-striped task-table">
        <tr>
            <td>業務日時</td>
            <td>{{$task['task_date']}}</td>
        </tr>
        <tr>
            <td>依頼者</td>
            <td>{{$task->r_user->name}}</td>
        </tr>
        <tr>
            <td>出発地（緯度）</td>
            <td>{{$task['dep_lat']}}</td>
        </tr>
        <tr>
            <td>出発地（経度）</td>
            <td>{{$task['dep_lon']}}</td>
        </tr>
        <tr>
            <td>目的地（緯度）</td>
            <td>{{$task['des_lat']}}</td>
        </tr>
        <tr>
            <td>目的地（経度）</td>
            <td>{{$task['des_lon']}}</td>
        </tr>
        <tr>
            <td>説明</td>
            <td>{{$task['desc']}}</td>
        </tr>
        <tr>
            <td>利用料金額</td>
            <td>{{$task['r_charge']}}円</td>
        </tr>
        <tr>
            <td>請負報酬額（利用料金額に含まれる）</td>
            <td>{{$task['u_reward']}}円</td>
        </tr>
        <tr>
            <td>運営手数料額（利用料金額に含まれる）</td>
            <td>{{$task['o_fee']}}円</td>
        </tr>
        <tr>
            <td>依頼日時</td>
            <td>{{$task['r_time']}}</td>
        </tr>
        <tr>
            <td>状態</td>
            <td>                                
                @if($task->task_status_id==1)
                    依頼中（請負可）
                @elseif($task->task_status_id==2)
                    請負済
                @elseif($task->task_status_id==3)
                    完了確認依頼中
                @elseif($task->task_status_id==4)
                    完了確認済
                @endif
            </td>
        </tr>
        <tr>
            <td>請負者</td>
            <td>{{$task->u_user->name}}</td>
        </tr>
        <tr>
            <td>請負日時</td>
            <td>{{$task['u_time']}}</td>
        </tr>
    </table>
</div>


<div class="col-sm-offset-3 col-sm-6"　style="display:table-cell">
@if($task['task_status_id']<3)
    <a href="/tasks/edit/{{ $task->id }}"><button type=button>依頼修正／削除</button></a>
@endif
@if($task['task_status_id']==3)
    <form action="{{ url('/tasks/comfirm_accomplish') }}" method="POST" class="form-horizontal">
        @csrf
        <!-- ID値を送る -->
        <input type="hidden" name="id" value="{{$task['id']}}" />
        <button type="submit" onclick='return confirm("依頼の完了を確認しますか？");'>
            依頼完了確認
        </button>
    </form>
@endif
</div>

@endsection