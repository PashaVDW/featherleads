<script src="{{ asset("assets/js/call_response_log.js") }}"></script>
<script src="{{ asset("assets/js/sales_apexchart.js") }}"></script>
<script src="{{ asset("assets/js/amountSold_apexchart.js") }}"></script>
<script>
  var toGoValue = parseFloat(@json($toGoValue ?? 0));
  var sold = parseFloat(@json($sold ?? 0));
  var monthlyData = @json($monthlyData);

  var salesData = monthlyData.map(function (month) {
    return month.sold;
  });

  var targetData = monthlyData.map(function (month) {
    return month.target;
  });

  var categories = monthlyData.map(function (month) {
    return month.month;
  });
</script>
