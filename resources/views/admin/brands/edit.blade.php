@extends('layouts.main')
@section('title', $title)
@section('sidebar')
    @parent
     <p>This is appended to the master sidebar.</p>
@endsection
@section('content')


<style>
   .is-invalid {
    color: red !important;
    font-weight: 700;
   }
</style>
<h1>{{ $title }}</h1>

<form action="{{ route('admin.brands.update', $brand->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Name: </label>
        <input name="name" value="{{ old('name', $brand->name) }}" class="@error('name') is-invalid @enderror">
        @error('name')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Descriptiom: </label>
        <textarea name="description" class="@error('description') is-invalid @enderror">{{ old('description', $brand->description) }}</textarea>
        @error('description')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
    </div>
    
    <hr>
    <input type="submit" value="Update">
</form>
<p>This is my body content.</p>
@endsection
