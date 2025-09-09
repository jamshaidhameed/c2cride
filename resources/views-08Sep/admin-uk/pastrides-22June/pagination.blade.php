<ul class="pagination pagination-lg">
    {{$rides->appends(request()->query())->links()}}
</ul>
