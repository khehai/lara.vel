<style>
   .is-invalid {
    color: red !important;
    font-weight: 700;
   }
</style>
<h1>{{ $title }}</h1>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div>
        <label>Name: </label>
        <input name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
        @error('name')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Descriptiom: </label>
        <textarea name="description" class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Status: </label>
        <input type="checkbox" name="status">
    </div>
    <hr>
    <input type="submit" value="Create">
</form>
