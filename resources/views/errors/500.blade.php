@extends ('errors.layout')

@section ('title', '500 - Erro interno do servidor')

@section ('message', '500 - ' . $exception->getMessage())
