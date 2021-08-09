function setDatePicker(){
  $(".datepicker").datepicker({
    todayHighlight: true,
    autoclose: true
  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}