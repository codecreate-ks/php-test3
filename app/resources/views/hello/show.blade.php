@extends('layouts.helloapp')

@section('title','Show')

@section('menubar')
    @parent
    詳細ページ
@endsection

@section('content')
    <?php var_dump($items) ?>
    @if ($items != null)
        @foreach ($items as $item)
        <table width="400px">
            <tr>
                <th width="50px">id:</th><td>{{$item->id}}</td>
                <th width="50px">name:</th><td>{{$item->name}}</td>
            </tr>
        </table>
        @endforeach
    @endif
@endsection

@section('footer')
copyright 2020 xxx.
@endsection