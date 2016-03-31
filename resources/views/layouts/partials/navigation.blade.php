<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">

        <li class="">
            {!! Html::decode(link_to_route('dashboard.index', '<i class="fa fa-tachometer"></i> Dashboard', [], ['class' => 'small button'])) !!}

        </li>

        <li class="panel active">
            <a class="accordion-toggle " data-toggle="collapse"
               data-parent="#side-nav" href="#transactions-collapse">
                <i class="fa fa-money"></i> <span class="name">Transactions</span>
            </a>
            <ul id="transactions-collapse" class="panel-collapse collapse in">
                <li class="active">{!! Html::linkRoute('income.create', 'Income') !!}</li>
                <li class="active">{!! Html::linkRoute('expense.create', 'Expense') !!}</li>
            </ul>
        </li>

        <li class="panel active">
            <a class="accordion-toggle " data-toggle="collapse"
               data-parent="#side-nav" href="#reports-collapse">
                <i class="fa fa-file-text"></i> <span class="name">Reports</span>
            </a>
            <ul id="reports-collapse" class="panel-collapse collapse in">
                <li class="active">{!! Html::linkRoute('report.income', 'Income') !!}</li>
            </ul>
        </li>

    </ul>
</nav>