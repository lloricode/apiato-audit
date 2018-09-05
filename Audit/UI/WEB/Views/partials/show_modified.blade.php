<div class="col-md-8">
    <div class="box">
        <div class="box-header">
            Changes
        </div>
        <div class="box-body no-padding">
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        <th width="20%">Attributes</th>
                        <th>Values</th>
                    </tr>

                    @foreach ($modified as $field => $value)
                        <tr>
                            <td>{{ $field }}</td>
                            <td>
                                @foreach ($value as $key => $val)
                                    <span class="label label-{{ $key == 'new' ? 'success' : 'default' }}">{{ $key }}</span>
                                    <span>{{ $val }}</span>
                                    <br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
