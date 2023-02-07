@php
    $search = request('search');
@endphp
<div id="results">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>
                    {{ $heading }}
                </h4>
            </div>
            <div class="col-md-6">
                <div class="search_bar_list">
                    <form action="/faculties">
                        @if ($search)
                            <input type="text" name="search" class="form-control"
                                placeholder="Ex. Initial, Department, Name..." value="{{ $search }}" />
                        @else
                            <input type="text" name="search" class="form-control"
                                placeholder="Ex. Initial, Department, Name..." />
                        @endif
                        <input type="submit" value="Search" />
                    </form>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /results -->
