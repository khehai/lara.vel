<div class="flex items-center justify-center flex-wrap">

    @foreach ($products as $product)
        <x-app.product-item :product="$product" />
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
