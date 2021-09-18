<div class="table-responsive">
    <table class="table" id="linkstatistics-table">
        <thead>
        <tr>
            <th>Link Id</th>
        <th>User Ip</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($linkstatistics as $linkStatistic)
            <tr>
                <td>{{ $linkStatistic->link_id }}</td>
            <td>{{ $linkStatistic->user_ip }}</td>
            <td>{{ $linkStatistic->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['linkstatistics.destroy', $linkStatistic->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('linkstatistics.show', [$linkStatistic->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('linkstatistics.edit', [$linkStatistic->id]) }}"
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
