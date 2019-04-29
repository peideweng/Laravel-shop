@if($order->ship_status === \App\Models\Order::SHIP_STATUS_PENDING)
    @if($order->refund_status !== \App\Models\Order::REFUND_STATUS_SUCCESS)
        <tr>
            <td colspan="4">
                <form action="{{ route('admin.orders.ship', [$order->id]) }}" method="post" class="form-inline">
                    <!-- 别忘了 csrf token 字段 -->
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('express_company') ? 'has-error' : '' }}">
                        <label for="express_company" class="control-label">物流公司</label>
                        <input type="text" id="express_company" name="express_company" value="" class="form-control"
                               placeholder="输入物流公司">
                        @if($errors->has('express_company'))
                            @foreach($errors->get('express_company') as $msg)
                                <span class="help-block">{{ $msg }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('express_no') ? 'has-error' : '' }}">
                        <label for="express_no" class="control-label">物流单号</label>
                        <input type="text" id="express_no" name="express_no" value="" class="form-control"
                               placeholder="输入物流单号">
                        @if($errors->has('express_no'))
                            @foreach($errors->get('express_no') as $msg)
                                <span class="help-block">{{ $msg }}</span>
                            @endforeach
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success" id="ship-btn">发货</button>
                </form>
            </td>
        </tr>
    @endif
@else
    <!-- 否则展示物流公司和物流单号 -->
    <tr>
        <td>物流公司：</td>
        <td>{{ $order->ship_data['express_company'] }}</td>
        <td>物流单号：</td>
        <td>{{ $order->ship_data['express_no'] }}</td>
    </tr>
@endif