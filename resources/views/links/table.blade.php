<div class="table-responsive">
    <table class="table" id="links-table">
        <thead>
        <tr>
            <th>Original</th>
        <th>Masked</th>
        <th>Valid</th>
        <th>Password</th>
        <th>Expiration Date</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($links as $link)
            <tr>
                <td>{{ $link->original }}</td>
            <td>{{ $link->masked }}</td>
            <td>{{ $link->valid }}</td>
            <td>{{ $link->password }}</td>
            <td>{{ $link->expiration_date }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['links.destroy', $link->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('links.show', [$link->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('links.edit', [$link->id]) }}"
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
