@extends('layouts.app')

@section('content')
<div class="m-20">
    <div class="m-5">
        <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded">
            <a href="{{ route('admin.cursos.create') }}">Novo Curso</a>
    </div>
    @foreach($rows as $row)
        <ul role="list" class="divide-y divide-gray-100">
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex gap-x-4">

                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset($row->imagem) }}" alt="{{ $row->titulo }}">

                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $row->titulo }}</p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $row->descricao }}</p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Telefone: {{ $row->valor }}</p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">RA: {{ $row->publicado }}</p>
                </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <a href="{{ route('admin.cursos.edit', $row->id) }}">
                <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <x-fas-edit />            
                    </svg>
                    Edit
                    </button></a>

                    
                    <a href="{{ route('admin.cursos.destroy', $row->id) }}">
                    <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mt-2">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        {{ svg('heroicon-s-trash') }}
                    </svg>
                    Delete
                    </button></a>
            </div>
        </li>
    </ul>
  @endforeach
</div>
@endsection
