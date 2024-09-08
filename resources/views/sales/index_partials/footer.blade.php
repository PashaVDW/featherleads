<script src="{{ asset("assets/js/call_response_log.js") }}"></script>
<script src="{{ asset("assets/js/sales_apexchart.js") }}"></script>
<script src="{{ asset("assets/js/amountSold_apexchart.js") }}"></script>
<script>
  var toGoValue = parseFloat(@json($toGoValue ?? 0));
  var sold = parseFloat(@json($sold ?? 0));
</script>
