@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの表示に使用するエラーファイル -->
  @inclue('common.errors')
  <!-- タスク登録フォーム -->
  <form action="{{ route('tasks.store')}}" method="POST" class="form-horizontal">
    @csrf
    <div class="from-group">
      <!-- タスク名 -->
      <div class="col-sm-6">
        <label for="task" class="col-sm-3 control-label">Task</label>
        <input type="text" name="task" id="task" class="form-control">
      </div>
    </div>
    <!-- タスク登録ボタン -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
  <!-- この下に登録済みタスクリストを表⽰ -->

</div>
@endsection