@extends('layouts.master')
@section('main-body')


    <h2 class="page-title">Income
        <small>Reports</small>
    </h2>

    <div class="row">
        <div class="col-md-12">
            <section class="widget">
                <header>
                    <h4>
                        <i class="fa fa-cogs"></i> Income Reports
                    </h4>
                </header>
                <div class="body">
                    <div class="mt">
                        <table class="table table-striped table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th class="no-sort">Type</th>
                                <th class="hidden-xs">Remarks</th>

                            </tr>
                            </thead>
                            <tbody>

                            @forelse($incomes as $income)
                                <tr>
                                    <td>{!! $income->transaction_date_time !!}</td>
                                    <td>{!! $income->amount !!}</td>
                                    <td class="width-150">{!! $income->type !!}</td>
                                    <td class="hidden-xs">{!! $income->remarks !!}</td>
                                </tr>
                            @empty
                                <p>No users</p>
                            @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    </div>

@endsection

@section('module-scripts')

    <script text="text/javascript">

        $(document).ready(function () {
            $('.dataTablisizer').DataTable({
                "order": [[0, 'desc']]
            });
            $('.dataTables_filter').remove();
            $('.dataTables_length').remove();
            $('.paginate_button').addClass('btn btn-xs btn-primary');
        });

    </script>

@endsection
