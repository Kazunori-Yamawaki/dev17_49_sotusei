<?php

namespace App\Http\Controllers;

use Auth;
use Datetime;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
// 依頼～一覧表示（管理用）
    public function index(){
        $tasks = Task::get();
        return view('tasks_index',compact('tasks'));        
     
    }

// 依頼～一覧表示（依頼者用）
    public function index_r(){
        $tasks = Task::where('r_user_id','=',Auth::user()->id)->get();
        return view('tasks_index_r',compact('tasks'));         
    }
    
// 依頼～一覧表示（請負者用）
    public function index_u(){
        $tasks = Task::where('r_user_id','!=',Auth::user()->id)
                        ->where('task_status_id','=','1')
                        ->get();
        return view('tasks_index_u',compact('tasks'));         
    }

// 依頼～一覧表示（請負者用２）
    public function index_u_2(){
        $tasks = Task::where('u_user_id','=',Auth::user()->id)->get();
        return view('tasks_index_u_2',compact('tasks'));         
    }


// 依頼～個別表示（管理用）
        public function show($id){
        $task = Task::find($id);
        return view('task_show',compact(['task','id'])); 
    }

// 依頼～個別表示（請負者用）
        public function show_r($id){
        $task = Task::find($id);
        return view('task_show_r',compact(['task','id'])); 
    }

// 依頼～個別表示（請負者用）
        public function show_u($id){
        $task = Task::find($id);
        return view('task_show_u',compact(['task','id'])); 
    }

// 依頼～新規登録画面表示
    public function create(){
        return view('tasks_create');
    }

// 依頼～登録
    public function store(Request $request){
        $r_time = new Datetime('now');
    
        $tasks = new Task;
        $tasks->r_user_id = Auth::id();//ログインユーザidを登録
        $tasks->task_date = $request->task_date;
        $tasks->dep_lat = $request->dep_lat;
        $tasks->dep_lon = $request->dep_lon;
        $tasks->des_lat = $request->des_lat;
        $tasks->des_lon = $request->des_lon;
        $tasks->desc = $request->desc;
        $tasks->r_charge = 200;//ダミー
        $tasks->u_reward = 180;//ダミー
        $tasks->o_fee = 20;//ダミー
        $tasks->r_time = $r_time;
        $tasks->task_status_id = 1;
        $tasks->save(); 
        return redirect('/tasks/index');
    }

// 依頼～修正画面表示
    public function edit($id){
        $task = Task::find($id);
        return view('task_edit',compact(['task','id']));
    }


// 依頼～更新
    public function update(Request $request){
        $tasks = Task::find($request->id);

        $tasks->task_date = $request->task_date;
        $tasks->dep_lat = $request->dep_lat;
        $tasks->dep_lon = $request->dep_lon;
        $tasks->des_lat = $request->des_lat;
        $tasks->des_lon = $request->des_lon;
        $tasks->desc = $request->desc;

        $tasks->save(); 
        return redirect('/tasks/index_r');
    }

// 依頼～削除
    public function destroy($id){
        Task::destroy($id);
        return redirect('/tasks/index')->with('success','依頼を削除しました');
    }

// 依頼～完了確認
    public function comfirm_accomplish(Request $request){
        $tasks = Task::find($request->id);
        
        $tasks->task_status_id = 4;

        $tasks->save(); 
        return redirect('/tasks/index_r')->with('success','完了を確認しました');
    }

// 請負
    public function undertake(Request $request){
        $tasks = Task::find($request->id);
        $u_time = new Datetime('now');
        
        $tasks->u_user_id = Auth::id();//ログインユーザidを登録
        $tasks->u_time = $u_time;
        $tasks->task_status_id = 2;

        $tasks->save(); 
        return redirect('/tasks/index_u_2')->with('success','依頼を請け負いました');
    }

// 請負～請負取下げ
    public function undertake_cancel(Request $request){
        $tasks = Task::find($request->id);
        
        $tasks->u_user_id = null;
        $tasks->u_time = null;
        $tasks->task_status_id = 1;

        $tasks->save(); 
        return redirect('/tasks/index_u_2')->with('success','請負を取り下げました');
    }

// 請負～完了確認依頼
    public function comfirmation_request(Request $request){
        $tasks = Task::find($request->id);
        
        $tasks->task_status_id = 3;

        $tasks->save(); 
        return redirect('/tasks/index_u_2')->with('success','完了確認を依頼しました');
    }

}
