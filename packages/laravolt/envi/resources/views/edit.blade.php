@extends('ui::layouts.app')

@section('content')
    <h1>Ini halaman ENVI</h1>
    {!! SemanticForm::open()->put()->action(route('envi::update')) !!}
    @foreach($variables as $k => $v)
    {!! SemanticForm::text($v, env($v))->label($v); !!}
    @endforeach
    {!! SemanticForm::submit('Simpan'); !!}
    {!! SemanticForm::close() !!}
@stop