@if($order->refund_status !== \App\Models\Order::REFUND_STATUS_PENDING)
    <tr>
        <td>退款状态：</td>
        <td colspan="2">{{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}，理由：{{ $order->extra['refund_reason'] }}</td>
        <td>
            <!-- 如果订单退款状态是已申请，则展示处理按钮 -->
            @if($order->refund_status === \App\Models\Order::REFUND_STATUS_APPLIED)
                <button class="btn btn-sm btn-success" id="btn-refund-agree">同意</button>
                <button class="btn btn-sm btn-danger" id="btn-refund-disagree">不同意</button>
            @endif
        </td>
    </tr>
@endif

<script>
    $(document).ready(function() {
        // 不同意 按钮的点击事件
        $('#btn-refund-disagree').click(function() {
            // Laravel-Admin 使用的 SweetAlert 版本与我们在前台使用的版本不一样，因此参数也不太一样
            swal({
                title: '输入拒绝退款理由',
                input: 'text',
                showCancelButton: true,
                confirmButtonText: "确认",
                cancelButtonText: "取消",
                showLoaderOnConfirm: true,
                preConfirm: function(inputValue) {
                    if (!inputValue) {
                        swal('理由不能为空', '', 'error')
                        return false;
                    }
                    // Laravel-Admin 没有 axios，使用 jQuery 的 ajax 方法来请求
                    return $.ajax({
                        url: '{{ route('admin.orders.handle_refund', [$order->id]) }}',
                        type: 'POST',
                        data: JSON.stringify({   // 将请求变成 JSON 字符串
                            agree: false,  // 拒绝申请
                            reason: inputValue,
                            // 带上 CSRF Token
                            // Laravel-Admin 页面里可以通过 LA.token 获得 CSRF Token
                            _token: LA.token,
                        }),
                        contentType: 'application/json',  // 请求的数据格式为 JSON
                    });
                },
                allowOutsideClick: false
            }).then(function (ret) {
                // 如果用户点击了『取消』按钮，则不做任何操作
                if (ret.dismiss === 'cancel') {
                    return;
                }
                swal({
                    title: '操作成功',
                    type: 'success'
                }).then(function() {
                    // 用户点击 swal 上的按钮时刷新页面
                    location.reload();
                });
            });
        });
    });
</script>
