<ul class="pagination pagination-lg">
    {{$users->appends(request()->query())->links()}}
</ul>
