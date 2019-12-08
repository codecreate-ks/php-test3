@extends('layouts.helloapp')

@section('title','Person.Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
    <tr><th>Person</th><th>Board</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
            @if ($item->boards != null)
                <table width="100%">
                @foreach ($item->boards as $obj)
                    <tr><td>{{$obj->getData()}}</td></tr>
                @endforeach
                </table>
            @endif
            </td>
        </tr>
    @endforeach
    </table>
    <?php var_dump($items)?>
    <?php echo '<br><br>'?>
    <?php var_dump($obj) ?>
@endsection

@section('footer')
copyright 2020 xxx.
@endsection