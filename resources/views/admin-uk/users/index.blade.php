@extends('admin.layout.app')

@section('content')
<style>
    .rounded-select {
        border-radius: 8px;
    }
</style>
<section id="content-section">
    <div class="page-container">

        @include('admin.layout.links')
        <div class="select-bar">
            <div class="select-block">
                <div class="filter-options mb-3">
                    <form method="GET" action="{{ url('admin/users') }}">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12"> <!-- Adjust column size here -->
                                <select name="filter" onchange="this.form.submit()" class="form-select rounded-select">
                                    <option value="" {{ request('filter') == null ? 'selected' : '' }}>All Users</option>
                                    <option value="no-rides" {{ request('filter') == 'no-rides' ? 'selected' : '' }}>Users with
                                        No Rides</option>
                                </select>
                            </div>
                            <div class="col col-md-8 col-sm-12 xs-12">
                                <div class="bluk-search-bar">
                                    <div class="gerenric-search-bar">
                                        <div class="search-bar">
                                            <div class="search-block">
                                                <input type="text" class="search-input search" placeholder="Search" name="search">
                                                <input type="button" class="search-icon" onclick="this.form.submit()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    </form>
                </div>
            </div>
        </div>


        <div class="gerenric-bulk-actions mt-3 bulk-actions-links-equail bluk-width-auto">

        </div>
        <div class="gerenric-bulk-actions justify-right position-relative">

        </div>
        <div class="admin-page pt-4 pb-5">

            @include('admin.users.table')
            <div class="gerenric-pagination">
                @include('admin.users.pagination')
            </div>

        </div>

    </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
function exportTableToExcel(tableID, filename = ''){

    let password = prompt("Enter Password To Download The record ");
    if (password === null || password === "" || password !="{{ env('USER_EXPORT_PASSWORD') }}") {
        alert("Please Enter Valid password to Download The data");
        return;
    }

    // filename = 'Users-'+Date.now();
    // var wb = XLSX.utils.table_to_book(document.getElementById(tableID), {sheet:"Sheet 1"});
    // XLSX.writeFile(wb, filename + ".xlsx");

    var filter = $('[name="filter"]').val(),
        search = $('[name="search"]').val();

    var form_data = {
        filter:filter,
        search:search
    };

    let url = `{{ route('admin.export.users') }}?filter=${filter}&search=${search}`;
    window.location.href = url;
}
</script>
<script>

</script>
@endsection