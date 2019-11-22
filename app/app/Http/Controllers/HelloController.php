<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{

    public function __invoke(){

return <<<EOF
<html>
<head>
<title>Hello</title>
<style>
    body {
    font-size: 16px;
    color: #999;
    }
    h1 {
    font-size: 100px;
    text-align: right;
    color: #eee;
    margin: 0px 0px -50px 0px;
    }
</style>
</head>
<body>
    <h1>Single Action</h1>
    <p>これは、シングルアクションコントラーラのアクションです。</p>
</body>
</html>
EOF;

    }
}