<div class="table-responsive">
    <table class="table" id="linkStatistics-table">
        <thead>
        <tr>
            <th>Link Id</th>
        <th>User Ip</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($linkStatistics as $linkStatistic)
            <tr>
                <td>{{ $linkStatistic->link_id }}</td>
            <td>{{ $linkStatistic->user_ip }}</td>
            <td>{{ $linkStatistic->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['linkStatistics.destroy', $linkStatistic->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('linkStatistics.show', [$linkStatistic->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('linkStatistics.edit', [$linkStatistic->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
