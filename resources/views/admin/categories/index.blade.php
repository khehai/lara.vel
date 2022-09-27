<h1>{{ $title }}</h1>

Current UNIX-time: {{ time() }}
{{-- @php
    dump($categories)
@endphp --}}

{{-- {!! $html !!} --}}
{{-- Comments --}}

{{--
    Block comments
    --}}

    {{-- @{{ name }} --}}

{{-- @if(count($categories) > 0)
    categories
@else
    <p>No categories yet</p>
@endif
@unless(!count($categories) > 0)
    Test text
@endunless
@empty($categories)
    <p>No categories yet</p>
@endempty
@isset($categories)
    categories
@endisset --}}

{{-- @foreach ($categories as $category)
    <li>{{ $category->name }}</li>
@endforeach --}}


<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @forelse ( $categories as $category )
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</th>
        <td>{{ $category->status }}</td>
        <td>
            <a href="{{ route('admin.categories.edit', $category->id) }}"><button>Edit</button></a>
            <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </td>
    </tr>
    @empty
    <p>No categories yet</p>
    @endforelse
</table>

    {{-- <li>{{ $category->id }} => {{ $category->name }}</li> --}}


<p>Copyright &copy; {{ date('Y') }}</p>
