<div>
    @foreach ($products as $product)
        <div class="mb-6">
            <h1 class="text-xl">#{{ $product->id }} {{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
        </div>
    @endforeach

    <div x-data="{
        observe(){
            let observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if(entry.isIntersecting){
                        @this.call('loadMore')
                    }
                })
            },
            {
                root:null
            })
            observer.observe(this.$el)
        }
    }"
    x-init="observe"
    ></div>

    @if($products->hasMorePages())
        <button wire:click.prevent="loadMore">Load more</button>
    @endif
</div>