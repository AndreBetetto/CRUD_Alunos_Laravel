@extends('layouts.app')


@section('content')
<form class="" action="{{route('admin.cursos.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('admin.cursos._form')
    <div class="mt-6 flex items-center justify-end gap-x-6 ">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
    <div class="mt-20">
        <div class="border-t border-gray-200"></div>
  </form>
@endsection
