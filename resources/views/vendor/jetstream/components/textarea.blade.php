@props(['limit' => 255, 'value' => ''])

<div
    x-data="{
        content: '{{ $value }}',
        limit: {{ $limit }},
        get remaining() {
            return this.limit - this.content.length
        }
    }"
>
<textarea
        x-model="content"
        maxlength="{{ $limit }}"
        {{ $attributes }}
></textarea>

    <p>
        <small>You have <span x-text="remaining"></span> characters remaining.</small>
    </p>
</div>
