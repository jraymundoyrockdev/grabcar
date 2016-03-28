@extends('layouts.master')
@section('main-body')

    <h2 class="page-title">Income
        <small>Transaction</small>
    </h2>

    <div class="row">
        <div class="col-md-12">
            <section class="widget">
                <header>
                    <h4>
                        <i class="fa fa-cogs"></i> Create New Income Transaction
                    </h4>
                </header>

                <div class="body">

                    @if(Session::has('flash_success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong><i class="fa fa-check"></i> Saved!</strong> transaction recorded.
                        </div>
                    @endif

                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li><i class="fa fa-exclamation-triangle"></i> {!! $error !!}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['route' => ['transactions.store']]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('type', 'Income Type') !!} <br>
                            {!! Form::select(
                            'type',
                            ['grab' => 'GRAB', 'rent' => 'RENT'],
                            'grab',
                            ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fare', 'Rider Fare') !!}
                            {!! Form::text('fare', '0', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('trip_date_time', 'Trip Date') !!}
                            {!! Form::text('trip_date_time', '', ['class' => 'form-control date-picker']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('discount', 'Discount (optional)') !!}
                            {!! Form::text('discount', '0', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('remarks', 'Remarks (optional)') !!}
                            {!! Form::textarea('remarks', null, ['class' => 'form-control', 'size' => '30x2']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::hidden('created_by', '3', ['class' => 'form-control' ,'readonly' => 'readonly']) !!}
                        </div>

                        <div class="form-actions">
                            <div class="row text-align-right">
                                <div class="col-sm-8 col-sm-offset-4">
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                    {!! Html::linkRoute('transactions.index', 'Cancel',[], ['class' => 'btn btn-default']) !!}
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>

@endsection

@section('module-scripts')
    {!! Html::script('js/lib/bootstrap-select.min.js') !!}
    {!! Html::script('js/lib/select2.min.js') !!}
    {!! Html::script('js/lib/moment.js') !!}
    {!! Html::script('js/lib/bootstrap-datetimepicker.min.js') !!}
    <script type="text/javascript">
        $(function () {
            $('.date-picker').datetimepicker({
                format: 'YYYY-MM-DD hh:mm:ss',
                showClear: true,
                defaultDate: new Date(),
                maxDate: new Date()
            });
        });
    </script>
@endsection
