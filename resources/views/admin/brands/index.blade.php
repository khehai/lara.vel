<h1>{{ $title }}</h1>
Current UNIX-time: {{ time() }}
{{-- @php
    dump($brands)
@endphp --}}

{{-- {!! $html !!} --}}
{{-- Comments --}}

{{--
    Block comments
    --}}

    {{-- @{{ name }} --}}

{{-- @if(count($brands) > 0)
    brands
@else
    <p>No brands yet</p>
@endif
@unless(!count($brands) > 0)
    Test text
@endunless
@empty($brands)
    <p>No brands yet</p>
@endempty
@isset($brands)
    brands
@endisset --}}

{{-- @foreach ($brands as $brand)
    <li>{{ $brand->name }}</li>
@endforeach --}}


<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @forelse ( $brands as $brand )
    <tr>
        <td>{{ $brand->id }}</td>
        <td>{{ $brand->name }}</th>
        <td>
            <a href="{{ route('admin.brands.edit', $brand->id) }}"><button>Edit</button></a>
            <form method="POST" action="{{ route('admin.brands.destroy', $brand->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </td>
    </tr>
    @empty
    <p>No brands yet</p>
    @endforelse
</table>

    {{-- <li>{{ $brand->id }} => {{ $brand->name }}</li> --}}


<p>Copyright &copy; {{ date('Y') }}</p>
