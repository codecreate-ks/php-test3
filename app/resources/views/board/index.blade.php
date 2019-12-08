@extends('layouts.helloapp')

@section('title','Board.Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <?php var_dump($items) ?>
    <table>
    <tr><th>Data</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
    @endforeach
    </table>
@endsection

@section('footer')
copyright 2020 xxx.
@endsection