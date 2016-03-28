<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">

        <li class="">
            <a href="index.html"><i class="fa fa-home"></i> <span class="name">Dashboard</span></a>
        </li>

        <li class="panel active">
            <a class="accordion-toggle " data-toggle="collapse"
               data-parent="#side-nav" href="#forms-collapse">
                <i class="fa fa-pencil"></i> <span class="name">Transactions</span>
            </a>
            <ul id="forms-collapse" class="panel-collapse collapse in">
                <li class="active">{!! Html::linkRoute('income.create', 'Income') !!}</li>
                <li class="active">{!! Html::linkRoute('expense.create', 'Expense') !!}</li>
            </ul>
        </li>

        <li class="">
            <a href="index.html"><i class="fa fa-home"></i> <span class="name">Reports</span></a>
        </li>

    </ul>
</nav>