@extends('layouts.app')
@section('title', '403 错误')

@section('content')
  <div style="text-align: center">
    <h1>403 错误</h1>
    <p class="lead">
      {{ $exception->getMessage() ?: "禁止访问 Permission Denied" }}
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('root') }}" role="button">返回首页</a>
    </p>
  </div>
@stop
