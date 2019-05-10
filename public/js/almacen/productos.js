$.fn.formatter.addInptType('T', /[2,4]/);
$.fn.formatter.addInptType('L', /[A-Za-z ]/);
$.fn.formatter.addInptType('X', /[A-Za-z]/);

$('#cantidad').formatter({
  "pattern": '{{999999}}'
});

$("#limite").formatter({
  "pattern": '{{999999}}'
});