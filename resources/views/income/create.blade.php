@extends('layouts.master')
@section('main-body')

    <h2 class="page-title">Income
        <small>Transaction</small>
    </h2>

    <div class="row">
        <div class="col-md-8">
            <section class="widget">
                <header>
                    <h4>
                        <i class="fa fa-list-alt"></i> Create New Income Transaction
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

                    {!! Form::open(['route' => ['income.store']]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('type', 'Income Type') !!} <br>
                            {!! Form::select(
                            'type',
                            $incomeList,
                            'grab',
                            ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('amount', 'Amount') !!}
                            {!! Form::text('amount', '0', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('transaction_date_time', 'Income Date') !!}
                            {!! Form::text('transaction_date_time', '', ['class' => 'form-control transactions-date-picker']) !!}
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
                                    {!! Form::submit('Save Transaction', ['class' => 'btn btn-primary']) !!}
                                    {!! Html::linkRoute('income.create', 'Cancel',[], ['class' => 'btn btn-default']) !!}
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
    <script type="text/javascript">

        $(document).ready(function(){
            $('.transactions-date-picker').datetimepicker({
                format: 'YYYY-MM-DD hh:mm:ss',
                showClear: true,
                defaultDate: new Date(),
                maxDate: new Date()
            });
        });

    </script>
@endsection
